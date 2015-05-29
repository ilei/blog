<?php
require_once 'sphinxapi.php';

class Sphinx extends SphinxClient{
    public function __construct() {
        parent::SphinxClient();
        $ci = get_instance();
        $ci->load->config('sphinx', TRUE);
        $this->config = $ci->config->item('sphinx');
        foreach($this->config as $k => $i) {
            @call_user_func_array(array($this, 'Set' . $k), $i);
        }
        $this->SetSortMode(SPH_SORT_EXTENDED, '@weight DESC, @id DESC');
    }
}
