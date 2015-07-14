<?php

class RssChannel{
	
	protected $CI = null;
	public function __construct(){
		$this->CI = & get_instance();
	}

	public function add_channel($url, $category, $title = null, $desc = null, $tags = null){
		if(!$url || strlen($url) <= 7 || !intval($category)){
			return false;	
		}		
		$this->CI->load->model('RChannel');
		$url = mysql_real_escape_string(sanitize(str_replace('&amp;', '&', $url), 1));
		$res = $this->CI->RChannel->query(array(array('url' => $url)));
		if($res){
			return false;
		}
		$this->CI->load->file(APPPATH.'third_party/magpierss/rss_fetch.inc');
		$pos = $this->CI->RChannel->get_max_position();
		$rss = fetch_rss($url);		
		var_dump($rss);
	}
}