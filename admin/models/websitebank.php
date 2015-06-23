<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WebSiteBank extends MY_Model {

    protected $table = "website_bank";

    function __construct() {
        parent::__construct($this->table);
    }

}
