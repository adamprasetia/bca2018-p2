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
	<?php echo form_open('registration')?>
	<div class="box box-default box-register">
		<div class="box-header">
			<h3>Registration</h3>
		</div>
		<div class="box-body">
			<?php echo $this->session->flashdata('alert')?>
			<div class="form-group">
				<?php echo form_label('Fullname','name',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required','value'=>set_value('name',''),'autofocus'=>'autofocus'))?>
				<small><?php echo form_error('name')?></small>
			</div>
			<div class="form-group">
				<?php echo form_label('Username','username',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'username','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required','value'=>set_value('username','')))?>
				<small><?php echo form_error('username')?></small>
			</div>
			<hr>
			<div class="form-group">
				<?php echo form_label('Password','password',array('class'=>'control-label'))?>
				<?php echo form_password(array('name'=>'password','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required'))?>
				<small><?php echo form_error('password')?></small>
			</div>
			<div class="form-group">
				<?php echo form_label('Confirm Password','password2',array('class'=>'control-label'))?>
				<?php echo form_password(array('name'=>'password2','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required'))?>
				<small><?php echo form_error('password2')?></small>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-edit"></span> Register</button>
			<?php echo anchor('login','<span class="glyphicon glyphicon-remove-circle"></span> Cancel',array('class'=>'btn btn-danger btn-sm'))?>
			<div class="pull-right">
				<?php echo anchor('login','<span class="glyphicon glyphicon-repeat"></span> Back to Login')?>
			</div>
		</div>
	</div>
	<?php echo form_close()?>
	<script type="text/javascript" src="<?php echo base_url('../assets/js/jquery-1.11.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/bootstrap-3.3.5-dist/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/AdminLTE-2.3.0/js/app.js')?>"/></script>
</body>
</html>