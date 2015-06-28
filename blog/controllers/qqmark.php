<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QQMark extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('front/qqmark/index');
    }

}

/* End of file outsourcing.php */
/* Location: ./outsourcing.php */
