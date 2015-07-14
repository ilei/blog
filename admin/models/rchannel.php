<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RChannel extends MY_Model {

    protected $table = "rss_channel";

    function __construct() {
        parent::__construct($this->table);
    }

	public function get_max_position(){
		$sql = 'SELECT 1+MAX(position) as pos FROM ' . $this->table ;
		$res = $this->db->query($sql)->first_row();
		return $res ? $res : 0;
	}

}
