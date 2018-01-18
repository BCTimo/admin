<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>後台管理系統</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url();?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url();?>/plugins/datepicker/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url();?>/plugins/select2/select2.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <section id="main_header">
  <?php $this->load->view('include/main_header.php'); ?>
  </section>

  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1><?=$title?>資料</h1>
		<!--
		<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Tables</a></li>
		<li class="active">Simple</li>
		</ol>
		-->
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<form action="<?=base_url();?>peer_order/update/<?=$detail->sn?>" method="post" role="form" enctype="multipart/form-data">
	  <div class="col-md-6">
		  <div class="box box-primary">
			  <div class="box-header with-border">
				  <h3 class="box-title">修改<?=$title?> <?=date("Y/m/d")?></h3>
			  </div>
			  <div class="box-footer">
				  <button type="button" onclick="history.go(-1)" class="btn btn-danger">取消</button>
			  </div>
			  <!-- /.box-header -->
			  <!-- form start -->
			  
				  <div class="box-body">
					  <label><h4><?=$customer->name?></h4></label>
					  <div class="form-group">電話：<?=$customer->tel?></div>
					  <div class="form-group">手機：<?=$customer->phone?></div>
					  <div class="form-group">地址：<?=$customer->address?></div>
					  <div class="form-group">備註：<?=$customer->rem?></div>
				  </div>

				  <div id="cust_profile"></div>
				  <div class="box-body">
					  <label>訂單備註</label>
					  <div class="form-group">
						  <textarea name="rem" rows="8" cols="50"><?=$order->rem?></textarea>
					  </div>
				  </div>
				  <div class="box-body">
					  <label>訂單狀態</label>
					  <div class="form-group">
						  <label>報價未收 <input type="radio" name="status" value="1" <?php if($order->status==1){echo 'checked';} ?>></label>&nbsp;&nbsp;
						  <label>已收款 <input type="radio" name="status" value="2" <?php if($order->status==2){echo 'checked';} ?>></label>&nbsp;&nbsp;
						  <label>已開發票 <input type="radio" name="status" value="3" <?php if($order->status==3){echo 'checked';} ?>></label>&nbsp;&nbsp;
						  <label>結案 <input type="radio" name="status" value="4" <?php if($order->status==4){echo 'checked';} ?>></label>&nbsp;&nbsp;
						  <label>取消 <input type="radio" name="status" value="5" <?php if($order->status==5){echo 'checked';} ?>></label>
					  </div>
				  </div>
			  <!--
				  <div class="box-body">
					  <label>行照</label>
					  <div class="form-group">
						  <input type="file" name="license" class="form-control" placeholder="" >
					  </div>
				  </div>
			  -->
				  <!--
				  <div class="box-body">
					  <label>日期:</label>
					  <div class="input-group date">
						  <div class="input-group-addon">
							  <i class="fa fa-calendar"></i>
						  </div>
						<input type="text" name="date" class="form-control pull-right" id="datepicker">
					  </div>
				  </div>
				  -->

		  </div>

	  </div>
	  <!-- /.col -->
	  <div class="col-md-6">
		  <div class="box box-success">
			  <div class="box-header with-border">
				  <h3 class="box-title">需求明細</h3>
			  </div>
			  	<div class="box-body">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-file-text-o"></i>
						</div>
						<input type="text" name="name" class="form-control" placeholder="訂單名稱" value="<?=$order->name?>" required>
					</div>
				</div>
				<div class="box-body">
					<label>代訂內容</label>
					<div class="form-group">
						<textarea name="detail" rows="8" cols="50"><?=$order->detail?></textarea>
					</div>
				</div>
			  <!-- /.box-body -->
			  <div class="box-body">
				  <label>使用日期起:</label>
				  <div class="input-group date">
					  <div class="input-group-addon">
						  <i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" name="adate" id="adate" class="datepicker" onchange="get_price()" value="<?=$order->adate?>" required>
					  <select name="atime" class="">
							<option value="00:00">00:00</option>
							<option value="00:30">00:30</option>
							<option value="01:00">01:00</option>
							<option value="01:30">01:30</option>
							<option value="02:00">02:00</option>
							<option value="02:30">02:30</option>
							<option value="03:00">03:00</option>
							<option value="03:30">03:30</option>
							<option value="04:00">04:00</option>
							<option value="04:30">04:30</option>
							<option value="05:00">05:00</option>
							<option value="05:30">05:30</option>
							<option value="06:00">06:00</option>
							<option value="06:30">06:30</option>
							<option value="07:00">07:00</option>
							<option value="07:30">07:30</option>
							<option value="08:00">08:00</option>
							<option value="08:30">08:30</option>
							<option value="09:00">09:00</option>
							<option value="09:30">09:30</option>
							<option value="10:00">10:00</option>
							<option value="10:30">10:30</option>
							<option value="11:00">11:00</option>
							<option value="11:30">11:30</option>
							<option value="12:00">12:00</option>
							<option value="12:30">12:30</option>
							<option value="13:00">13:00</option>
							<option value="13:30">13:30</option>
							<option value="14:00">14:00</option>
							<option value="14:30">14:30</option>
							<option value="15:00">15:00</option>
							<option value="15:30">15:30</option>
							<option value="16:00">16:00</option>
							<option value="16:30">16:30</option>
							<option value="17:00">17:00</option>
							<option value="17:30">17:30</option>
							<option value="18:00">18:00</option>
							<option value="18:30">18:30</option>
							<option value="19:00">19:00</option>
							<option value="19:30">19:30</option>
							<option value="20:00">20:00</option>
							<option value="20:30">20:30</option>
							<option value="21:00">21:00</option>
							<option value="21:30">21:30</option>
							<option value="22:00">22:00</option>
							<option value="22:30">22:30</option>
							<option value="23:00">23:00</option>
							<option value="23:30">23:30</option>
						</select>
				  </div>
			  </div>
			  <div class="box-body">
				  <label>使用日期至:</label>
				  <div class="input-group date">
					  <div class="input-group-addon">
						  <i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" name="bdate" id="bdate" class="datepicker" onchange="get_price()" value="<?=$order->bdate?>" required>
					  <select name="btime" class="">
							<option value="00:00">00:00</option>
							<option value="00:30">00:30</option>
							<option value="01:00">01:00</option>
							<option value="01:30">01:30</option>
							<option value="02:00">02:00</option>
							<option value="02:30">02:30</option>
							<option value="03:00">03:00</option>
							<option value="03:30">03:30</option>
							<option value="04:00">04:00</option>
							<option value="04:30">04:30</option>
							<option value="05:00">05:00</option>
							<option value="05:30">05:30</option>
							<option value="06:00">06:00</option>
							<option value="06:30">06:30</option>
							<option value="07:00">07:00</option>
							<option value="07:30">07:30</option>
							<option value="08:00">08:00</option>
							<option value="08:30">08:30</option>
							<option value="09:00">09:00</option>
							<option value="09:30">09:30</option>
							<option value="10:00">10:00</option>
							<option value="10:30">10:30</option>
							<option value="11:00">11:00</option>
							<option value="11:30">11:30</option>
							<option value="12:00">12:00</option>
							<option value="12:30">12:30</option>
							<option value="13:00">13:00</option>
							<option value="13:30">13:30</option>
							<option value="14:00">14:00</option>
							<option value="14:30">14:30</option>
							<option value="15:00">15:00</option>
							<option value="15:30">15:30</option>
							<option value="16:00">16:00</option>
							<option value="16:30">16:30</option>
							<option value="17:00">17:00</option>
							<option value="17:30">17:30</option>
							<option value="18:00">18:00</option>
							<option value="18:30">18:30</option>
							<option value="19:00">19:00</option>
							<option value="19:30">19:30</option>
							<option value="20:00">20:00</option>
							<option value="20:30">20:30</option>
							<option value="21:00">21:00</option>
							<option value="21:30">21:30</option>
							<option value="22:00">22:00</option>
							<option value="22:30">22:30</option>
							<option value="23:00">23:00</option>
							<option value="23:30">23:30</option>
						</select>
				  </div>
				  <font color="red" id="bdate_msg" style="display:none"><b>不得少於起始日期</b></font>
			  </div>
			  <div class="box-body">
				  <label>共計天數</label>
				  <div id="sumday"></div>
			  </div>

		  </div>
	  </div>

	  <div class="col-md-6">
		  <div class="box box-danger">
			  <div class="box-header with-border">
					<h3 class="box-title">金額計算</h3>
				</div>
				<div class="box-body">
					<label>同業成本</label>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="text" name="cost" id="cost" class="form-control" value="<?=$order->cost?>" onkeyup="get_profit()" placeholder="" required>
						</div>
					</div>
					<label>報價價格</label>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="text" name="price" id="price" class="form-control" value="<?=$order->price?>" onkeyup="get_profit()"  placeholder="" required>
						</div>
					</div>
					<label>利潤 </label><h3 id="profit"><?=($order->price-$order->cost)?></h3>
				</div>
			  
			  <div class="box-body">
				  <label>發票需求</label>
				  <div class="form-group">
				  <label>二聯 <input type="radio" name="invoice" value="2" <?php if($order->invoice==2){echo 'checked';} ?>></label>
				  <label>三聯 <input type="radio" name="invoice" value="3" <?php if($order->invoice==3){echo 'checked';} ?>></label>
				  </div>
			  </div>
		  </div>
		  <div class="box-footer">
				<button type="submit" class="btn btn-primary">儲存</button>
		  </div>
	  </div>
	  
	  </form>
	</div>
	<!-- /.row -->
  </section>
    <!-- /.content -->
	</div>
	
	<section id="main_header">
		<?php $this->load->view('include/footer.php'); ?>
	</section>
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url();?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url();?>/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url();?>plugins/select2/select2.full.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url();?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>/dist/js/app.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url();?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>/dist/js/demo.js"></script>

<script>
$(function () {
	$(".select2").select2();
})
//Date picker
$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd',
});


function get_profit(){
	let cost = $("#cost").val();
	let price = $("#price").val();
	var profit = (price-cost)
	$("#profit").html(profit);
}



function show_profile(sn){
	$("#cust_profile").html('');
	if(sn!=''){
		$.ajax({
			dataType: "json",
			url: '/customer/profile/'+sn,
			//data: data,
			success: function(res){
				var template='\
					<div class="box box-primary">\
						<div class="box-header with-border">\
							<b><h3 class="box-title">'+res.name+'</h3></b>\
						</div>\
						<div class="box-body">\
							<strong><i class="fa fa-phone margin-r-5"></i> 電話</strong>\
							<p class="text-muted">'+res.tel+'</p>\
							<hr>\
							<strong><i class="fa fa-mobile-phone margin-r-5"></i> 手機</strong>\
							<p class="text-muted">'+res.phone+'</p>\
							<hr>\
							<strong><i class="fa fa-map-marker margin-r-5"></i> 地址</strong>\
							<p class="text-muted">'+res.address+'</p>\
							<hr>\
							<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>\
							<p>'+res.rem+'</p>\
						</div>\
					</div>\
				';
				$("#cust_profile").html(template);
			}
		});
	}
	
}
</script>
</body>
</html>
