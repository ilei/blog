<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends MY_Controller{


    public function __construct(){
        parent::__construct();
    }
	public function index(){
		$render = array(
			'htitle' => '网站列表',	
		);
		$this->display('site/index', $render);
	}


}

/* End of file home.php */
/* Location: ./home.php */
