<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MDemand extends MY_Model {

    protected $table = "demand";

    function __construct() {
        parent::__construct($this->table);
    }

}
