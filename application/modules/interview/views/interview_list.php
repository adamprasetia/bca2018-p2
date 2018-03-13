<section class="content-header">
	<h1>
		Candidate List
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">List</li>
	</ol>
</section>
<section class="content">
	<?php echo form_open($action,array('class'=>'form-inline'))?>
	<div class="box box-default">
		<div class="box-body">
			<div class="form-group">
				<?php echo form_label('Show entries','limit')?>
				<?php echo form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
			</div>
			<div class="form-group">
				<?php echo form_input(array('name'=>'search','value'=>$this->input->get('search'),'autocomplete'=>'off','placeholder'=>'Search..','onchange=>"submit()"','class'=>'form-control input-sm'))?>
			</div>
			<div class="form-group">
				<?php echo form_dropdown('status',$this->interview_model->status_dropdown(),$this->input->get('status'),'class="form-control input-sm" onchange="submit()"')?>
			</div>
			<div class="form-group">
				<?php echo form_dropdown('interviewer',$this->interview_model->interviewer_dropdown(),$this->input->get('interviewer'),'class="form-control input-sm" onchange="submit()"')?>
			</div>
		</div>		
	</div>		
	<div class="box box-default">
		<div class="box-body">
			<div class="form-group">
				Distribution Date : 
				<?php echo form_input(array('name'=>'date_from','placeholder'=>'From','class'=>'form-control input-sm input-tanggal','size'=>'10','value'=>$this->input->get('date_from')))?>
				<?php echo form_input(array('name'=>'date_to','placeholder'=>'To','class'=>'form-control input-sm input-tanggal','size'=>'10','value'=>$this->input->get('date_to')))?>
			</div>
			<div class="checkbox">
				<label>
					<?php echo form_checkbox(array('id'=>'proses','name'=>'proses','value'=>'1','checked'=>set_value('proses',($this->input->get('proses')==1?true:false)))) ?>
					Proses
				</label>
			</div>
			<div class="checkbox">
				<label>
					<?php echo form_checkbox(array('id'=>'valid','name'=>'valid','value'=>'1','checked'=>set_value('valid',($this->input->get('valid')==1?true:false)))) ?>
					Valid
				</label>
			</div>
			<div class="checkbox <?php echo ($this->user_login['level']==3?'hide':'') ?>">
				<label>
					<?php echo form_checkbox(array('id'=>'audit','name'=>'audit','value'=>'1','checked'=>set_value('audit',($this->input->get('audit')==1?true:false)))) ?>
					Audit
				</label>
			</div>
			<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>				
		</div>		
	</div>		
	<?php echo form_close()?>
	<div class="box box-default">
		<div class="box-body">
			<div class="table-responsive">
				<?php echo $table?>
			</div>
		</div>
		<div class="box-footer">
			<?php echo form_label($total,'',array('class'=>'label-footer'))?>
			<div class="pull-right">
				<?php echo $pagination?>
			</div>
		</div>		
	</div>
</section>