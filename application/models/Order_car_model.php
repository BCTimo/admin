<?php
class order_car_model extends CI_Model {
    function __construct(){
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
    }
    //取得列表
    function get_list(){
        $query = $this->db->get('order_car');
        return $query->result();
    }
	//儲存新增
	function save_add($data){
        $data['order_date']=date("YmdHis");
        $data['create_at']=date("YmdHis");
        $this->db->insert('order_car', $data);
        return $this->db->insert_id();
    }
	function get_detail($sn){
        $query = $this->db->get_where('order_car', array('sn' => $sn));
		return $query->result();
    }
	function update_data($data){
		$this->db->where('sn', $data['sn']);
		$this->db->update('order_car', $data);
    }
    function delete_data($sn){
        $this->db->delete('order_car', array('sn' => $sn));
    }
    function save_order_car_d($data){
        // $data['order_date']=date("YmdHis");
        // $data['create_at']=date("YmdHis");
        $this->db->insert('order_car_d', $data);
        return $this->db->insert_id();
    }
    
	function get_order_d(){
        //$query = $this->db->get('order_car_d');
        $sql='
            select od.*,c.code as car_code,c.name as car_name,c.type as car_type, o.atime,o.btime,o.location,rem_drive,readytogo,
            d.name as driver_name,d.phone as driver_phone 
            from order_car_d od 
            left join order_car o on o.sn = od.order_id
            left join car c on c.sn = od.car_id
            left join driver d on d.sn = od.driver_id
        ';
        $query=$this->db->query($sql);
        return $query->result();
    }
    function save_reply($data){
        $data['reply_time']=date("YmdHis");
        $this->db->where('sn', $data['sn']);
		$this->db->update('order_car_d', $data);
    }
}