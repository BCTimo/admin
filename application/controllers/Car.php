<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class car extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		///permission check
		session_start();
		$permission='car';
		$pass=in_array($permission, json_decode($_SESSION['permission']));
		if($_SESSION['login']!==1 || $pass!=1){
			redirect('/user/logout');
		}
		///permission check
		$this->load->model('car_model');
		$this->load->model('car_expend_model');
	}
	public function index(){
		$data['list'] = $this->car_model->get_list();
		//取得子項總數
		foreach($data['list'] as $k=>$v){
			$expend_count=$this->car_expend_model->get_list($v->sn);
			//echo '<pre>';print_r($data['list']);die();
			$data['list'][$k]->expend_count=count($expend_count);
		}
		$data['title'] = '車輛';
		$this->load->view('car/car',$data);
	}
	public function add(){
		$data['title'] = '車輛';
		$this->load->view('car/car_add',$data);
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
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'price' => $this->input->post('price'),
			'checkday' => $this->input->post('checkday'),
			'rem' => $this->input->post('rem'),
			'license' => $this->upload->data('file_name'),
		];
		$this->car_model->save_add($data);
		redirect('/car');
	}
	public function edit(){
		$data['title'] = '車輛';
		$sn=$this->uri->segment(3);
		$data['detail'] = $this->car_model->get_detail($sn)[0];
		$this->load->view('car/car_edit',$data);
	}
	public function update(){
		
		$data = [
			'sn' => $this->uri->segment(3),
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'price' => $this->input->post('price'),
			'checkday' => $this->input->post('checkday'),
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

		$this->car_model->update_data($data);
		redirect('/car');
	}
	public function delete(){
		$sn=$this->uri->segment(3);
		$data['detail'] = $this->car_model->delete_data($sn)[0];
		redirect('/car');
	}

}