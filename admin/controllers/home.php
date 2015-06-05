<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller{


    public function __construct(){
        parent::__construct();
    }
	public function index(){
		$this->display('home/index');
	}


}

/* End of file home.php */
/* Location: ./home.php */
