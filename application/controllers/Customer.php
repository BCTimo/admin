<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		///permission check
		session_start();
		$permission='customer';
		$pass=in_array($permission, json_decode($_SESSION['permission']));
		if($_SESSION['login']!==1 || $pass!=1){
			redirect('/user/logout');
		}
		///permission check
		$this->load->model('customer_model');
	}
	public function index(){
		$data['list'] = $this->customer_model->get_list();
		$data['title'] = '客戶';
		$this->load->view('customer/customer',$data);
	}
	public function add(){
		$data['title'] = '客戶';
		$this->load->view('customer/customer_add',$data);
	}
	public function save(){
		//echo '<pre>';print_r($_FILES);die();

		//////file upload 圖片上傳
		// $config['upload_path']          = './uploads/';
		// $config['allowed_types']        = 'gif|jpg|png';
		
		// $this->load->library('upload', $config);
		// $this->upload->do_upload('license');
		// echo '<pre>';print_r($this->upload->data());die();
		//////file upload 圖片上傳

		$data = [
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'address' => $this->input->post('address'),
			'tel' => $this->input->post('tel'),
			'phone' => $this->input->post('phone'),
			'birthday' => $this->input->post('birthday'),
			'rem' => $this->input->post('rem'),
			//'license' => $this->upload->data('file_name'),
		];
		$this->customer_model->save_add($data);
		redirect('/customer');
	}
	public function edit(){
		$data['title'] = '客戶';
		$sn=$this->uri->segment(3);
		$data['detail'] = $this->customer_model->get_detail($sn)[0];
		$this->load->view('customer/customer_edit',$data);
	}
	
	public function update(){
		
		$data = [
			'sn' => $this->uri->segment(3),
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'address' => $this->input->post('address'),
			'tel' => $this->input->post('tel'),
			'phone' => $this->input->post('phone'),
			'birthday' => $this->input->post('birthday'),
			'rem' => $this->input->post('rem'),
		];

		//////file upload 圖片上傳
		// $config['upload_path']          = './uploads/';
		// $config['allowed_types']        = 'gif|jpg|png';
		
		// $this->load->library('upload', $config);
		// $this->upload->do_upload('license');
		// //echo '<pre>';print_r($this->upload->data());die();
		// if($this->upload->data('file_size')!=0){
		// 	$data['license'] = $this->upload->data('file_name');
		// }	
		
		//////file upload 圖片上傳

		$this->customer_model->update_data($data);
		redirect('/customer');
	}
	public function delete(){
		$sn=$this->uri->segment(3);
		$data['detail'] = $this->customer_model->delete_data($sn)[0];
		redirect('/customer');
	}

	public function profile(){
		$sn=$this->uri->segment(3);
		echo json_encode($this->customer_model->get_detail($sn)[0]);
	}

}