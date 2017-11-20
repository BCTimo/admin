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
		<h1><?=$title?>管理列表</h1>
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="<?=base_url();?>order_car/add" class="btn btn-block btn-primary">新增</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="list" class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>客戶</th>
                    <th>使用日期</th>
                    <th>價格</th>
                    <th>狀態</th>
                    <th>派車確認</th>
                    <th>下單日</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($list as $v){
                      //報價未收  已收款  已開發票  結案  取消 
                      switch($v->status){
                        case 0:$status='報價未收';break;
                        case 1:$status='已收款';break;
                        case 2:$status='已開發票';break;
                        case 3:$status='結案';break;
                        case 4:$status='取消';break;
                      }
                      switch($v->readytogo){
                        case 0:$readytogo_chk='';break;
                        case 1:$readytogo_chk='checked';break;
                      }
                      echo '
                        <tr>
                          <td>'.$v->sn.'</td>
                          <td>'.$v->customer_info->name.'</td>
                          <td>'.$v->adate.'~'.$v->bdate.'</td>
                          <td>'.$v->special_price.'</td>
                          <td>'.$status.'</td>
                          <td><input type="checkbox" class="toggle-event" '.$readytogo_chk.' data-toggle="toggle" data-sn="'.$v->sn.'" data-on="確認派車" data-off="未確認" data-onstyle="success" data-offstyle="danger" value="readytogo"></td>
                          <td>'.$v->order_date.'</td>
                          <td>
                                <a class="btn btn-app" href="'.site_url("order_car/edit/$v->sn").'">
                                  <i class="fa fa-edit"></i> 編輯
                                </a>
                                <!--
                                <a class="btn btn-app" onclick="return confirm(\'確認刪除?\')" href="'.site_url("order_car/delete/$v->sn").'">
                                  <i class="fa fa-remove"></i> 刪除
                                </a>
                                -->
                          </td>
                        </tr>
                      ';
                    }
                    ?>
			
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>客戶</th>
                    <th>使用日期</th>
                    <th>價格</th>
                    <th>狀態</th>
                    <th>派車確認</th>
                    <th>下單日</th>
                    <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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
<!-- DataTables -->
<script src="<?=base_url();?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url();?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>/dist/js/demo.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
$(function () {
    $("#list").DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

  $('.toggle-event').change(function() {
    var readytogo=Number($(this).prop('checked'));
    var sn = $(this).data('sn');
    
    $.ajax({
      type: "post",
      data: {'readytogo': readytogo, 'sn': sn},
      url: "order_car/ch_readytogo",
      //dataType: "json",
      //headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
      success: function(data) {
          
      },
      error: function(jqXHR) {
          console.log("發生錯誤, 請重新操作");
      }
    })
  })
});
</script>

</body>
</html>
