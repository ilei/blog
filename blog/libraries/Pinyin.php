<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . 'third_party/pinyin/index.php');
class Pinyin{

    public function pinyin($data = ''){
        return Spell::parse(trim($data));
    } 
}
