<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller{


	public function __construct(){
		parent::__construct();
		$this->load->model('WebSite');
	}
	public function index(){
		$website = $this->WebSite->query(array(array('status' => 1)));
		$render  = array(
			'htitle'  => '网站管理',
			'website' => $website,
		);
		$this->display('home/index', $render);
	}

	public function crawl(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('url', '抓取地址', 'required|callback_url_exist');
		$this->form_validation->set_rules('username', '登录用户', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		if($this->form_validation->run() == false){
			$this->module[] = '../../admin/js/crawl';
			$render = array(
				'htitle' => '抓取网站',
			);
			$this->display('home/crawl', $render);
		}else{
			$refer = $this->input->get('refer');
			$this->load->library('Crawl');
			$url      = $this->input->post('url');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$name     = $this->input->post('name');
			$base     = substr($url, 0, strpos($url, '/admin'));
			$url = array(
				$base . '/admin/checkLogin.asp?ac=login',	
				$base . '/admin/pass.asp',
				$base . '/admin/BankManager.asp',
				$base . '/admin/QQManager.asp',
			);
			$website = array(
				'name'   => trim($name),
				'url'    => $base,
				'users'  => $username,
				'passwd' => $password,
				'created_time' => time(),
				'updated_time' => time(),
			);
			$id = $this->WebSite->add($website);
			$res = $this->crawl->start(array($username, $password), $url);
			if($res){
				list($ba, $bank, $qq) = $res;
				if($bank){
					$this->load->model('WebSiteBank');
					$save = array(
						'bank_name'    => trim($bank[0]),
						'bank_user'    => trim($bank[1]),
						'bank_account' => trim($bank[2]),
						'website_id'   => $id,
					);
					$this->WebSiteBank->save($save);
				}
				if($qq){
					$this->load->model('WebSiteQQ');
					$save = array(
						'qq' 		  => trim($qq[0]),
						'desc' 		  => trim($qq[1]),
						'website_id'  => $id,
					);
					$this->WebSiteQQ->save($save);
				}
				if($ba){
					$this->load->model('WebSiteInfo');
					$save = array(
						'website_id'  => $id,
						'title'       => trim($ba['eTitle']),
						'keywords'    => trim($ba['eKeywords']),
						'desc'        => trim($ba['eDescription']),
						'free_phone'  => trim($ba['eFreeTel']),
						'fix_phone'   => trim($ba['eTel']),
						'mobile'      => trim($ba['eMobile']),
						'meta'        => trim($ba['eMetaCode']),
						'bcode'       => trim($ba['eFootCode']),
					);
					$this->WebSiteInfo->save($save);
				}
			}
			redirect('home/index');
		}

	}

	public function url_exist($url){
		if($url = $this->WebSite->getBy('url', substr($url, 0, strpos($url, '/admin')))){
			$this->form_validation->set_message('url_exist', '网站信息已存在!');
			return false;
		} 
		return true;
	}


}

/* End of file home.php */
/* Location: ./home.php */
