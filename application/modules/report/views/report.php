<section class="content-header">
	<h1>
		Report
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">Report</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
		<div class="box-body">
			<?php echo form_open($action,array('class'=>'form-inline'))?>
				<div class="form-group">
					First Dist Date : 
					<?php echo form_input(array('name'=>'date_from_first','class'=>'form-control input-tanggal','size'=>'10','value'=>$this->input->get('date_from_first')))?>
					<?php echo form_input(array('name'=>'date_to_first','class'=>'form-control input-tanggal','size'=>'10','value'=>$this->input->get('date_to_first')))?>
				</div>
				<div class="form-group">
					Dist Date : 
					<?php echo form_input(array('name'=>'date_from','class'=>'form-control input-tanggal','size'=>'10','value'=>$this->input->get('date_from')))?>
					<?php echo form_input(array('name'=>'date_to','class'=>'form-control input-tanggal','size'=>'10','value'=>$this->input->get('date_to')))?>
				</div>
				<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
			<?php echo form_close()?>
		</div>
	</div>
	<div class="box box-default">
		<div class="box-header">
			<h4>Report Status</h4>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="200">Status</th>
						<th>Total</th>
					</tr>
					<?php foreach ($report_status as $row): ?>
						<tr>
							<td><?php echo $row->name ?></td>
							<td><?php echo number_format($row->total) ?></td>
						</tr>						
					<?php endforeach ?>
					<tr>
						<td>Total Dialed</td>
						<td><?php echo $total_dialed ?></td>
					</tr>						
				</table>
			</div>
		</div>
	</div>	
</section>