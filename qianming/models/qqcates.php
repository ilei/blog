<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QQCates extends MY_Model {

    protected $table = "qq_cates";

    function __construct() {
        parent::__construct($this->table);
    }

}
