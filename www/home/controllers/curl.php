<?php
/**
 * @author Leiming Wang<wlm131127@163.com>
 */


class Curl extends MY_Controller{


	public function __construct(){
		parent::__construct();
	}
	/*
	 * curl请求
	 * @param string $url
	 * @param array $option
	 * @return mixed $return;
	 */

	public function CurlRequest($url,$options){
		$return = false;
		$tmp = '';
		$ch = curl_init($url);
		curl_setopt_array($ch, $options);
		$tmp = curl_exec($ch);
		if($tmp){
			$return  = $tmp;
		}
		curl_close($ch);
		return $return;
	}

	/**
	 * 登录CNZZ网站,并取得相应账户下网站列表昨日的IP及PV量
	 * @param array $params
	 * @return mixed $return 登录后网站的内容  or FALSE(登录失败)
	 */
	public function login($params = array()){
		$return  = false;
		$webList = '';
		$cookie_jar = '/tmp/cookie.txt';
		$siteIdArray = array();

		//登录CNZZ网站
		$url1 = 'http://mlt320.78ws.com/admin/checkLogin.asp?ac=login';
		$post = 'txtUserName=3196479320&txtPassword=wangleiming03184';
		$option = array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_FOLLOWLOCATION => 1,
			CURLOPT_HEADER         => 0,
			CURLOPT_NOBODY         => 0,
			CURLOPT_POST           => 1,
			CURLOPT_POSTFIELDS     => $post,
			CURLOPT_COOKIEJAR      => $cookie_jar,    
			CURLOPT_COOKIEFILE     => $cookie_jar,
		);
		$this->CurlRequest($url1,$option);
		$option = array(
			CURLOPT_RETURNTRANSFER => 0,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_COOKIEJAR      => $cookie_jar,
			CURLOPT_COOKIEFILE     => $cookie_jar,
			CURLOPT_FOLLOWLOCATION => 1,
		);
		$url = 'http://mlt320.78ws.com/admin/index.asp';
		$webList = $this->CurlRequest($url,$option);
		//header('Location: http://mlt320.78ws.com/admin/index.asp');
	}

}
