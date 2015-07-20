<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rss extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}


	public function add_channel(){
		$render = array(
			'htitle' => '订阅管理',	
		);
		$this->load->library('RssChannel');	
		$this->rsschannel->add_channel('http://coolshell.cn', 1);
		die;
		if($post = $this->input->post()){
			$channel  = trim(sanitize($post['channel']));		
			$category = intval($post['category']);
			if(substr($channel, 0, 5) == 'feed:'){
				if(substr($channel, 0, 11) == 'feed://http'){
					$channel = substr($channel, 5);
				}else{
					$channel = 'http:' . substr($channel, 5);
				}	
			}
			if($channel != 'http://' && substr($channel, 0, 4) == 'http'){
				$this->load->library('RssChannel');	
			}
		}
		$this->display('rss/add_channel', $render);	
	}

}

/* End of file rss.php */
/* Location: ./rss.php */
