<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order_car extends CI_Controller {
	
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
		$this->load->model('order_car_model');
	}
	public function index(){
		$data['list'] = $this->order_car_model->get_list();
		$data['title'] = '訂單';
		foreach($data['list'] as $k=>$v){
			$data['list'][$k]->customer_info = $this->customer_model->get_detail($v->customer_id)[0];
		}
		//echo '<pre>';print_r($data);die();
		$this->load->view('Order_car/order_car',$data);
	}
	public function add(){
		$data['customer']['list'] = $this->customer_model->get_list();
		$data['car']['list'] = $this->car_model->get_list();
		$data['driver']['list'] = $this->driver_model->get_list();
		$data['title'] = '訂單';
		$this->load->view('Order_car/order_car_add',$data);
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
			'location' => $this->input->post('location'),
			'adate' => $this->input->post('adate'),
			'bdate' => $this->input->post('bdate'),
			'atime' => $this->input->post('atime'),
			'btime' => $this->input->post('btime'),
			'org_price' => $this->input->post('org_price'),
			'special_price' => $this->input->post('special_price'),
			'invoice' => $this->input->post('invoice'),
			'rem' => $this->input->post('rem'),
			'rem_customer' => $this->input->post('rem_customer'),
			'rem_drive' => $this->input->post('rem_drive'),
			'status' => $this->input->post('status'),
		];
		$new_insert_id=$this->order_car_model->save_add($data);
		//echo '<pre>';print_r($this->input->post());die();
		/*使用日期每天迴圈  塞入order_car_d */
		foreach(date_range($data['adate'],$data['bdate']) as $day){
			$data = [
				'order_id' => $new_insert_id,
				'date' => $day
			];
			foreach($this->input->post('cars') as $k=>$car_id){
				$data['car_id'] = $car_id;
				$data['driver_id'] = $this->input->post('drivers')[$k];
				//塞order_id date car_id	driver_id
				$this->order_car_model->save_order_car_d($data);
			}
			
			
		}
		/*使用日期每天迴圈  塞入order_car_d */
		
		redirect('/order_car');
	}
	public function edit(){
		$data['customer']['list'] = $this->customer_model->get_list();
		$data['car']['list'] = $this->car_model->get_list();
		$data['driver']['list'] = $this->driver_model->get_list();
		$data['title'] = '訂單';

		$sn=$this->uri->segment(3);
		
		$data['detail'] = $this->order_car_model->get_detail($sn)[0];
		$this->load->view('Order_car/order_car_edit',$data);
	}
	public function update(){
		
		$data = [
			'sn' => $this->uri->segment(3),
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'price' => $this->input->post('price'),
			'rem' => $this->input->post('rem'),
		];

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

		$this->order_car_model->update_data($data);
		redirect('/order_car');
	}
	public function driver_reply(){
		//echo '<pre>';print_r($this->input->post());die();
		$data = [
			'sn' => $this->input->post('sn'),
			'driver_reply' => $this->input->post('context'),
			'reply_time' => date("YmdHis"),
		];
		$this->order_car_model->save_reply($data);
	}
	
	// public function delete(){
	// 	$sn=$this->uri->segment(3);
	// 	$data['detail'] = $this->order_car_model->delete_data($sn)[0];
	// 	redirect('/order_car');
	// }

}