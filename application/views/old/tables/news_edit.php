<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Simple Tables</title>
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
		<h1>新聞列表</h1>
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
					<h3 class="box-title">新增新聞</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="<?=base_url();?>news/update/<?php echo $detail->id; ?>" method="post" role="form">
					<div class="box-body">
						<label >新聞標題</label>
						<div class="form-group">
							<input type="name" name="name" class="form-control" value="<?php echo $detail->name; ?>" placeholder="新聞標題" required>
						</div>
					</div>
					
					<div class="box-body">
						<label >新聞連結</label>
						<div class="form-group">
							<input type="url" name="url" class="form-control" value="<?php echo $detail->url; ?>" placeholder="http://" required>
						</div>
					</div>
					<div class="box-body">
						<label>類別</label>
						<select name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
							<option value="0" <?php if($detail->type==0)echo 'selected'; ?> >不分類</option>
							<option value="1" <?php if($detail->type==1)echo 'selected'; ?> >財經</option>
							<option value="2" <?php if($detail->type==2)echo 'selected'; ?> >政治</option>
							<option value="3" <?php if($detail->type==3)echo 'selected'; ?> >娛樂</option>
							<option value="4" <?php if($detail->type==4)echo 'selected'; ?> >地方</option>
							<option value="5" <?php if($detail->type==5)echo 'selected'; ?> >運動</option>
						</select>
					</div>
					<div class="box-body">
						<label>新聞日期:</label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						  <input type="text" name="date" class="form-control pull-right" value="<?php echo $detail->date; ?>" id="datepicker">
						</div>
						<!-- /.input group -->
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
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
