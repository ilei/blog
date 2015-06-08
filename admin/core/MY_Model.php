<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class MY_model 
 * @author Wang Leiming<wlm131127@163.com>
 */
class MY_Model extends CI_Model {

    protected $table = NULL;

    public function __construct($table = NULL) {
        $this->table = $table;
        parent::__construct();
    }

    public function switch_db($db = 'default') {
        if ($db === 'default') {
            unset($this->db);
        } else {
            $this->db = $this->load->database($db, TRUE);
        }
    }

    public function get($id) {
        return $this->getBy('id', $id);
    }

    public function getBy($name, $value) {
        if(!empty($value) && is_array($value)){
            $this->db->where_in($name, $value);
        }else{
            $this->db->where($name, $value);
        }
        $res = $this->db->get($this->table);
        return $res ? $res->result_array() : FALSE;
    }

    public function query($query = array(), $start = 0, $size = 0, $order_by = array()) {
        foreach($query as $condition) {
            foreach($condition as $key => $value) {
                if(is_array($value)){
                    $this->db->where_in($key, $value);
                }else{
                    $this->db->where($key, $value);
                }
            }
        }
        if($size > 0) {
            $this->db->limit($size, $start);
        }

        foreach($order_by as $field => $order) {
            $this->db->order_by($field, $order);
        }

        $res = $this->db->get($this->table);
        return $res ? $res->result_array() : FALSE;
    }

    public function count($query) {
        foreach($query as $condition) {
            foreach($condition as $key => $value) {
                if(is_array($value)){
                    $this->db->where_in($key, $value);
                }else{
                    $this->db->where($key, $value);
                }
            }
        }
        return $this->db->count_all_results($this->table);
    }

    public function countBy($name_arr, $value_arr) {
        foreach ($name_arr as $key => $name) {
            $this->db->where($name, $value_arr[$key]);
        }
        return $this->db->count_all_results($this->table);
    }

    public function add($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data){
        return call_user_func_array(array($this, 'updateBy'), array('id', $id, $data));
    }

    public function updateBy($name, $value, $data){
        return $this->db->update($this->table, $data, array($name => $value));
    }

    public function addIgnore($data) {
        $insert_query = $this->db->insert_string($this->table, $data);
        $insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
        return $this->db->query($insert_query);
    }

    public function delete($id) {
        return call_user_func_array(array($this, 'deleteBy'), array('id', $id));
    }

    public function deleteBy($name, $value){
        return $this->db->delete($this->table, array($name => $value));
    }

	public function save($data, $id = 0){
		$data['updated_time'] = time();
		if(!$id){
			$data['created_time'] = time();	
			$this->add($data);
		}else{
			$this->update($id, $data);
		}
	}

}

