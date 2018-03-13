<section class="content-header">
	<h1>
		Distribution
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">Distribution</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<div class="box">
		<div class="box-body">
			<div class="pull-left">
				<h1>Ready distribution : <?php echo $total ?></h1>
			</div>
			<div class="pull-right">
				<h1>
					<?php echo anchor('distribution/clear'.get_query_string(),'Clear All',array('class'=>'btn btn-warning','onclick'=>"return confirm('Are you sure ?')")) ?>
					<?php echo anchor('distribution/clear_callback'.get_query_string(),'Clear for Callback',array('class'=>'btn btn-warning','onclick'=>"return confirm('Are you sure ?')")) ?>
					<?php echo anchor('distribution/clear_no_answer'.get_query_string(),'Clear for No Answer/Busy',array('class'=>'btn btn-warning','onclick'=>"return confirm('Are you sure ?')")) ?>
				</h1>
			</div>
		</div>
	</div>
	<?php echo form_open('distribution/execute'.get_query_string(),array('method'=>'post'))?>
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<table class="table">
					<tr>
						<th>No</th>
						<th>Interviewer</th>
						<th>New</th>
						<th>On Proses</th>
						<th>Complete</th>
						<th>Distribution</th>
						<th>Clear</th>
					</tr>
					<?php $i = 1 ?>
					<?php foreach ($interviewer as $row): ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $row->name ?></td>
							<td width='100'><?php echo $this->distribution_model->count_by_interviewer_new($row->id) ?></td>
							<td width='100'><?php echo $this->distribution_model->count_by_interviewer_onproses($row->id) ?></td>
							<td width='100'><?php echo $this->distribution_model->count_by_interviewer_complete($row->id) ?></td>
							<td width='100'><input type="number" class="form-control input-sm" name="interviewer_<?php echo $row->id ?>"></td>
							<td width='20'><?php echo anchor('distribution/clear/'.$row->id.get_query_string(),'Clear',array('class'=>'btn btn-danger btn-sm','onclick'=>"return confirm('Are you sure ?')")) ?></td>
						</tr>
					<?php $i++ ?>
					<?php endforeach ?>
				</table>
			</div>			
		</div>
		<div class="box-footer">
			<button class="btn btn-primary btn-sm" type="submit" onclick="return confirm('Are you sure ?')"><span class="glyphicon glyphicon-export"></span> Distribution</button>
		</div>
	</div>
	<?php echo form_close()?>
</section>
