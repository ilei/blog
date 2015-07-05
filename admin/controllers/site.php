<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller{

	public function __construct(){
        echo 'admin';die;
		parent::__construct();
		$this->load->model('WebSite');
	}

	public function test(){
		$this->load->library('FileEncrypt');
		$key = 'kedou！＠＃￥％ｋｅｄｏｕ．ｃｏｍ';
		$this->fileencrypt->encryptFile('/home/ilei/blog/admin/controllers/login.php', '/tmp/a.php', $key);
		$this->fileencrypt->decryptFile('/tmp/a.php', '/tmp/b.php', $key);
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
			$this->_crawl(array($base, $name, $username, $password));
			redirect('home/index');
		}

	}

	public function info($website_id){
		$this->load->model('WebSiteInfo');
		$info = $this->WebSiteInfo->getBy('website_id', intval($website_id));
		if(empty($info)){
			show_404();
		}	
		$render = array(
			'htitle' => '基本信息',
			'info'   => isset($info, $info[0]) ? $info[0] : array(),
		);
		$this->display('home/info', $render);
	}

	public function bank($website_id){
		$this->load->model('WebSiteBank');
		$bank = $this->WebSiteBank->getBy('website_id', intval($website_id));
		if(empty($bank)){
			show_404();
		}	
		$render = array(
			'htitle' => '银行信息',
			'bank'   => isset($bank, $bank[0]) ? $bank[0] : array(),
		);
		$this->display('home/bank', $render);
	}

	public function qq($website_id){
		$this->load->model('WebSiteQQ');
		$qq = $this->WebSiteQQ->getBy('website_id', intval($website_id));
		if(empty($qq)){
			show_404();
		}	
		$render = array(
			'htitle' => '客服信息',
			'qq'     => isset($qq, $qq[0]) ? $qq[0] : array(),
		);
		$this->display('home/qq', $render);
	}

	public function url_exist($url){
		if($url = $this->WebSite->getBy('url', substr($url, 0, strpos($url, '/admin')))){
			$this->form_validation->set_message('url_exist', '网站信息已存在!');
			return false;
		} 
		return true;
	}

	public function refresh($website_id){
		if(!$website_id){
			show_404();
		}
		$website = $this->WebSite->getBy('id', intval($website_id));
		if(!(isset($website, $website[0]) && $website[0])){
			show_404();	
		}
		$crawl = array(
			$website[0]['url'],
			$website[0]['name'],
			$website[0]['users'],
			$website[0]['passwd'],
		); 
		$this->_crawl($crawl, $website_id);
		redirect('home/index');
	}

	private function _crawl($data, $id = 0){
		list($base, $name, $username, $password) = $data;
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
		$id = intval($id);
		if($id){
			$this->WebSite->update(intval($id), $website);
		}else{
			$id = $this->WebSite->add($website);
		}
		$this->load->library('Crawl');
		$res = $this->crawl->start(array($username, $password), $url);
		if($res){
			list($ba, $bank, $qq) = $res;
			if($bank){
				$this->load->model('WebSiteBank');
				$save = array(
					'bank_name'    => iconv('GB2312', 'utf-8', trim($bank[0])),
					'bank_user'    => iconv('GB2312', 'utf-8', trim($bank[1])),
					'bank_account' => iconv('GB2312', 'utf-8', trim($bank[2])),
					'website_id'   => $id,
				);
				if($id){
					$this->WebSiteBank->update(intval($id), $save);
				}else{
					$this->WebSiteBank->save($save);
				}
			}
			if($qq){
				$this->load->model('WebSiteQQ');
				$save = array(
					'qq' 		  => trim($qq[0]),
					'desc' 		  => iconv('GB2312', 'utf-8', trim($qq[1])),
					'website_id'  => $id,
				);
				if($id){
					$this->WebSiteQQ->update(intval($id), $save);
				}else{
					$this->WebSiteQQ->save($save);
				}
			}
			if($ba){
				$this->load->model('WebSiteInfo');
				foreach($ba as $key => $value){
					$ba[$key] = iconv('GB2312', 'utf-8', $value);
				}
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
				if($id){
					$this->WebSiteInfo->update($id, $save);
				}else{
					$this->WebSiteInfo->save($save);
				}
			}
		}
	}

}

/* End of file home.php */
/* Location: ./home.php */
