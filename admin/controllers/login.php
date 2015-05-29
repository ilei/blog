<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{

    private $_currentUser = null;

    public function __construct(){
        parent::__construct();
        $this->load->model('Users');
        $this->load->library('form_validation');
    }

    public function login(){
        if($this->auth->currentUser){
            redirect();
        }
        $this->form_validation->set_rules('username', '用户名', 'required|callback_isEmail|callback_userNameExist');
        $this->form_validation->set_rules('password', '密码', 'required|callback_checkPassword');
        if($this->form_validation->run() == false){
            $data = array();
            $data['modules'] = array();
            $this->load->view('admin/login', $data);
        }else{
            $refer = $this->input->get('refer');
            $this->auth->login($this->_currentUser);
            redirect(base64_decode($refer)); 
        }
    }

    public function logout(){
        $this->auth->logout();
        redirect('istratoradmin/user/login/'); 
    }

    public function isEmail($username){
        if(preg_match('/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i', $username)){
            return true; 
        }else{
            $this->from_validation->set_message('isEmail', '邮箱格式不正确!');
            return false;
        }
    }

    public function userNameExist($username){
        if($user = $this->Users->getBy('username', trim($username))){
            $this->_currentUser = $user[0];
            return true;
        }else{
            $this->form_validation->set_message('userNameExist', '用户名不存在!');
            return false;
        } 
    } 

    public function checkPassword($password){
        if($this->_currentUser){
            if($this->_currentUser['password'] == $this->auth->password($password, $this->_currentUser['salt'])){
                return true;
            }
        }
        $this->form_validation->set_message('checkPassword', '用户名或者密码错误!');
        return false;
    } 


}

/* End of file admin.php */
/* Location: ./admin.php */
