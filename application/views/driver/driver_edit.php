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
				<form action="<?=base_url();?>driver/update/<?php echo $detail->sn; ?>" method="post" role="form" enctype="multipart/form-data">
				<div class="box-body">
						<label>身分證字號</label>
						<div class="form-group">
							<input type="text" name="id" value="<?=$detail->id?>" class="form-control" placeholder="A123456789" >
						</div>
					</div>
					<div class="box-body">
						<label>名稱</label>
						<div class="form-group">
							<input type="text" name="name" value="<?=$detail->name?>" class="form-control" placeholder="張小明" required>
						</div>
					</div>
					<div class="box-body">
						<label>電話</label>
						<div class="form-group">
							<input type="text" name="tel" value="<?=$detail->tel?>" class="form-control" placeholder="02 23456789" >
						</div>
					</div>
					<div class="box-body">
						<label>手機</label>
						<div class="form-group">
							<input type="text" name="phone" value="<?=$detail->phone?>" class="form-control" placeholder="0987654321" required>
						</div>
					</div>
					<div class="box-body">
						<label>銀行帳戶</label>
						<div class="form-group">
							<input type="text" name="bank_account" value="<?=$detail->bank_account?>" class="form-control" placeholder="" >
						</div>
					</div>
					<div class="box-body">
						<label>戶籍地址</label>
						<div class="form-group">
							<input type="text" name="address" value="<?=$detail->address?>" class="form-control" placeholder="" >
						</div>
					</div>
					<div class="box-body">
						<label>通訊地址</label>
						<div class="form-group">
							<input type="text" name="address2" value="<?=$detail->address2?>" class="form-control" placeholder="" >
						</div>
					</div>
					<div class="box-body">
						<label>薪資</label>
						<div class="form-group">
							<input type="number" name="pay" value="<?=$detail->pay?>" class="form-control" placeholder="50000" >
						</div>
					</div>
					<div class="box-body">
						<label>備註</label>
						<div class="form-group">
							<textarea name="rem" rows="8" cols="50"><?=$detail->rem?></textarea>
						</div>
					</div>
					<div class="box-body">
						<label>身分證資料</label>
						<div class="form-group">
							<input type="file" name="license" class="form-control" placeholder="" >
						</div>
					</div>
					<div class="box-body">
					
						<div class="form-group">
							<img src="<?=base_url()?>uploads/<?=$detail->license?>"/>
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
