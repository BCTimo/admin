<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class car_expend extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		///permission check
		session_start();
		$permission='car_expend';
		$pass=in_array($permission, json_decode($_SESSION['permission']));
		if($_SESSION['login']!==1 || $pass!=1){
			redirect('/user/logout');
		}
		///permission check
		$this->load->model('car_expend_model');
	}
	public function index(){
		$data['gid']=$this->uri->segment(3);
		$data['list'] = $this->car_expend_model->get_list($data['gid']);
		$data['title'] = '車輛支出';
		$this->load->view('car_expend/car_expend',$data);
	}
	public function add(){
		$data['gid']=$this->uri->segment(3);
		$data['title'] = '車輛支出';
		$this->load->view('car_expend/car_expend_add',$data);
	}
	public function save(){
		//echo '<pre>';print_r($_FILES);die();

		//////file upload 圖片上傳
		// $config['upload_path']          = './uploads/';
		// $config['allowed_types']        = 'gif|jpg|png';
		
		// $this->load->library('upload', $config);
		// $this->upload->do_upload('license');
		//echo '<pre>';print_r($this->upload->data());die();
		//////file upload 圖片上傳

		$data = [
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'rem' => $this->input->post('rem'),
			'date' => $this->input->post('date'),
			//'license' => $this->upload->data('file_name'),
		];
		$data['gid']=$this->uri->segment(3);
		$this->car_expend_model->save_add($data);
		redirect('/car_expend/index/'.$data['gid']);
	}
	public function edit(){
		$data['gid']=$this->uri->segment(3);
		$data['title'] = '車輛支出';
		$data['sn']=$this->uri->segment(4);
		$data['detail'] = $this->car_expend_model->get_detail($data['sn'])[0];
		$this->load->view('car_expend/car_expend_edit',$data);
	}
	public function update(){
		
		$data = [
			'sn' => $this->uri->segment(4),
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'rem' => $this->input->post('rem'),
			'date' => $this->input->post('date'),
		];

		// //////file upload 圖片上傳
		// $config['upload_path']          = './uploads/';
		// $config['allowed_types']        = 'gif|jpg|png';
		
		// $this->load->library('upload', $config);
		// $this->upload->do_upload('license');
		// //echo '<pre>';print_r($this->upload->data());die();
		// if($this->upload->data('file_size')!=0){
		// 	$data['license'] = $this->upload->data('file_name');
		// }	
		
		// //////file upload 圖片上傳
		$this->car_expend_model->update_data($data);
		$data['gid']=$this->uri->segment(3);
		redirect('/car_expend/index/'.$data['gid']);
	}
	public function delete(){
		$data['gid']=$this->uri->segment(3);
		$data['sn']=$this->uri->segment(4);
		$data['detail'] = $this->car_expend_model->delete_data($data['sn'])[0];
		redirect('/car_expend/index/'.$data['gid']);
	}

}