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
        <div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">編輯<?=$title?></h3>
				</div>
				<div class="box-footer">
					<button type="button" onclick="history.go(-1)" class="btn btn-danger">取消</button>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="<?=base_url();?>permission/update/<?php echo $detail->sn; ?>" method="post" role="form" enctype="multipart/form-data">
					<div class="box-body">
						<label>帳號</label>
						<div class="form-group">
							<input type="text" name="account" class="form-control" placeholder="" value="<?=$detail->account?>" required>
						</div>
					</div>
					<div class="box-body">
						<label>密碼</label>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="" value="<?=$detail->password?>" required>
						</div>
					</div>

					<div class="box-body">
						<label>密碼</label>
						<div class="form-group">
							<label><input type="checkbox" name="permission[]" value="car" <?php if(in_array("car", $permissions)){echo 'checked';}?> >車輛管理</label>
							<br><label><input type="checkbox" name="permission[]" value="car_expend" <?php if(in_array("car_expend", $permissions)){echo 'checked';}?> >車輛支出</label>
							<br><label><input type="checkbox" name="permission[]" value="driver" <?php if(in_array("driver", $permissions)){echo 'checked';}?> >司機管理</label>
							<br><label><input type="checkbox" name="permission[]" value="customer" <?php if(in_array("customer", $permissions)){echo 'checked';}?> >客戶管理</label>
							<br><label><input type="checkbox" name="permission[]" value="order_car" <?php if(in_array("order_car", $permissions)){echo 'checked';}?> >訂單</label>
							<br><label><input type="checkbox" name="permission[]" value="calendar" <?php if(in_array("calendar", $permissions)){echo 'checked';}?> >派車表</label>
							<br><label><input type="checkbox" name="permission[]" value="permission" <?php if(in_array("permission", $permissions)){echo 'checked';}?> >權限管理</label>
							<br><label><input type="checkbox" name="permission[]" value="report" <?php if(in_array("report", $permissions)){echo 'checked';}?> >會計報表</label>
						</div>
					</div>	


					<div class="box-footer">
						<button type="submit" class="btn btn-primary">更新</button>
					</div>
				</form>
			</div>

        </div>
        <!-- /.col -->
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
$('#datepicker').datepicker({
	autoclose: true,
	format: 'yyyy/mm/dd'
});

</script>
</body>
</html>
