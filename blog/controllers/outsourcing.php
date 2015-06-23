<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outsourcing extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('front/outsourcing/index');
    }

    public function ajax_demand(){
        if($this->input->is_ajax_request()){
            $this->load->library('memcached');
            $stop = $this->memcached->get('out::ajax_demand::nums');
            if($stop){
                $this->jsonResponse(array('success' => false, 'info' => '提交次数过于频繁，请稍后再试')); 
            }
            $this->memcached->set('out::ajax_demand::nums', 1, 5);
            $post = $this->input->post();
            $this->load->model('MDemand');
            if(!(isset($post['name']) && $post['name'])){
                $info = array('name' => '姓名不能为空');
                $this->jsonResponse(array('success' => false, 'info' => $info)); 
            }
            if(!(isset($post['tel']) && $post['tel'])){
                $info = array('tel' => '电话不能为空');
                $this->jsonResponse(array('success' => false, 'info' => $info)); 
            }
            if(!(isset($post['mail']) && $post['mail'])){
                $info = array('mail' => '邮箱不能为空');
                $this->jsonResponse(array('success' => false, 'info' => $info)); 
            }
            if(!(isset($post['con']) && $post['con'])){
                $info = array('con' => '需求不能为空');
                $this->jsonResponse(array('success' => false, 'info' => $info)); 
            }
            $save = array(
                'name'    => trim($post['name']),
                'mobile'  => trim($post['tel']),
                'mail'    => trim($post['mail']),
                'con'     => trim($post['con']),
                'com'     => isset($post['com'])  && $post['com']  ? trim($post['com'])  : '',
            );
            $id = $this->MDemand->save($save);
            if($id){
                $this->jsonResponse(array('success' => true)); 
            }else{
                $this->jsonResponse(array('success' => false, 'info' => '服务器错误,请稍后重试')); 
            }
        }
    }

}

/* End of file outsourcing.php */
/* Location: ./outsourcing.php */
