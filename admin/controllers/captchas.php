<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captchas extends MY_Controller{

    public function __construct(){
		parent::__construct();
        $this->load->Library('Captcha');
    }

	public function index(){
		$this->session->set_userdata('captchas::code', $this->captcha->code);
		$this->captcha->showImage(dirname(BASEPATH) .  '/static/fonts/simsun.ttc');
	}

	

}

/* End of file login.php */
/* Location: ./login.php */
