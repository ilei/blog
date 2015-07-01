<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{

    protected $meta_keywords = array('IT', '互联网', 'web技术', '博客', 'ilei');
    protected $meta_desc     = 'ilei是一个专业的、有趣的、专注于将Web开发技术尽可能简明易懂地描述出来的IT博客，在这里你可以轻松愉快地学习Web开发技术。内容涵盖了php,javascript,linux,node.js,mysql,git,等多种web开发语言及技术';
    protected $title         = array('ilei-享受编程-创造艺术');

    protected $module        = array();
    protected $css           = array();

    public function __construct(){
        parent::__construct();
    }

    public function display($page, $data = array(), $template = 'page'){
        $this->load->vars($data);
        list($cate_right, $news_right) = $this->getRight();
        $this->load->vars(array(
            'page'              => $page,
            'title'             => $this->title,
            'meta_keywords'     => $this->meta_keywords,
            'meta_desc'         => $this->meta_desc,
            'modules'           => $this->module,
            'cate_right'        => $cate_right,
            'news_right'        => $news_right,
            'last_release'      => C('release.last_release'),
        ));
        $this->load->view('public/' . $template);
    }
    

    public function getRight(){
        $this->load->model('MCategory');
        $cate = $this->MCategory->query();
        $this->load->model('MArticle');
        $news = $this->MArticle->query(array(), 0, count($cate), array('updated_time' => 'desc'));
        return array($cate, $news);
    
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

require_once('Admin_Controller.php');
/* End of file MY_Controller.php */
/* Location: ./MY_Controller.php */
