<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Model {

    protected $table = "users";

    function __construct() {
        parent::__construct($this->table);
    }

    function current() {
        static $cur = NULL;
        if(is_null($cur)) {
            $this->load->library('session');
            $uid = $this->session->userdata('uid');
            if(!empty($uid)) {
                $cur = $this->getBy('uid', $uid);
            }
        }
        return $cur[0];
    }

    public function setCurrent($user = NULL) {
        $this->load->library('session');
        if(is_array($user)) {
            $this->session->set_userdata('uid', $user['id']);
        } else if(is_null($user)) {
            $this->session->unset_userdata('uid');
        }
    }

}
