<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php echo APP_NAME ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico')?>"/>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/bootstrap-3.3.5-dist/css/bootstrap.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/css/AdminLTE.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/css/skins/_all-skins.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/plugins/morris/morris.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/ionicons-2.0.1/css/ionicons.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css') ?>"/>
</head>
<body>
	<div class="login-box">
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<?php echo validation_errors() ?>
			<?php echo form_open('login') ?>
			<div class="form-group has-feedback">
				<?php echo form_dropdown('event',$this->master_model->dropdown('event','Event'),set_value('event',''),'required=required class="form-control input-sm"'); ?>
			</div>
			<hr>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Username" name="username">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Password" name="password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8"></div>
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
				</div>
			</div>
			<?php echo form_close() ?>      
		</div>
		<div class="box-footer">
			New Interviewer ? Register <?php echo anchor('registration','Here') ?>
		</div>	
	</div>

	<script type="text/javascript" src="<?php echo base_url('../assets/js/jquery-1.11.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/bootstrap-3.3.5-dist/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/AdminLTE-2.3.0/js/app.js')?>"/></script>
</body>
</html>