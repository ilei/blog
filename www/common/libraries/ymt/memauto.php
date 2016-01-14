<?php
trait MemAuto {
    public function __call($name, $arguments) {
        $time = NULL;
        $CI =& get_instance();
        $CI->load->library(array('Memcached_thncr'));

        $surffix = substr($name, strrpos($name, '__Cache'));
        if ( $surffix && ($time = intval(ltrim($surffix, '__Cache'))) > 0) {
            //do nothing
        } else {
            throw new Exception('Called function is not defined. And not in MemAuto valid function.');
        }

        $key = __CLASS__ . ':' . $name . ':' . md5(serialize($arguments));
        if ( ($res = $CI->memcached_thncr->get($key)) !== FALSE) {
            return $res;
        }

        $res = call_user_func_array(array($this, rtrim($name, $surffix)), $arguments);

        $CI->memcached_thncr->set($key, $res, $time);
        return $res;
    }
}
