<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('MMenu');
        $this->load->library('form_validation');
    }

    public function index(){
        $data = array();
        $this->title[] = '菜单列表-管理平台';
        $list = $this->MMenu->query();
        $data['list'] = $list;
        $this->display('admin/menu/list', $data);
    }

    public function add(){
        $data = $condition = array();
        $this->form_validation->set_rules('mname', '菜单名称', 'required|callback_nameExist');
        $this->form_validation->set_rules('mpinyin', '菜单配音', 'required|callback_pinyinExist');
        if($this->form_validation->run() == false){
            $condition['upid'] = 0;
            $list = $this->MMenu->query(array($condition));
            $this->title[] = '菜单添加-管理平台';
            $data['parent'] = $list;
            $this->display('admin/menu/add', $data);
        }else{
            $post = $this->input->post();
            $data['name'] = isset($post['mname']) && $post['mname'] ? trim($post['mname']) : '';
            $data['pinyin'] = isset($post['mpinyin']) && $post['mpinyin'] ? trim($post['mpinyin']) : '';
            $data['upid'] = isset($post['mup']) && $post['mup'] ? intval($post['mup']) : 0;
            if($data['upid']){
                $cate = $this->MMenu->get($data['upid']);
                $data['pname'] = $cate ? $cate[0]['name'] : '';  
            }
            $this->MMenu->save($data);
        }
    }


    public function nameExist($mname){
        $exist = $this->MMenu->getBy('name', trim($mname));
        if($exist){
            $this->from_validation->set_message('nameExist', '名称已存在!');
            return false;
        }else{
            return true;
        }
    }
    
    public function pinyinExist($mpinyin){
        $exist = $this->MMenu->getBy('pinyin', trim($mpinyin));
        if($exist){
            $this->form_validation->set_message('pinyinExist', '拼音已存在!');
            return false;
        }else{
            return true;
        }
    }
    
}

/* End of file admin.php */
/* Location: ./admin.php */
