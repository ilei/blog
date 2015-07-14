<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('QQSign');
        $this->load->library('memcached');
    }

    public function index(){
        $assign = array();
        $assign = $this->memcached->get('qqmark::index');
        if(!$assign){
            $condition = array(
                'status' => 1, 
            );
            $new = $this->QQSign->query(array($condition), 0, 12, array('updated_time' => 'desc'));
            $condition['cate_id'] = 80;
            $assign['shanggan'] = $this->QQSign->query(array($condition), 0, 10, array('updated_time' => 'desc'));
            $condition['cate_id'] = 86;
            $assign['gaoxiao'] = $this->QQSign->query(array($condition), 0, 10, array('updated_time' => 'desc'));
            $condition['cate_id'] = 102; 
            $assign['weimei'] = $this->QQSign->query(array($condition), 0, 10, array('updated_time' => 'desc'));
            $condition['cate_id'] = 87; 
            $assign['aiqing'] = $this->QQSign->query(array($condition), 0, 10, array('updated_time' => 'desc'));
            $assign['new'] = $new; 
            $assign['news'] = $new; 
            $assign['push'] = $new; 
            $assign['ranks'] = $new; 
            $this->memcached->set('qqmark::index', $assign, 7*24*3600);
        }
        $this->show('home/index', $assign);
    }

    public function cate($mark = '', $offset = 0){
        if(!$mark){
            redirect(site_url('qq'));
        }
        $this->load->model('QQCates');
        $cate = $this->QQCates->query(array(array('status' => 1, 'cate_mark' => trim($mark))));
        $cate_id = isset($cate['0']) ? $cate[0]['id'] : 0;
        if(!$cate_id){
            redirect(site_url('qq'));
        }
        $this->qq_title[] = "{$cate[0]['cate_name']}-{$cate[0]['cate_name']}大全";
        $this->qq_meta_keywords[] = "{$cate[0]['cate_name']},{$cate[0]['cate_name']}大全,最新{$cate[0]['cate_name']}";
        $this->qq_meta_desc[] = "2015最新最全{$cate[0]['cate_name']}";
        $this->css[] = 'style';
        $key = 'qqmark::cate::' . $cate[0]['cate_mark'];
		$total = 'qqmark::cate::' . $cate[0]['cate_mark'] . '::total';
        if(!($sign = $this->memcached->get($key)) || !($num = $this->memcached->get($total))){
			$num  = $this->QQSign->count(array(array('status' => 1, 'cate_id' => $cate_id)));
            $sign = $this->QQSign->query(array(array('status' => 1, 'cate_id' => $cate_id)), intval($offset), 20, array('updated_time' => 'desc'));
            $this->memcached->set($key, $sign, 7*24*3600);
            $this->memcached->set($total, $num, 7*24*3600);
        }
        $assign['list'] = $sign;
		$assign['pager'] = ci_pager(site_url('list/' . $mark), $num, 20, 3, '', site_url('list/' . $mark));
        $assign['cate_name'] = $cate[0]['cate_name'];
        $this->show('home/list', $assign);
    }

}

/* End of file home.php */
/* Location: ./home.php */
