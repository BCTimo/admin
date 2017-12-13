<header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SYS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">後台管理系統</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>dist/img/default-profile.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION['name']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url();?>dist/img/default-profile.png" class="img-circle" alt="User Image">

                <p>
                  <?=$_SESSION['name']?>
                  <!--<small>Member since Aug. 2017</small>-->
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
             
                <div class="pull-right">
                  <a href="<?=base_url()?>user/logout" class="btn btn-default btn-flat">登出</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>dist/img/default-profile.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-car"></i> <span>基本資料</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <!--<li class="active"><a href="<?=base_url();?>car"><i class="fa fa-circle-o"></i>車輛管理</a></li>-->
            <li style="<?php if(!in_array('car', json_decode($_SESSION['permission']))){ echo 'display:none';};?>"><a href="<?=base_url();?>car"><i class="fa fa-circle-o"></i>車輛管理</a></li>
            <li style="<?php if(!in_array('driver', json_decode($_SESSION['permission']))){ echo 'display:none';};?>"><a href="<?=base_url();?>driver"><i class="fa fa-circle-o"></i>司機管理</a></li>
            <li style="<?php if(!in_array('customer', json_decode($_SESSION['permission']))){ echo 'display:none';};?>"><a href="<?=base_url();?>customer"><i class="fa fa-circle-o"></i>客戶管理</a></li>
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-table"></i> <span>功能</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li style="<?php if(!in_array('order_car', json_decode($_SESSION['permission']))){ echo 'display:none';};?>"><a href="<?=base_url();?>order_car"><i class="fa fa-circle-o"></i>訂單</a></li>
            <li style="<?php if(!in_array('calendar', json_decode($_SESSION['permission']))){ echo 'display:none';};?>"><a href="<?=base_url();?>calendar"><i class="fa fa-circle-o"></i>派車表</a></li>
            <li style="<?php if(!in_array('permission', json_decode($_SESSION['permission']))){ echo 'display:none';};?>"><a href="<?=base_url();?>permission"><i class="fa fa-circle-o"></i>權限管理</a></li>
            <!--<li><a href="<?=base_url();?>report"><i class="fa fa-circle-o"></i>會計報表</a></li>-->
          </ul>
        </li>
      </ul>
      
      
    </section>
    <!-- /.sidebar -->
  </aside>