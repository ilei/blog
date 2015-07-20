<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->title[] = '管理平台';
    }

    public function home(){
        $data = array();
        $this->display('admin/home/index', $data);
    }
    
}

/* End of file admin.php */
/* Location: ./admin.php */
