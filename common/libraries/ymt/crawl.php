<?php
/**
 * 抓取类
 */

class Crawl {

    private $requests = array();

    public function __construct(){
        $this->CI = &get_instance();
        $this->CI->config->load('soa',TRUE);
        $this->soaconfig = $this->CI->config->item('soa');
    }

    function baidu_weight($host) {
        $url = "http://mytool.chinaz.com/baidusort.aspx?host=" . $host;
        $page = $this->_get_page($url);
        $weight = $this->_analyze_weight($page);
        return $weight ? $weight : $this->_analyze_weight($page);
    }

    function add($resource_url,$payload=FALSE,$debug=FALSE){
        $this->requests[] = array(
            'resource_url'  => $resource_url,
            'payload'       => $payload,
            'debug'         => $debug
        );
    }

    function _m_get_page(){
        $mh = curl_multi_init(); // init the curl Multi
        $chs = array();
        foreach($this->requests as $request){
            $ch = $this->build_ch($request['resource_url'],$this->soaconfig["FETCH_TIME_OUT"],$request['payload']);
            $chs[] = array($ch,$request['debug']);
            curl_multi_add_handle($mh,$ch);
        }

        $active = null;
        //execute the handles
        do{
            curl_multi_exec($mh, $active);
            curl_multi_select($mh);
        }while($active > 0);

        $res = array();
        foreach ($chs as $item) {
            list($ch,$debug) = $item;
            $j = curl_multi_getcontent($ch);
            curl_multi_remove_handle($mh, $ch); // remove the handle (assuming  you are done with it);

            if($debug){
                var_dump($j);
            }

            $j = json_decode($j,TRUE);
            if($j && ((isset($j['status']) && (int)$j['status'] == 0) || isset($j['count']))){
                $res[] = $j;
            }else{
                $res[] = FALSE;
            }

        }

        curl_multi_close($mh);
        //clear the requests
        $this->requests = array();
        return $res;
    }

    function msoarpc(){
        $mh = curl_multi_init(); // init the curl Multi
        $chs = array();
        foreach($this->requests as $request){
            $url = sprintf("%s%s",$this->soaconfig["SOA_SERVER"],$request['resource_url']);
            $ch = $this->build_ch($url,$this->soaconfig["FETCH_TIME_OUT"],$request['payload']);
            $chs[] = array($ch,$request['debug']);
            curl_multi_add_handle($mh,$ch);
        }

        $active = null;
        //execute the handles
        do{
            curl_multi_exec($mh, $active);
            curl_multi_select($mh);
        }while($active > 0);

        $res = array();
        foreach ($chs as $item) {
            list($ch,$debug) = $item;
            $j = curl_multi_getcontent($ch);
            curl_multi_remove_handle($mh, $ch); // remove the handle (assuming  you are done with it);

            if($debug){
                var_dump($j);
            }

            $j = json_decode($j,TRUE);
            if($j && isset($j['status']) && (int)$j['status'] == 0){
                $res[] = $j;
            }else{
                $res[] = FALSE;
            }

        }

        curl_multi_close($mh);
        //clear the requests
        $this->requests = array();
        return $res;
    }

    function pay_soarpc($resource_url,$payload=FALSE,$debug=FALSE){
        $url = sprintf("%s%s",$this->soaconfig["PAY_SOA_SERVER"],$resource_url);
        return $this->_soa_page($url, $payload, $debug);
    }

    function soarpc($resource_url,$payload=FALSE,$debug=FALSE){
        $url = sprintf("%s%s",$this->soaconfig["SOA_SERVER"],$resource_url);
        return $this->_soa_page($url, $payload, $debug);
    }

    private function _soa_page($url, $payload = FALSE, $debug = FALSE){
        $header = array("Content-Type" => "application/json");
        for($i=0;$i<$this->soaconfig["MAX_FETCH_COUNT"];$i++){
            $j = $this->_get_page($url,$this->soaconfig["FETCH_TIME_OUT"],$payload, $header);
            if($debug){
                var_dump($url,$j);
            }
            if(!$j){
                continue;
            }

            $j = json_decode($j,TRUE);
            if(!$j){
                continue;
            }

            if(!isset($j["status"]) || (int)$j["status"] !== 0){
                continue;
            }
            return $j;
        }

        return FALSE;
    }

    function _get_page($url,$timeout=1,$payload=FALSE, $header = FALSE) {
        $ch = $this->build_ch($url,$timeout,$payload, $header);
        $page = curl_exec($ch);
        $resp = explode("\r\n\r\n", $page);
        // 由于设置了http头，要求必须返回json
        // 因此返回的内容体会有多个区域，用\r\n\r\n区隔
        // 如果返回了多个内容，取最后的一个
        $body = $resp[count($resp) - 1];
        curl_close($ch);
        return $body;
    }

    function _analyze_weight($page) {
        preg_match("|百度权重为.*?>([0-9])<.*?共找到|", $page, $matches);
        return ($matches && $matches[1]) ? $matches[1] : -1;
    }

    private function build_ch($url,$timeout=1,$payload=FALSE, $header = FALSE){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107");
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        if($payload !== FALSE){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        }

        if($header !== FALSE){
            if(is_array($header)){
                $tmp = array();
                foreach($header as $key => $value){
                    $tmp[] = trim($key) . ':' . trim($value);  
                }
                curl_setopt($ch, CURLOPT_HEADER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $tmp);
            } 
        }else{
            curl_setopt($ch, CURLOPT_HEADER, 0);
        }
        return $ch;
    }

    public function ysoarpc($url, $payload = FALSE, $header = FALSE, $debug = FALSE){
        $url = sprintf("%s", $url);
        for($i=0;$i<$this->soaconfig["MAX_FETCH_COUNT"];$i++){
            $j = $this->_get_page($url,$this->soaconfig["FETCH_TIME_OUT"],$payload, $header);
            if($debug){
                var_dump($url,$payload ,$header, $j);
            }
            if(!$j){
                continue;
            }
            if(strpos($j, '{') !== FALSE){
                $j = mb_substr($j, stripos($j, '{'));
            }
            $j = json_decode($j,TRUE);
            if(!$j){
                continue;
            }
            if(isset($j['errcode'])){
                continue;
            }
            return $j;
        }
        return FALSE;
    }
}

