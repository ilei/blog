<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WebSite extends MY_Model {

    protected $table = "website";

    function __construct() {
        parent::__construct($this->table);
    }

}
