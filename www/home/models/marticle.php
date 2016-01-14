<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MArticle extends MY_Model {

    protected $table = "article";

    function __construct() {
        parent::__construct($this->table);
    }

    public function save($data, $id = 0){
        $data['updated_time'] = $this->input->server('REQUEST_TIME');
        if($id > 0){
            return $this->update(intval($id), $data);
        }else{
            $data['created_time'] = $this->input->server('REQUEST_TIME');
            $data['status'] = isset($data['status']) ? intval($data['status']) : 1;
            return $this->add($data);
        }
    }

}
