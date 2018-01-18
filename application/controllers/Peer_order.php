<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peer_order extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		///permission check
		session_start();
		$permission='order_car';
		$pass=in_array($permission, json_decode($_SESSION['permission']));
		if($_SESSION['login']!==1 || $pass!=1){
			redirect('/user/logout');
		}
		///permission check
		$this->load->model('customer_model');
		$this->load->model('car_model');
		$this->load->model('driver_model');
		$this->load->model('peer_order_model');
	}
	public function index(){
		$data['list'] = $this->peer_order_model->get_list();
		$data['title'] = '代訂訂單';
		foreach($data['list'] as $k=>$v){
			$data['list'][$k]->customer_info = $this->customer_model->get_detail($v->customer_id)[0];
		}
		//echo '<pre>';print_r($data);die();
		$this->load->view('Peer_order/peer_order',$data);
	}
	public function add(){
		$data['customer']['list'] = $this->customer_model->get_list();
		// $data['car']['list'] = $this->car_model->get_list();
		// $data['driver']['list'] = $this->driver_model->get_list();
		$data['title'] = '代訂訂單';
		$this->load->view('Peer_order/peer_order_add',$data);
	}
	public function save(){
		$this->load->helper('func');
		//////file upload 圖片上傳
		// $config['upload_path']          = './uploads/';
		// $config['allowed_types']        = 'gif|jpg|png';
		
		// $this->load->library('upload', $config);
		// $this->upload->do_upload('license');
		//echo '<pre>';print_r($this->upload->data());die();
		//////file upload 圖片上傳
		//echo '<pre>';print_r($this->input->post());die();
		$data = [
			'customer_id' => $this->input->post('customer_id'),
			// 'car_id' => $this->input->post('car_id'),
			// 'driver_id' => $this->input->post('driver_id'),
			'name' => $this->input->post('name'),
			'detail' => $this->input->post('detail'),
			'adate' => $this->input->post('adate'),
			'bdate' => $this->input->post('bdate'),
			'atime' => $this->input->post('atime'),
			'btime' => $this->input->post('btime'),
			'cost' => $this->input->post('cost'),
			'price' => $this->input->post('price'),
			'invoice' => $this->input->post('invoice'),
			'rem' => $this->input->post('rem'),
			// 'rem_customer' => $this->input->post('rem_customer'),
			// 'rem_drive' => $this->input->post('rem_drive'),
			'status' => $this->input->post('status'),
		];
		$new_insert_id=$this->peer_order_model->save_add($data);
		//echo '<pre>';print_r($this->input->post());die();
		// /*使用日期每天迴圈  塞入peer_order_d */
		// foreach(date_range($data['adate'],$data['bdate']) as $day){
		// 	$data = [
		// 		'order_id' => $new_insert_id,
		// 		'date' => $day
		// 	];
		// 	foreach($this->input->post('cars') as $k=>$car_id){
		// 		$data['car_id'] = $car_id;
		// 		$data['driver_id'] = $this->input->post('drivers')[$k];
		// 		//塞order_id date car_id	driver_id
		// 		$this->peer_order_model->save_peer_order_d($data);
		// 	}
			
			
		// }
		// /*使用日期每天迴圈  塞入peer_order_d */
		
		redirect('/peer_order');
	}
	public function edit(){
		$sn=$this->uri->segment(3);
		$data['order'] = $this->peer_order_model->get_detail($sn)[0];
		$data['customer'] = $this->customer_model->get_detail($data['order']->customer_id)[0];
		//echo '<pre>';print_r($data);die();
		// $data['car']['list'] = $this->car_model->get_list();
		// $data['driver']['list'] = $this->driver_model->get_list();
		// $data['order_d'] = $this->peer_order_model->get_order_d_g($sn);
		$data['title'] = '代訂訂單';

		
		
		$data['detail'] = $this->peer_order_model->get_detail($sn)[0];
		$this->load->view('Peer_order/peer_order_edit',$data);
	}
	public function update(){
		$this->load->helper('func');
		$data = [
			'sn' => $this->uri->segment(3),
			//'location' => $this->input->post('location'),
			'name' => $this->input->post('name'),
			'detail' => $this->input->post('detail'),
			'adate' => $this->input->post('adate'),
			'bdate' => $this->input->post('bdate'),
			'atime' => $this->input->post('atime'),
			'btime' => $this->input->post('btime'),
			//'org_price' => $this->input->post('org_price'),
			'cost' => $this->input->post('cost'),
			'price' => $this->input->post('price'),
			'invoice' => $this->input->post('invoice'),
			'rem' => $this->input->post('rem'),
			// 'rem_customer' => $this->input->post('rem_customer'),
			// 'rem_drive' => $this->input->post('rem_drive'),
			'status' => $this->input->post('status'),
		];

		$this->peer_order_model->update_data($data);
/*
		//////file upload 圖片上傳
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('license');
		//echo '<pre>';print_r($this->upload->data());die();
		if($this->upload->data('file_size')!=0){
			$data['license'] = $this->upload->data('file_name');
		}	
		
		//////file upload 圖片上傳
*/
		// /*使用日期每天迴圈  塞入peer_order_d */
		// $this->peer_order_model->clear_order_d($data['sn']); //清除現有的
		// foreach(date_range($data['adate'],$data['bdate']) as $day){
		// 	$data = [
		// 		'order_id' => $this->uri->segment(3),
		// 		'date' => $day
		// 	];
		// 	foreach($this->input->post('cars') as $k=>$car_id){
		// 		$data['car_id'] = $car_id;
		// 		$data['driver_id'] = $this->input->post('drivers')[$k];
		// 		//塞order_id date car_id	driver_id
		// 		$this->peer_order_model->save_peer_order_d($data);  //重新add 無限新增區
		// 	}
		// }
		// /*使用日期每天迴圈  塞入peer_order_d */
		
		
		redirect('/peer_order');
	}
	// public function driver_reply(){
	// 	//echo '<pre>';print_r($this->input->post());die();
	// 	$data = [
	// 		'sn' => $this->input->post('sn'),
	// 		'driver_reply' => $this->input->post('context'),
	// 		'reply_time' => date("YmdHis"),
	// 	];
	// 	$this->peer_order_model->save_reply($data);
	// }
	// public function ch_readytogo(){
	// 	$data = [
	// 		'sn' => $this->input->post('sn'),
	// 		'readytogo' => $this->input->post('readytogo'),
	// 	];
	// 	$this->peer_order_model->update_data($data);
	// }
	// public function delete(){
	// 	$sn=$this->uri->segment(3);
	// 	$data['detail'] = $this->peer_order_model->delete_data($sn)[0];
	// 	redirect('/peer_order');
	// }

}