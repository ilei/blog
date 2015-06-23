<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WebSiteInfo extends MY_Model {

    protected $table = "website_info";

    function __construct() {
        parent::__construct($this->table);
    }

}
