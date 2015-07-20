<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}


	public function index(){
		//$website = $this->WebSite->query(array(array('status' => 1)));
		$render  = array(
			'htitle'  => '网站管理',
			//'website' => $website,
		);
		$this->display('home/index', $render);
	}


}

/* End of file home.php */
/* Location: ./home.php */
