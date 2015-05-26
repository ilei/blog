<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Users');
    }

	public function login(){
		$this->display('login');	
	}

}

/* End of file login.php */
/* Location: ./login.php */
