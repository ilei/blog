<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('MArticle');
        $this->load->library('Breadcrumb');
        $this->load->library('memcached');
        $this->breadcrumb->append_crumb('博客', site_url());
    }

    public function index(){
        $this->lists();
    }

    public function lists($pinyin = '', $offset = 0){
        $this->title[] = '首页';
        $data = $condition = array();
        $condition[] = array('status' => 1);
        $this->load->model('MCategory');
        $cate = $this->MCategory->getBy('pinyin', trim($pinyin));
        if(intval($cate)){
            $condition[]['cate_id'] = intval($cate[0]['id']);
        }
        $key       = 'article::lists::_cate_' . $pinyin . 'offset_'  .$offset;
        $key_total = 'article::lists::_cate_' . $pinyin . 'total';
        if(!($list = $this->memcached->get($key)) || !($total = $this->memcached->get($key_total))){
            $list = $this->MArticle->query($condition, intval($offset) , 10, array('updated_time' => 'desc'));
            $total = $this->MArticle->count($condition);
            $this->memcached->set($key, $list);
            $this->memcached->set($key_total, $total);
        }
        $data['pager'] = ci_pager(site_url('article/list/0'), $total, 10, 4, '', site_url());
        $data['list'] = $list ? $list : array();
        $data['total'] = $total;
        $data['pinyin'] = $pinyin ? $pinyin : 'home';
        $this->display('front/article/index', $data);
    }


    public function view($aid = 0){
        if(!intval($aid)){
            show_404();
        }
        $key = 'article::view::id_' . $aid;
        if(!($article = $this->memcached->get($key))){
            $article = $this->MArticle->get(intval($aid));
            $this->memcached->set($key, $article, 30*24*3600);
        }
        if(!$article){
            show_404();
        }
		$this->load->model('MCategory');
		$cate = $this->MCategory->getBy('id', $article[0]['cate_id']);
        $this->breadcrumb->append_crumb($article[0]['cate_name'], site_url('article/list/' . $article[0]['cate_id']));
        $this->breadcrumb->append_crumb($article[0]['name'], '###');
        $sql = "UPDATE `article` SET `hits` = hits+1 WHERE `id` = {intval($aid)}";
		$this->MArticle->db->query($sql);
        $data = array();
        $data['article']       = $article[0];
        $data['pinyin']        = $cate[0]['pinyin'];
        $this->meta_keywords[] = $article[0]['keywords'];
        $this->title[]         = $article[0]['name'];
        $this->meta_desc       = $article[0]['description'];
        $this->display('front/article/content', $data);
    }
}

/* End of file article.php */
/* Location: ./article.php */
