<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class driver_mode extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('customer_model');
		$this->load->model('car_model');
		$this->load->model('driver_model');
		$this->load->model('order_car_model');
		session_start();
		
		///permission check
		if($_SESSION['login']!==1 || @$_SESSION['driver_sn']!==''){
			$pass=1;		
		}
		if($_SESSION['login']!==1 || $pass!=1){
			redirect('/user/logout');
		}
		///permission check
	}
	public function index(){
		isset($_SESSION['driver_sn'])?$driver=$_SESSION['driver_sn']:$driver='';
		$data['list'] = $this->order_car_model->driver_mode_get_order_d($driver);
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
		$this->load->view('Drvier_mode/calendar',$data);
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

}