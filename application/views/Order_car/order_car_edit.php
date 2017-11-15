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
	<form action="<?=base_url();?>order_car/update/<?=$detail->sn?>" method="post" role="form" enctype="multipart/form-data">
	  <div class="col-md-6">
		  <div class="box box-primary">
			  <div class="box-header with-border">
				  <h3 class="box-title">新增<?=$title?> <?=date("Y/m/d")?></h3>
			  </div>
			  <div class="box-footer">
				  <button type="button" onclick="history.go(-1)" class="btn btn-danger">取消</button>
			  </div>
			  <!-- /.box-header -->
			  <!-- form start -->
			  
				  <div class="box-body">
					  <label>客戶</label>
					  <select name="customer_id" onchange="show_profile(this.value)" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
						  <option value="" >===請選擇客戶===</option>
						  <?php
							  foreach($customer['list'] as $k=>$v){
								  echo '<option value="'.$v->sn.'">'.$v->name.'</option>';
							  }
						  ?>
					  </select>
				  </div>

				  <div id="cust_profile"></div>
				  <div class="box-body">
					  <label>訂單備註</label>
					  <div class="form-group">
						  <textarea name="rem" rows="8" cols="50"></textarea>
					  </div>
				  </div>
				  <div class="box-body">
					  <label>給客戶的備註</label>
					  <div class="form-group">
						  <textarea name="rem_customer" rows="8" cols="50"></textarea>
					  </div>
				  </div>
				  <div class="box-body">
					  <label>給司機的備註</label>
					  <div class="form-group">
						  <textarea name="rem_drive" rows="8" cols="50"></textarea>
					  </div>
				  </div>
				  <div class="box-body">
					  <label>訂單狀態</label>
					  <div class="form-group">
						  <label>報價未收 <input type="radio" name="status" value="1" checked></label>&nbsp;&nbsp;
						  <label>已收款 <input type="radio" name="status" value="2"></label>&nbsp;&nbsp;
						  <label>已開發票 <input type="radio" name="status" value="3"></label>&nbsp;&nbsp;
						  <label>結案 <input type="radio" name="status" value="4"></label>&nbsp;&nbsp;
						  <label>取消 <input type="radio" name="status" value="5"></label>
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

				  <div class="box-footer">
					  <button type="submit" class="btn btn-primary">儲存</button>
				  </div>
			  
		  </div>

	  </div>
	  <!-- /.col -->
	  <div class="col-md-6">
		  <div class="box box-success">
			  <div class="box-header with-border">
				  <h3 class="box-title">需求明細</h3>
			  </div>
			  <div class="box-footer">
				  <a id="addcarbtn" onclick="javascript:;" class="btn btn-success">新增車輛</a>
			  </div>
			  <div class="box-body" id="car_detail">
				  
			  </div>
			  <!-- /.box-body -->
			  <div class="box-body">
				  <label>使用日期起:</label>
				  <div class="input-group date">
					  <div class="input-group-addon">
						  <i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" name="adate" id="adate" class="form-control pull-right datepicker"  required>
				  </div>
			  </div>
			  <div class="box-body">
				  <label>使用日期至:</label>
				  <div class="input-group date">
					  <div class="input-group-addon">
						  <i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" name="bdate" id="bdate" class="form-control pull-right datepicker" onchange="get_price()" required>
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
				  <label>原價</label>
				  <div class="form-group">
					  <font color="red" size="20" id="total_price">0</font>
				  </div>
				  <label>特別價格</label>
				  <div class="form-group">
					  <div class="input-group">
						  <span class="input-group-addon">$</span>
						  <input type="text" name="special_price" class="form-control" placeholder="" required>
					  </div>
				  </div>
			  </div>
			  <div class="box-body">
				  <label>發票需求</label>
				  <div class="form-group">
				  <label>二聯 <input type="radio" name="invoice" value="2" checked></label>
				  <label>三聯 <input type="radio" name="invoice" value="3"></label>
				  </div>
			  </div>
		  </div>
	  </div>
	  <input type="hidden" name="org_price" id="org_price" value="">
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
<?php
$car_option='<option disabled >===請選擇車輛===</option>';
foreach($car['list'] as $k=>$v){
	$car_option .= '<option data-price="'.$v->price.'" value="'.$v->sn.'">'.$v->name.' ($'.number_format($v->price).')</option>';
}
$driver_option='<option disabled >===請選擇司機===</option>';

$driver_option.='<option value="">無</option>';
foreach($driver['list'] as $k=>$v){
	$driver_option .= '<option value="'.$v->sn.'">'.$v->name.'</option>';
}
?>
<script>
$(function () {
	$(".select2").select2();
})
//Date picker
$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy/mm/dd',
});

var n=1;
$("#addcarbtn").click(function(){
	var car_option='<?=$car_option?>';
	var driver_option='<?=$driver_option?>';
	var html = 
	"<li id=\"li"+n+"\">"
		+"<select class='cars' onchange='get_price()' name='cars["+n+"]'>"+car_option+"</select>"
		+"<select name='drivers["+n+"]'>"+driver_option+"</select>"
		//+"SIZE<input type=\"text\" name=\"sizename"+n+"\" size=\"10\">"
		+"<a href=\"javascript:\" onclick=\"var n=liremove("+n+")\";> <i class='fa fa-remove'></i></a>"
	+"</li>";

	$("#car_detail").append(html);
	n++;
	get_price();
})
function liremove(i){
	$("#li"+i).remove();
}

function datediff(){
    var StartDate=$( "#adate" ).val();//定義起始 年月日
    var EndDate=$( "#bdate" ).val();//定義結束 年月日
	//alert('相差 '+ (DateDifference(StartDate,EndDate))+'天');
	var sumday=(DateDifference(StartDate,EndDate))+1;
	if(sumday<1){
		$("#bdate_msg").show();
		$("#bdate").value='';
	}else{
		$("#bdate_msg").hide();
	}
	$("#sumday").html(sumday);
	return sumday;
}
function DateDifference(StartDate,EndDate){
   var myStartDate = new Date(StartDate);
   var myEndDate = new Date(EndDate);
   // 天數，86400000是24*60*60*1000，除以86400000就是有幾天
     return (myEndDate - myStartDate)/ 86400000 ;
}

function get_price(){
	let car_price = 0;
	$.each( $(".cars"), function( key, value ) {
		car_price+=$(this).find(':selected').data('price');
	});
	var total = (car_price * datediff());
	$("#total_price").html(total);
	$("#org_price").val(total);
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
