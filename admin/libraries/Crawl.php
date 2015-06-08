<?php
/**
 * @author Leiming Wang<wlm131127@163.com>
 */


class Crawl {


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
	public function start($users, $urls){
		list($username, $password) = $users;
		list($login, $base, $bank, $qq) = $urls;	
		$cookie_jar = '/tmp/cookie.txt';

		$post  = "txtUserName={$username}&txtPassword={$password}";

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
		$this->CurlRequest($login, $option);

		$option = array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_COOKIEJAR      => $cookie_jar,
			CURLOPT_COOKIEFILE     => $cookie_jar,
			CURLOPT_FOLLOWLOCATION => 1,
		);

		$base_info  = $this->CurlRequest($base, $option);
		//$order_info = $this->CurlRequest($order, $option);
		$bank_info  = $this->CurlRequest($bank, $option);
		$qq_info    = $this->CurlRequest($qq, $option);
		$base = $this->preg_base($base_info);
		$bank = $this->preg_bank($bank_info);
		$qq   = $this->preg_qq($qq_info);
		return array($base, $bank, $qq); 
	}

	private function preg_base($base_info){
			$in = '/<input[^>].*?name\=[\"|\']{1}([^\"]*?)[\"|\']{1}[^>].*?value\=[\"|\']{1}([^\"]*?)[\"|\']{1}/i';	
			$te = '/<textarea[^>].*?name\=[\"|\']{1}([^\"]*?)[\"|\']{1}[^>].*?>([^<]*?)<\/textarea>/i' ; 
			preg_match_all($in, $base_info, $input);
			preg_match_all($te, $base_info, $texts);
			$base = array_merge(array_combine($input[1], $input[2]), array_combine($texts[1], $texts[2]));
			return $base;
	}

	private function preg_bank($bank_info){
		$bank = '/bgcolor=\"#FFFFFF\">([^\"]*?)<\/td>/i';	
		preg_match_all($bank, $bank_info, $matches);
		return $matches[1];
	}

	private function preg_qq($qq_info){
		$qq = '/bgcolor=\"#FFFFFF\">([^\"]*?)<\/td>/i';	
		preg_match_all($qq, $qq_info, $matches);
		return $matches[1];
	
	}

}
