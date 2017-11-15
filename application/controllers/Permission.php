<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class permission extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		///permission check
		session_start();
		$permission='permission';
		$pass=in_array($permission, json_decode($_SESSION['permission']));
		if($_SESSION['login']!==1 || $pass!=1){
			redirect('/user/logout');
		}
		///permission check
		$this->load->model('permission_model');
	}
	public function index(){
		$data['list'] = $this->permission_model->get_list();
		$data['title'] = '管理員';
		$this->load->view('permission/permission',$data);
	}
	public function add(){
		$data['title'] = '管理員';
		$this->load->view('permission/permission_add',$data);
	}
	public function save(){
		//echo '<pre>';print_r($_FILES);die();

		// //////file upload 圖片上傳
		// $config['upload_path']          = './uploads/';
		// $config['allowed_types']        = 'gif|jpg|png';
		
		// $this->load->library('upload', $config);
		// $this->upload->do_upload('license');
		// //echo '<pre>';print_r($this->upload->data());die();
		// //////file upload 圖片上傳

		$data = [
			'account' => $this->input->post('account'),
			'password' => $this->input->post('password'),
			'permission' => json_encode($this->input->post('permission')),
		];
		$this->permission_model->save_add($data);
		redirect('/permission');
	}
	public function edit(){
		$data['title'] = '管理員';
		$sn=$this->uri->segment(3);
		$data['detail'] = $this->permission_model->get_detail($sn)[0];
		$data['permissions']=json_decode($data['detail']->permission);
		
		$this->load->view('permission/permission_edit',$data);
	}
	public function update(){
		
		$data = [
			'sn' => $this->uri->segment(3),
			'account' => $this->input->post('account'),
			'password' => $this->input->post('password'),
			'permission' => json_encode($this->input->post('permission')),
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

		$this->permission_model->update_data($data);
		redirect('/permission');
	}
	public function delete(){
		$sn=$this->uri->segment(3);
		$data['detail'] = $this->permission_model->delete_data($sn)[0];
		redirect('/permission');
	}

}