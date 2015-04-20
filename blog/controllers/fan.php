<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fan extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('MArticle');
    }

    public function index(){
        $this->lists();
    }

    public function lists($cate_id = 0, $offset = 0){
        $this->title[] = '随笔';
        $data = $condition = array();
        $condition[] = array('status' => 1);
        if(intval($cate_id)){
            $condition['cate_id'] = intval($cate_id);
        }
        $list = $this->MArticle->query($condition, intval($offset) , 10, array('updated_time' => 'desc'));
        $data['list'] = $list ? $list : array();
        $this->display('front/article/index', $data);
    }


    public function view($aid = 0){
        if(!intval($aid)){
            show_404();
        }
        $article = $this->MArticle->get(intval($aid));
        if(!$article){
            show_404();
        }
        $data = array();
        $data['article'] = $article[0];
        $this->display('front/article/content', $data);
    }
}

/* End of file article.php */
/* Location: ./article.php */
