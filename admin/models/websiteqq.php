<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WebSiteQQ extends MY_Model {

    protected $table = "website_qq";

    function __construct() {
        parent::__construct($this->table);
    }

}
