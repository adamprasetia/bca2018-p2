<section class="content-header">
	<h1>
		Export Data
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">Export</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open('export/execute')?>
	<div class="box">
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label('First Date Distribution','date',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'date_from','class'=>'form-control input-tanggal','size'=>'10'))?>
				<?php echo form_input(array('name'=>'date_to','class'=>'form-control input-tanggal','size'=>'10'))?>
			</div>			
		</div>
		<div class="box-footer">
			<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-export"></span> Export</button>
		</div>
	</div>
	<?php echo form_close()?>
</section>
