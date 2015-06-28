<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QQSign extends MY_Model {

    protected $table = "qq_sign";

    function __construct() {
        parent::__construct($this->table);
    }

}
