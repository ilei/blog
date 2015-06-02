<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
    public $currentUser = NULL;
    
    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('Users');
        $this->currentUser = $this->CI->Users->current();
    }
  
    public function requireLogin() {
        if(in_array(uri_string(), C('auth.no_login'))){
            return true;
        }
        if(!($this->currentUser)) {
            redirect("istratoradmin/user/login/?refer=" . base64_encode(uri_string()));
        }
        return true;
    }

    public function login($user) {
        $this->CI->Users->setCurrent($user);
    }

    public function logout() {
        $this->CI->Users->setCurrent();
    }

    public function password($password, $salt){
        return md5(substr(md5($password), 8, 16) . $salt);
    }
}
