<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		session_start();
	}
	public function index()
	{
		if(@$_SESSION['login']===1 && count($_SESSION['permission'])>0){
			$this->load->view('index');
		}else{
			$this->load->view('login');
		}
	}
	
}
