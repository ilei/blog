<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{

    protected $qq_meta_keywords = array('2015最新QQ签名', 'QQ个性签名', '个性签名', 'QQ签名', '个性签名大全', '伤感个性签名', '超拽个性签名', '情侣个性签名', '爱情个性签名');
    protected $qq_meta_desc     = array('2015最新版QQ个性签名大全，唯美个性签名、情侣个性签名、爱情个性签名、伤感个性签名、超拽个性签名、情侣个性签名等，个性网签名网是QQ个性签名的原创中心和QQ个性签名发源地');

   protected $qq_title         = array('QQ个性签名-【QQ个性签名网】-2015原创QQ签名-个性签名大全_伤感个性签名_个性签名超拽_个性签名情侣_个性签名爱情');
    protected $module        = array();
    protected $css           = array();

    public function __construct(){
        parent::__construct();
    }

    public function show($page, $data = array(), $template = 'page'){
        $this->load->vars($data);
        $this->load->vars(array(
            'page'              => $page,
            'title'             => $this->qq_title,
            'meta_keywords'     => $this->qq_meta_keywords,
            'meta_desc'         => $this->qq_meta_desc,
            'modules'           => $this->module,
            'cates'             => $this->getCates(),
            'last_release'      => C('release.last_release'),
            'css'               => $this->css,
        ));
        $this->load->view('common/' . $template);
    }

    public function getRight(){
        $this->load->model('MCategory');
        $cate = $this->MCategory->query();
        $this->load->model('MArticle');
        $news = $this->MArticle->query(array(), 0, count($cate), array('updated_time' => 'desc'));
        return array($cate, $news);
    
    }

    public function getCates(){
        $this->load->library('memcached');
        $cates = $this->memcached->get('qqmark::cates');
        if(!$cates){
            $this->load->model('QQCates');
            $cond = array('status' => 1);
            $cates = $this->QQCates->query(array($cond));
            $this->memcached->set('qqmark::cates', $cates, 30*24*60*60);
        }
        return $cates;
    }

    public function loadHtml($page, $data = array()){
        return $this->load->view($page, $data, true);
    }

    public function jsonResponse($data) {
        ob_clean();
        echo json_encode($data);
        exit();
    }
}

/* End of file MY_Controller.php */
/* Location: ./MY_Controller.php */
