<section class="content-header">
	<h1>
		Master Data
		<small><?php echo $heading?></small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	    <li><?php echo anchor($breadcrumb,'List Data')?></li>
	    <li class="active"><?php echo $heading?></li>
	</ol>
</section>
<section class="content">
<?php echo $this->session->flashdata('alert')?>
<?php echo form_open($action)?>
<div class="box box-default">
	<div class="box-header owner">
		<?php echo $owner?>
	</div>
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Name','name',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'50','size'=>'50','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:'')),'required'=>'required'))?>
			<small><?php echo form_error('name')?></small>
		</div>
	</div>
	<div class="box-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
		<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Back',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?php echo form_close()?>
</section>