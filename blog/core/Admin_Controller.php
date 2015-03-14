<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Controller extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('Auth');
        $this->auth->requireLogin();
    }
   
    public function display($page, $data = array(), $template = 'page'){
        $this->load->vars($data);
        $this->load->vars(array(
            'page'              => $page,
            'title'             => $this->title,
            'meta_keywords'     => $this->meta_keywords,
            'meta_desc'         => $this->meta_desc,
            'modules'           => $this->module,
            'last_release'      => C('release.last_release'),
            'menu'              => C('menu'),
            'username'          => isset($this->auth) ? $this->auth->currentUser['realname'] : null, 
        ));
        $this->load->view('common/' . $template);
    }

}

/* End of file Admin_Controller.php */
/* Location: ./Admin_Controller.php */
