<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('MArticle');
        $this->load->library('form_validation');
    }

    public function index(){
        $data = $condition = array();
        $this->title[] = '文章列表-管理平台';
        $condition['status'] = 1;
        $list = $this->MArticle->query(array($condition), 0, 10, array('updated_time' => 'desc'));
        $data['list'] = $list;
        $this->display('admin/article/list', $data);
    }

    public function add(){
        $data = $condition = array();
        $this->module[] = '/static/js/article/add.js';
        $this->form_validation->set_rules('atitle', '文章标题', 'required|callback_nameExist');
        $this->form_validation->set_rules('acontent', '文章内容', 'required');
        $this->load->model('MCategory');
        if($this->form_validation->run() == false){
            $condition['status'] = 1;
            $list = $this->MCategory->query(array($condition));
            $this->title[] = '文章添加-管理平台';
            $data['cates'] = $list;
            $this->display('admin/article/add', $data);
        }else{
            $post = $this->input->post();
            $data['name'] = isset($post['atitle']) && $post['atitle'] ? trim($post['atitle']) : '';
            $data['content']  = isset($post['acontent']) && $post['acontent'] ? trim($post['acontent']) : '';
            $data['keywords'] = isset($post['keywords']) && $post['keywords'] ? trim($post['keywords']) : '';
            $data['description'] = isset($post['desc']) && $post['desc'] ? trim($post['desc']) : '';
            $data['url'] = isset($post['aurl']) && $post['aurl'] ? trim($post['aurl']) : '';
            $data['author'] = $this->auth->currentUser['realname']; 
            $data['cate_id'] = isset($post['acate']) && $post['acate'] ? intval($post['acate']) : 0;
            if($data['cate_id']){
                $cate = $this->MCategory->get($data['cate_id']);
                $data['cate_name'] = $cate ? $cate[0]['name'] : '';
            }
            $this->MArticle->save($data);
            redirect('/istratoradmin/article/index/');
        }
    }


    public function edit($aid = 0){
        if(!intval($aid)){
            show_404();
        }
        $article = $this->MArticle->get($aid);
        if($article){
            $article = $article[0];
        }else{
            show_404();
        }
        $data = $condition = array();
        $this->module[] = '/static/js/article/add.js';
        $this->form_validation->set_rules('atitle', '文章标题', 'required');
        $this->form_validation->set_rules('acontent', '文章内容', 'required');
        $this->load->model('MCategory');
        if($this->form_validation->run() == false){
            $condition['status'] = 1;
            $list = $this->MCategory->query(array($condition));
            $this->title[] = '文章添加-管理平台';
            $data['cates'] = $list;
            $data['article'] = $article;
            $this->display('admin/article/add', $data);
        }else{
            $post = $this->input->post();
            if(!isset($post['aid']) && !intval($post['aid'])){
                show_404(); 
            }
            $data['name'] = isset($post['atitle']) && $post['atitle'] ? trim($post['atitle']) : '';
            $data['content'] = isset($post['acontent']) && $post['acontent'] ? trim($post['acontent']) : '';
            $data['url'] = isset($post['aurl']) && $post['aurl'] ? trim($post['aurl']) : '';
            $data['author'] = $this->auth->currentUser['realname']; 
            $data['cate_id'] = isset($post['acate']) && $post['acate'] ? intval($post['acate']) : 0;
            $data['keywords'] = isset($post['keywords']) && $post['keywords'] ? trim($post['keywords']) : '';
            $data['description'] = isset($post['desc']) && $post['desc'] ? trim($post['desc']) : '';
            if($data['cate_id']){
                $cate = $this->MCategory->get($data['cate_id']);
                $data['cate_name'] = $cate ? $cate[0]['name'] : '';
            }
            $this->MArticle->save($data, intval($aid));
            redirect('/istratoradmin/article/index/');
        }
    }


    public function nameExist($atitle){
        $exist = $this->MArticle->getBy('name', trim($atitle));
        if($exist){
            $this->from_validation->set_message('nameExist', '名称已存在!');
            return false;
        }else{
            return true;
        }
    }

}

/* End of file admin.php */
/* Location: ./admin.php */
