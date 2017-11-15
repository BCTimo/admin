<?php
class log_model extends CI_Model {
    function __construct(){
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
    }
    //取得列表
    function get_list(){
        $query = $this->db->get('log');
        return $query->result();
    }
	//儲存新增
	function save_add($data){
        $this->db->insert('log', $data);
    }
	function get_detail($sn){
        $query = $this->db->get_where('log', array('sn' => $sn));
		return $query->result();
    }
	function update_data($data){
		$this->db->where('sn', $data['sn']);
		$this->db->update('log', $data);
    }
    function delete_data($sn){
        $this->db->delete('log', array('sn' => $sn));
    }
	
}