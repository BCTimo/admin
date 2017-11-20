<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>後台管理系統</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
	<div class="content">
				
			<div class="row">
			<div class="col-xs-12">
				<div class="box">
				<!-- /.box-header -->
				<div id="calendar"></div>
				<!-- /.box-body -->
				</div>
			</div>
			<!-- /.col -->
			</div>
			<!-- /.row -->
		
	</div>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--modal-->
<div id="calendarModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
					<h4 id="model_title" class="modal-title">Default Modal</h4>
				</div>
				<div id="modal_context" class="modal-body ">
						<p>One fine body…</p>
				</div>
				<div id="modal_reply" class="modal-body">
						<div>回報內容：</div>
						<textarea name="driver_reply" id="driver_reply" rows="5" cols="40"></textarea>
						<input type="hidden" name="order_d_sn" id="order_d_sn" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">關閉</button>
					<button type="button" onclick="send_reply($('#order_d_sn').val(),$('#driver_reply').val())" class="btn btn-primary">確認回報</button>
				</div>
		</div>
	</div>
</div>
<!--modal-->

<!-- jQuery 2.2.3 -->
<script src="./plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="./bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="./plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="./plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<!--Calendar-->
<link href='./dist/js/calendar/fullcalendar.min.css' rel='stylesheet' />
<!--<link href='./dist/js/calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />-->
<script src='./dist/js/calendar/moment.min.js'></script>
<script src='./dist/js/calendar/fullcalendar.min.js'></script>
<script src='./dist/js/calendar/zh-tw.js'></script>

<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
      lang: 'zh-tw',
      //navLinks:true, //連結到該天
			header: {
				left: 'prev,next today',
				center: 'title',
				//right: 'month,basicWeek,basicDay'
				right: 'listDay,listWeek,month'
      },
			//defaultDate: '2017-09-12',
			//navLinks: true, // can click day/week names to navigate views
			//editable: true,
			//eventLimit: true, // allow "more" link when too many events
			eventClick: function(calEvent, jsEvent, view) {
				$("#order_d_sn").val(calEvent.data.sn);
				$("#model_title").html(calEvent.data.date);
				$("#driver_reply").val(calEvent.data.driver_reply);
				var context = '\
					<table>\
					<tr><td>車號:</td><td><b>'+calEvent.data.car_code+'</b></td></tr>\
					<tr><td>車型:</td><td><b>'+calEvent.data.car_name+'</b></td></tr>\
					<tr><td>司機:</td><td><b>'+calEvent.data.driver_name+'</b></td></tr>\
					<tr><td>地點:</td><td><b>'+calEvent.data.location+'</b></td></tr>\
					<tr><td>起始時間:</td><td><b>'+calEvent.data.atime.substring(0,5)+'</b></td></tr>\
					<tr><td>結束時間:</td><td><b>'+calEvent.data.btime.substring(0,5)+'</b></td></tr>\
					<tr><td>備註:</td><td><b>'+nl2br(calEvent.data.rem_drive)+'</b></tr>\
					</table>\
				';
				$("#modal_context").html(context);
				$('#calendarModal').modal();
        //alert('Event: ' + calEvent.sn);
        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //console.log(calEvent);

        // change the border color just for fun
        //$(this).css('border-color', 'red');

    	},
			events: <?=$event?> /*[
				{
					title: 'All Day Event',
					start: '2017-09-01'
				},
				{
					title: 'Long Event',
					start: '2017-09-07',
          end: '2017-09-10',
          color: '#257e4a',
				},
				{
					id: 999,
					title: 'Repeating Event',
          start: '2017-09-09T16:00:00',
          color: '#ff0000',
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-09-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2017-09-11',
					end: '2017-09-13'
				},
				{
					title: 'Meeting',
					start: '2017-09-12T10:30:00',
					end: '2017-09-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2017-09-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2017-09-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2017-09-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2017-09-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2017-09-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-09-28'
				}
			]*/
		});
		
	});

</script>



<script>
$(function () {
    $('#list').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
    });
});
function send_reply(sn,context){
	//alert('save');
	$.post(
		"Driver_mode/driver_reply", { sn: sn, context: context } 
	).done(function() {
		alert('回報完成');
	});
}
function nl2br (str, is_xhtml) {   
	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}
</script>
</body>
</html>
