<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawl extends MY_Controller{


	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$url = "http://www.qqgexingqianming.com/";
		$options = array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT        => 30,
		);
		$ch = curl_init($url);
		curl_setopt_array($ch, $options);
		$tmp = curl_exec($ch);
		curl_close($ch);
		$this->load->library('DOM');
		$dom = $this->dom->init($tmp);
		$elements = $dom->find("/html/body/div[3]/div[2]/div/a");
		$pattern = '/\"\/([^\/]*)\/\"/i';
		$tmp = array();
		$this->load->model('QQCates');
		foreach($elements as $key => $value){
			preg_match($pattern, $value, $match);
			$tmp['cate_mark'] = trim($match[1]);
			$tmp['cate_name'] = mb_substr(strip_tags($value), 2);
			var_dump($tmp);
			//$this->QQCates->save($tmp);
		}
	}

	public function startSwoole(){
		$client = new swoole_client(SWOOLE_SOCK_TCP);	
		if(!$client->connect('127.0.0.1' , 9501)){ 
		}else{
			//参照 cli/server控制器理解
			$send = array();
			//发送命令 
			$send['cmd']    = 'send';
			$send['object'] = '';
			$send['method'] = 'callback';
			
			//回调函数的参数
			$client->send(json_encode($send));
			$receive = $client->recv();	
		}
	
	}
	public function sign(){
		$this->load->model('QQCates');
		$cate = $this->QQCates->query();
		$url = "http://www.qqgexingqianming.com/";
		$this->startSwoole();
		/*$this->load->library('DOM');
		foreach($cate as $value){
			if($value['cate_mark'] == 'qinglv'){
				continue;
			}
			

			$url = $url . $value['cate_mark'] . '/';
			$res = $this->res_crawl($url);
			$res = serialize($res);
			$redis = new Redis();
			$redis->connect('127.0.0.1', '6379');
			$redis->set('pages', $res);
		}	
		 */
	
	} 

	public function res_crawl($url, $sub_url = '1.htm'){
		static $pages = array();	
		static $old = array();
		$url = $url . $sub_url;
		$content = $this->curl($url);
		$this->load->library('DOM');
		$content = $this->curl($url);
		$dom = $this->dom->init($content);
		$page = "/html/body/div[3]/div[3]/div[1]/div[2]/a";
		$elements = $dom->find($page);
		if(!$elements){
			return;
		}
		$pattern = '/(\d?\.htm)\"/i';
		$content = implode('', $elements);
		preg_match_all($pattern, $content, $match);
		$arr = $match[1];
		$total = count($arr);	
		array_push($old, $sub_url);
		$total = $total > 1 ? $total - 1 : $total;
		echo $total;
		if($total){
			for($i = 0; $i < $total; $i++){
				if($i = $total-1){
					if(!in_array($arr[$i], $old)){
						$this->res_crawl($url, $arr[$i]);
					}
				}
				array_push($pages, $arr[$i]);
			}
			array_unique($pages);
		}		
		return $pages;
	
	}


	public function curl($url){
		$options = array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT        => 30,
		);
		$ch = curl_init($url);
		curl_setopt_array($ch, $options);
		$tmp = curl_exec($ch);
		curl_close($ch);
		return $tmp;
	}

}

/* End of file crawl.php */
/* Location: ./crawl.php */
