<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('MArticle');
        $this->load->library('Breadcrumb');
        $this->breadcrumb->append_crumb('博客', site_url());
    }

    public function index(){
        $this->lists();
    }

    public function lists($cate_id = 0, $offset = 0){
        $this->title[] = '首页';
        $data = $condition = array();
        $condition[] = array('status' => 1);
        if(intval($cate_id)){
            $condition[]['cate_id'] = intval($cate_id);
        }
        $list = $this->MArticle->query($condition, intval($offset) , 20, array('updated_time' => 'desc'));
        $data['list'] = $list ? $list : array();
        $this->display('front/article/index', $data);
    }


    public function view($aid = 0){
        if(!intval($aid)){
            show_404();
        }
        $key = 'article::view::id_' . $aid;
        $this->load->library('memcached');
        if(!($article = $this->memcached->get($key))){
            $article = $this->MArticle->get(intval($aid));
            $this->memcached->set($key, $article, 30*24*3600);
        }
        if(!$article){
            show_404();
        }
        $this->breadcrumb->append_crumb($article[0]['cate_name'], site_url('article/list/' . $article[0]['cate_id']));
        $this->breadcrumb->append_crumb($article[0]['name'], '###');
        $data = array();
        $data['article']       = $article[0];
        $this->meta_keywords[] = $article[0]['keywords'];
        $this->title[]         = $article[0]['name'];
        $this->meta_desc       = $article[0]['description'];
        $this->display('front/article/content', $data);
    }
}

/* End of file article.php */
/* Location: ./article.php */
