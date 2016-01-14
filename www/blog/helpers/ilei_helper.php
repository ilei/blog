<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 获取ip函数
 */

if ( ! function_exists('lei_client_ip')) {
    function ilei_client_ip() {
        $ip = array_key_exists('HTTP_X_REAL_IP', $_SERVER)?$_SERVER['HTTP_X_REAL_IP']:(
            array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)?$_SERVER['HTTP_X_FORWARDED_FOR']:(
                array_key_exists('REMOTE_ADDR', $_SERVER)?$_SERVER['REMOTE_ADDR']:
                '0.0.0.0'));
        return bindec(decbin(ip2long($ip)));
    }
}

if ( ! function_exists('ilei_show_ip')) {
    function lei_show_ip($int) {
        $ip = long2ip($int);
        $ip = substr($ip, 0, strrpos($ip, ".")+1) . "*";
        return $ip;
    }
}

if ( ! function_exists('ilei_real_ip')) {
    function ilei_real_ip() {
        $ip = array_key_exists('HTTP_X_REAL_IP', $_SERVER)?$_SERVER['HTTP_X_REAL_IP']:(
            array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)?$_SERVER['HTTP_X_FORWARDED_FOR']:(
                array_key_exists('REMOTE_ADDR', $_SERVER)?$_SERVER['REMOTE_ADDR']:
                '0.0.0.0'));
        return $ip;
    }
}
if ( ! function_exists('ilei_randcode')) {
    function ilei_randcode($len) {
        $min = pow(10, $len-1);
        $max = pow(10, $len) - 1;
        return rand($min, $max);
    }
}


if ( ! function_exists('utf8_substr')) {
    function utf8_substr( $str, $start, $len ) {
        return preg_replace( '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $start. '}' .
            '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s',
            '$1', $str);
    }
}

if ( ! function_exists('keyword_replace')) {
    function keyword_replace( $str, $keyword) {
        if(is_string($keyword)) {
            $keyword = array($keyword);
        }
        foreach($keyword as $k) {
            $str = str_replace($k, "<em>$k</em>", $str);
        }
        return $str;
    }
}

if ( ! function_exists('yson_decode')) {
    function yson_decode( $str ) {
        $ret = array();
        $arr_1 = explode_trip_null(";", $str);
        foreach ($arr_1 as $a_1) {
            if ($arr_2 = explode_trip_null(":", $a_1)) {
                if ($arr_3 = explode_trip_null(",", $arr_2[1])) {
                    $ret[$arr_2[0]] = $arr_3;
                }
            }
        }
        return $ret;
    }
}

if ( ! function_exists('explode_trip_null')) {
    function explode_trip_null( $separator, $str ) {
        $ret = array();
        $arr = explode($separator, $str);
        foreach ($arr as $a) {
            if ($a) {
                $ret[] = $a;
            }
        }
        return $ret;
    }
}

if ( ! function_exists('history_cookie')) {
    function history_cookie($key) {
        $ci =& get_instance();
        if($str = $ci->input->cookie($key)) {
            if($str = base64_decode($str)) {
                return json_decode($str, TRUE);
            }
        }
        return array();
    }
}

if ( ! function_exists('add_http')) {
    function add_http( $href ) {
        if ( substr($href, 0, 4) != "http" ) {
            return "http://" . $href;
        }
        return $href;
    }
}

if ( ! function_exists('add_nofollow')) {
    function add_nofollow( $str ) {
        $str = str_replace(' rel="nofollow" ', '', $str);
        return preg_replace('|(<a[^>]*?href=".*?")([^>]*?>)|i', '$1 rel="nofollow" $2', $str);
    }
}

if ( ! function_exists('array_key_values')) {
    function array_key_values($array, $key) {
        $ret = array();
        if (is_array($array)) {
            foreach ($array as $arr) {
                if (isset($arr[$key])) {
                    $ret[] = $arr[$key];
                }
            }
        }
        return $ret;
    }
}

if ( ! function_exists('extract_picture')) {
    function extract_picture($str) {
        $pattern = "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/";
        preg_match($pattern, $str, $match);
        return $match && $match[1] && $match[1][0] ? $match[1][0] : '';
    }
}

if ( ! function_exists('full_width_to_semiangle')) {
    function full_width_to_semiangle($str) {
        $arr = array(
            '０' => '0',
            '１' => '1',
            '２' => '2',
            '３' => '3',
            '４' => '4',
            '５' => '5',
            '６' => '6',
            '７' => '7',
            '８' => '8',
            '９' => '9',
            'Ａ' => 'A',
            'Ｂ' => 'B',
            'Ｃ' => 'C',
            'Ｄ' => 'D',
            'Ｅ' => 'E',
            'Ｆ' => 'F',
            'Ｇ' => 'G',
            'Ｈ' => 'H',
            'Ｉ' => 'I',
            'Ｊ' => 'J',
            'Ｋ' => 'K',
            'Ｌ' => 'L',
            'Ｍ' => 'M',
            'Ｎ' => 'N',
            'Ｏ' => 'O',
            'Ｐ' => 'P',
            'Ｑ' => 'Q',
            'Ｒ' => 'R',
            'Ｓ' => 'S',
            'Ｔ' => 'T',
            'Ｕ' => 'U',
            'Ｖ' => 'V',
            'Ｗ' => 'W',
            'Ｘ' => 'X',
            'Ｙ' => 'Y',
            'Ｚ' => 'Z',
            'ａ' => 'a',
            'ｂ' => 'b',
            'ｃ' => 'c',
            'ｄ' => 'd',
            'ｅ' => 'e',
            'ｆ' => 'f',
            'ｇ' => 'g',
            'ｈ' => 'h',
            'ｉ' => 'i',
            'ｊ' => 'j',
            'ｋ' => 'k',
            'ｌ' => 'l',
            'ｍ' => 'm',
            'ｎ' => 'n',
            'ｏ' => 'o',
            'ｐ' => 'p',
            'ｑ' => 'q',
            'ｒ' => 'r',
            'ｓ' => 's',
            'ｔ' => 't',
            'ｕ' => 'u',
            'ｖ' => 'v',
            'ｗ' => 'w',
            'ｘ' => 'x',
            'ｙ' => 'y',
            'ｚ' => 'z',
        );
        return strtr($str, $arr);
    }
}


//兼容php5.5 array_column 方法
if ( ! function_exists('array_column')){
    function array_column(array $array, $returnvaluekey = null, $returnkey = null) {
        if($returnvaluekey===null) {
            return false;
        }

        $columns = array();
        foreach($array as $key=>$value) {
            if(!is_array($array[$key]) || empty($array[$key])) {
                continue;
            }
            if($returnkey===null) {
                if(isset($array[$key][$returnvaluekey])) {
                    $columns[] = $array[$key][$returnvaluekey];
                }
            }else {
                if(isset($array[$key][$returnkey]) && isset($array[$key][$returnvaluekey])) {
                    $columns[$array[$key][$returnkey]] = $array[$key][$returnvaluekey];
                }
            }
        }
        return $columns;
    }
}

if ( ! function_exists('ci_pager')){
    function ci_pager($url, $total, $page_size = 20, $uri_segment = 3, $suffix = '', $first_url = '', $anchor_class = '', $display_pages = TRUE, $rel = FALSE) {
        $_CI =& get_instance();
        $_CI->load->library('pagination');
        if($total / $page_size > 40){
            $total = $page_size * 40;
        }
        $attr = 'class="'.$anchor_class.'" ';
        if($rel){
            $attr .= ' rel="nofollow" ';
        }
        $config['base_url']        = $url;
        $config['total_rows']      = $total;
        $config['per_page']        = $page_size;
        $config['uri_segment']     = $uri_segment;
        $config['suffix']          = $suffix;
        $config['display_pages']   = $display_pages; 
        $config['anchor_class']    = $attr;
        $config['first_link']      = '<<';
        $config['first_tag_open']  = '';
        $config['first_tag_close'] = '';
        $config['last_link']       = '>>';
        $config['last_tag_open']   = '';
        $config['last_tag_close']  = '';
        $config['next_link']       = '>';
        $config['next_tag_open']   = '';
        $config['next_tag_close']  = '';
        $config['prev_link']       = '<';
        $config['prev_tag_open']   = '';
        $config['prev_tag_close']  = '';
        $config['cur_tag_open']    = '<b>';
        $config['cur_tag_close']   = '</b>';
        $config['num_tag_open']    = '';
        $config['num_tag_close']   = '';
        $config['full_tag_open']   = '';
        $config['full_tag_close']  = '';
        if(!empty($first_url)) $config['first_url'] = $first_url;
        $_CI->pagination->initialize($config); 
        return $_CI->pagination->create_links();
    }
}

if ( ! function_exists('enlarge_number')) {
    function enlarge_number($id,$encode = true) {
        return $encode ? ($id*199 + 4725813) : (intval($id - 4725813))/199;
    }
}


if( ! function_exists('h')){
    function h($str = "") {
        if(is_array($str)) {
            foreach($str as $k => &$v) {
                $v = h($v);
            }
            unset($v);
        } else {
            $str = htmlspecialchars($str);
        }
        return $str;
    }
}

if( ! function_exists('h_decode')){
    function h_decode($str = "") {
        if(is_array($str)) {
            foreach($str as $k => &$v) {
                $v = h_decode($v);
            }
            unset($v);
        } else {
            $str = htmlspecialchars_decode($str);
        }
        return $str;
    }
}

if( ! function_exists('recommend_article')){
	function recommend_article($ids = array()){
		$CI = &get_instance();
		$CI->load->model('MArticle');
		$CI->load->library('memcached');
		$key = 'recommend_article::' . implode('.', $ids);
		if(!($article = $CI->memcached->get($key))){
			$cond = array(array('id IN (' . implode(',', $ids) . ')' => null, 'status' => 1));
			$article = $CI->MArticle->query($cond);
			$CI->memcached->set($key, $article, 10*24*3600);
		}
		return $article;
	}
}

if( ! function_exists('new_article')){
	function new_article(){
		$CI = &get_instance();
		$CI->load->model('MArticle');
		$CI->load->library('memcached');
		$key = 'new_article::';
		if(!($article = $CI->memcached->get($key))){
			$cond = array(array('status' => 1));
			$article = $CI->MArticle->query($cond, 0, 9, array('updated_time' => 'desc'));
			$CI->memcached->set($key, $article, 24*3600);
		}
		return $article;
	}
}

if( ! function_exists('hots_article')){
	function hots_article(){
		$CI = &get_instance();
		$CI->load->model('MArticle');
		$CI->load->library('memcached');
		$key = 'hots_article::';
		if(!($article = $CI->memcached->get($key))){
			$cond = array(array('status' => 1));
			$article = $CI->MArticle->query($cond, 0, 9, array('hits' => 'desc'));
			$cate_id = implode(',', array_column($article, 'cate_id'));
			$cate = array(array('id IN (' . $cate_id . ')' => null));
			$CI->load->model('MCategory');
			$cates = $CI->MCategory->query($cate); 
			$names = array_column($cates, 'name', 'id');
			$pinyin = array_column($cates, 'pinyin', 'id');
			foreach($article as &$value){
				$value['cate_name'] = $names[$value['cate_id']];	
				$value['cate_pinyin'] = $pinyin[$value['cate_id']];	
			}
			$CI->memcached->set($key, $article, 24*3600);
		}
		return $article;
	}
}

if( ! function_exists('relate_article')){
	function relate_article($cate_id = 0, $article_id = 0){
		if(!$cate_id || !$article_id){
			return array();
		}
		$CI = &get_instance();
		$CI->load->model('MArticle');
		$CI->load->library('memcached');
		$key = 'relate_article::'. $cate_id;
		if(!($article = $CI->memcached->get($key))){
			$cond = array(array('status' => 1, 'cate_id' => intval($cate_id)), 'id !=' => intval($article_id));
			$article = $CI->MArticle->query($cond, 0, 6, array('updated_time' => 'desc'));
			$CI->memcached->set($key, $article,24*3600);
		}
		return $article;
	}
}

if( ! function_exists('static_url')){
    function static_url($uri = '') {
        return 'http://www.smartlei.com/' . trim($uri, '/');
    }
}
