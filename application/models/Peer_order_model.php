<?php
class peer_order_model extends CI_Model {
    function __construct(){
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
    }
    //取得列表
    function get_list(){
        $query = $this->db->get('peer_order');
        return $query->result();
    }
	//儲存新增
	function save_add($data){
        $data['order_date']=date("YmdHis");
        $data['create_at']=date("YmdHis");
        $this->db->insert('peer_order', $data);
        return $this->db->insert_id();
    }
	function get_detail($sn){
        $query = $this->db->get_where('peer_order', array('sn' => $sn));
		return $query->result();
    }
	function update_data($data){
		$this->db->where('sn', $data['sn']);
		$this->db->update('peer_order', $data);
    }
    function delete_data($sn){
        $this->db->delete('peer_order', array('sn' => $sn));
    }
    function save_peer_order_d($data){
        // $data['order_date']=date("YmdHis");
        // $data['create_at']=date("YmdHis");
        $this->db->insert('peer_order_d', $data);
        return $this->db->insert_id();
    }
    
	function get_order_d($order_id=''){
        //$query = $this->db->get('peer_order_d');
        $sql='
            select od.*,c.code as car_code,c.name as car_name,c.type as car_type, o.atime,o.btime,o.location,rem_drive,readytogo,
            d.name as driver_name,d.phone as driver_phone 
            from peer_order_d od 
            left join peer_order o on o.sn = od.order_id
            left join car c on c.sn = od.car_id
            left join driver d on d.sn = od.driver_id
        ';
        if($order_id!=''){
            $sql.='where order_id = '.$order_id;
        }
       
        $query=$this->db->query($sql);
        return $query->result();
    }
    function get_order_d_g($order_id=''){
        //$query = $this->db->get('peer_order_d');
        $sql='
            SELECT * FROM `peer_order_d` where order_id = '.$order_id.' group by car_id,driver_id
        ';
        $query=$this->db->query($sql);
        return $query->result();
    }
    function driver_mode_get_order_d($driver=''){
        //$query = $this->db->get('peer_order_d');
        $sql='
            select od.*,c.code as car_code,c.name as car_name,c.type as car_type, o.atime,o.btime,o.location,rem_drive,readytogo,
            d.name as driver_name,d.phone as driver_phone 
            from peer_order_d od 
            left join peer_order o on o.sn = od.order_id
            left join car c on c.sn = od.car_id
            left join driver d on d.sn = od.driver_id
        ';
        if($driver!==''){
            $sql.='where readytogo=1 and od.driver_id = '.$driver;
        }
        $query=$this->db->query($sql);
        return $query->result();
    }
    function save_reply($data){
        $data['reply_time']=date("YmdHis");
        $this->db->where('sn', $data['sn']);
		$this->db->update('peer_order_d', $data);
    }
    function clear_order_d($order_sn){
        $data['reply_time']=date("YmdHis");
        $this->db->where('order_id', $order_sn);
		$this->db->delete('peer_order_d');
    }
}