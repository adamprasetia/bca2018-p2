<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php echo $this->event['name'] ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/bootstrap-3.3.5-dist/css/bootstrap.min.css')?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/jquery-ui-1.11.2/jquery-ui.css')?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/css/AdminLTE.css')?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/css/skins/_all-skins.min.css')?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/plugins/morris/morris.css')?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/font-awesome-4.3.0/css/font-awesome.min.css')?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/ionicons-2.0.1/css/ionicons.min.css')?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>"/>

  	<script> var base_url = '<?php echo base_url()?>'</script>
	<script type="text/javascript" src="<?php echo base_url('../assets/js/jquery-1.11.3.min.js')?>"/></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert.min.js')?>"/></script>
</head>
<body class="hold-transition skin-black sidebar-mini fixed">
  <header class="main-header">
    <?php echo anchor('home','<span class="logo-mini"><b>'.APP_ALIAS.'</b></span><span class="logo-lg" style="font-size:16px">'.$this->event['name'].'</span>',array('class'=>'logo')) ?>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $this->user_login['name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p>
                  <?php echo $this->user_login['name'] ?>
                  <small><?php echo $this->user_login['level_name'] ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo anchor('change_password','Change Password',array('class'=>'btn btn-default btn-flat')) ?>
                </div>
                <div class="pull-right">
                  <?php echo anchor('home/logout','Sign out',array('class'=>'btn btn-default btn-flat')) ?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?php echo active_menu('home')?>"><?php echo anchor('home','<i class="fa fa-home"></i> <span>Home</span>')?></li>
        <?php if ($this->user_login['level']==1): ?>          
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_menu('master','user_level')?>"><?php echo anchor('master/user_level','<i class="fa fa-circle-o"></i> User Level')?></li>
            <li class="<?php echo active_menu('master','user_status')?>"><?php echo anchor('master/user_status','<i class="fa fa-circle-o"></i> User Status')?></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_menu('user','add')?>"><?php echo anchor('user/add','<i class="fa fa-circle-o"></i> New')?></li>
            <li class="<?php echo active_menu('user','')?>"><?php echo anchor('user','<i class="fa fa-circle-o"></i> List User')?></li>
          </ul>
        </li>                         
        <?php endif ?>
        <?php if ($this->user_login['level']==1 || $this->user_login['level']==2): ?>
        <li class="treeview <?php echo active_menu('import')?>"><?php echo anchor('import','<i class="fa fa-cloud-upload"></i> <span>Import Data</span>')?></li>
        <li class="treeview <?php echo active_menu('distribution')?>"><?php echo anchor('distribution','<i class="fa fa-cubes"></i> <span>Distribution</span>')?></li>
        <?php endif ?>
        <li class="treeview <?php echo active_menu('interview')?>"><?php echo anchor('interview','<i class="fa fa-phone"></i> <span>Interview</span>')?></li>
        <?php if ($this->user_login['level']==1 || $this->user_login['level']==2): ?>
        <li class="treeview <?php echo active_menu('export')?>"><?php echo anchor('export','<i class="fa fa-cloud-download"></i> <span>Export Data</span>')?></li>
        <li class="treeview <?php echo active_menu('report')?>"><?php echo anchor('report','<i class="fa fa-bar-chart"></i> <span>Report</span>')?></li>        
        <?php endif ?>
        <li class="treeview <?php echo active_menu('doc')?>"><?php echo anchor('doc/index/'.$this->event['id'],'<i class="fa fa-book"></i> <span>Documentation</span>')?></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
  	<?php echo $content ?>
  </div>
  <footer class="main-footer">
    <strong>PT Data Bina Solusindo (ADirect)</strong>
  </footer>
	<script type="text/javascript" src="<?php echo base_url('../assets/jquery-ui-1.11.2/jquery-ui.min.js')?>"/></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/bootstrap-3.3.5-dist/js/bootstrap.min.js')?>"/></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/AdminLTE-2.3.0/js/app.js')?>"/></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/AdminLTE-2.3.0/plugins/slimScroll/jquery.slimscroll.min.js')?>"/></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/AdminLTE-2.3.0/plugins/morris/raphael-min.js')?>"/></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/AdminLTE-2.3.0/plugins/morris/morris.min.js')?>"/></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/general.js')?>"/></script>
  <script type="text/javascript">
    $('li.active').parent().parent().addClass('active');
    $('li.active').parent().parent().parent().parent().addClass('active');
  </script>       
</body>
</html>