<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class calendar extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		///permission check
		session_start();
		$permission='calendar';
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
		$data['list'] = $this->order_car_model->get_order_d();
		//echo '<pre>';print_r($data['list']);die();
		foreach($data['list'] as $k => $v){
			//$v->readytogo==1?$readytogo=' 派車 ':$readytogo='==未確認==';
			if($v->readytogo==1){
				//$readytogo=' 派車 ';
			}else{
				//$readytogo='==未確認==';
				$v->car_type="gray";
			}
			$v->driver_name?$driver_name='('.$v->driver_name.')':$driver_name='';
			$data['event'][$k]['sn'] = $v->sn;
			$data['event'][$k]['title'] = $v->car_name.$driver_name;
			$data['event'][$k]['start'] = $v->date;
			$data['event'][$k]['data'] = $v;
			switch($v->car_type){
				case 1:$data['event'][$k]['color'] = 'red';break;
				case 2:$data['event'][$k]['color'] = 'orange';break;
				case 3:$data['event'][$k]['color'] = 'black';break;
				case 4:$data['event'][$k]['color'] = 'blue';break;
				default : $data['event'][$k]['color'] = 'gray';break;
			}
		}
		
		$data['event']=@json_encode($data['event']);
		$this->load->view('calendar/calendar',$data);
	}

}