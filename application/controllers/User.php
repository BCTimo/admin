<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$this->load->model('log_model');
	}
	public function logout(){
		session_start();
		unset($_SESSION);
		session_destroy();
		redirect('/');
	}
	public function checklogin()
	{
		$this->load->helper('url');
		$params=$this->input->post();
		$user=$this->user_model->check_permission($params['account'],$params['password']);
		if(count($user)==1){  
			$_SESSION['name']=$user[0]->account;
			$_SESSION['login']=1;
			$_SESSION['permission']=$user[0]->permission;
			redirect('/');
		}else{//輸入錯誤紀錄LOG
			$data = [
				'IP' => $_SERVER['REMOTE_ADDR'],
				'params' => json_encode($params),
			];
			$this->log_model->save_add($data);
			session_destroy();
			unset($_SESSION);
			redirect('/');
		}
	}
}
