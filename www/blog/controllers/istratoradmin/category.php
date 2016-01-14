<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('MCategory');
        $this->load->library('form_validation');
    }

    public function index(){
        $data = $condition = array();
        $this->title[] = '文章类别列表-管理平台';
        $condition['status'] = 1;
        $list = $this->MCategory->query(array($condition), 0, 10, array('updated_time' => 'desc'));
        $data['list'] = $list;
        $this->display('admin/category/list', $data);
    }

    public function add(){
        $data = $condition = array();
        $this->form_validation->set_rules('cname', '类别名称', 'required|callback_nameExist');
        $this->form_validation->set_rules('cpinyin', '类别拼音', 'required|callback_pinyinExist');
        if($this->form_validation->run() == false){
            $condition['upid']   = 0;
            $condition['status'] = 1;
            $list = $this->MCategory->query(array($condition));
            $this->title[] = '文章类别添加-管理平台';
            $data['cates'] = $list;
            $this->display('admin/category/add', $data);
        }else{
            $post = $this->input->post();
            $data['name'] = isset($post['cname']) && $post['cname'] ? trim($post['cname']) : '';
            $data['pinyin'] = isset($post['cpinyin']) && $post['cpinyin'] ? trim($post['cpinyin']) : '';
            $data['upid'] = isset($post['cup']) && $post['cup'] ? intval($post['cup']) : 0;
            if($data['upid']){
                $cate = $this->MCategory->get($data['upid']);
                $data['pname'] = $cate ? $cate[0]['name'] : '';
            }
            $this->MCategory->save($data);
            redirect('/istratoradmin/category/index/');
        }
    }


    public function nameExist($cname){
        $exist = $this->MCategory->getBy('name', trim($cname));
        if($exist){
            $this->from_validation->set_message('nameExist', '名称已存在!');
            return false;
        }else{
            return true;
        }
    }
    
    public function pinyinExist($cpinyin){
        $exist = $this->MCategory->getBy('pinyin', trim($cpinyin));
        if($exist){
            $this->from_validation->set_message('pinyinExist', '拼音已存在!');
            return false;
        }else{
            return true;
        }
    }

    
}

/* End of file admin.php */
/* Location: ./admin.php */
