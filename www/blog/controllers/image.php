<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
         header("Content-type: text/html; charset=utf-8");
         die(1);
        $this->load->view('front/image/content');
    }

    public function down($type){
         die(1);
        if($type == 1){
            force_download('jiehunzheng.jpg', file_get_contents('/home/smartlei/program/www/static/images/jiehunzheng.jpg'));
        }else{
            force_download('heying.jpg', file_get_contents('/home/smartlei/program/www/static/images/heying.jpg'));
        } 
    }
}

/* End of file image.php */
/* Location: ./image.php */
