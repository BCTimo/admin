<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class driver extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		///permission check
		session_start();
		$permission='driver';
		$pass=in_array($permission, json_decode($_SESSION['permission']));
		if($_SESSION['login']!==1 || $pass!=1){
			redirect('/user/logout');
		}
		///permission check
		$this->load->model('driver_model');
	}
	public function index(){
		$data['list'] = $this->driver_model->get_list();
		$data['title'] = '司機';
		$this->load->view('driver/driver',$data);
	}
	public function add(){
		$data['title'] = '司機';
		$this->load->view('driver/driver_add',$data);
	}
	public function save(){
		//echo '<pre>';print_r($_FILES);die();

		//////file upload 圖片上傳
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('license');
		//echo '<pre>';print_r($this->upload->data());die();
		//////file upload 圖片上傳

		$data = [
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'tel' => $this->input->post('tel'),
			'phone' => $this->input->post('phone'),
			'bank_account' => $this->input->post('bank_account'),
			'address' => $this->input->post('address'),
			'address2' => $this->input->post('address2'),
			'pay' => $this->input->post('pay'),
			'rem' => $this->input->post('rem'),
			'license' => $this->upload->data('file_name'),
		];
		$this->driver_model->save_add($data);
		redirect('/driver');
	}
	public function edit(){
		$data['title'] = '司機';
		$sn=$this->uri->segment(3);
		$data['detail'] = $this->driver_model->get_detail($sn)[0];
		$this->load->view('driver/driver_edit',$data);
	}
	public function update(){
		
		$data = [
			'sn' => $this->uri->segment(3),
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'tel' => $this->input->post('tel'),
			'phone' => $this->input->post('phone'),
			'bank_account' => $this->input->post('bank_account'),
			'address' => $this->input->post('address'),
			'address2' => $this->input->post('address2'),
			'pay' => $this->input->post('pay'),
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

		$this->driver_model->update_data($data);
		redirect('/driver');
	}
	public function delete(){
		$sn=$this->uri->segment(3);
		$data['detail'] = $this->driver_model->delete_data($sn)[0];
		redirect('/driver');
	}

}