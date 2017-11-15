<?php
class car_expend_model extends CI_Model {
    function __construct(){
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
    }
    //取得列表
    function get_list($gid){
        //$query = $this->db->get('car_expend');
        $query = $this->db->get_where('car_expend', array('gid' => $gid));
        return $query->result();
    }
	//儲存新增
	function save_add($data){
        $data['create_at']=date("YmdHis");
        $this->db->insert('car_expend', $data);
    }
	function get_detail($sn){
        $query = $this->db->get_where('car_expend', array('sn' => $sn));
		return $query->result();
    }
	function update_data($data){
		$this->db->where('sn', $data['sn']);
		$this->db->update('car_expend', $data);
    }
    function delete_data($sn){
        $this->db->delete('car_expend', array('sn' => $sn));
    }
	
}