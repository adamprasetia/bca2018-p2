<section class="content-header">
	<h1>
		Interview
		<small>Phone script</small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	  <li><?php echo anchor($breadcrumb,'List')?></li>
	  <li class="active">Interview</li>
	</ol>
</section>
<section class="content">
<?php echo $this->session->flashdata('alert')?>
	<div class="row">
		<?php echo form_open($action) ?>
		<div class="col-md-8 col-sm-8">
			<div class="box box-status" style="z-index:1;">
				<div class="box-body form-inline">
					<label>Status :</label> 
					<?php echo form_dropdown('status',$this->interview_model->status_dropdown(),set_value('status',$candidate->status),'class="form-control"') ?>
					<div class="pull-right">
						<div class="checkbox <?php echo ($this->user_login['level']==2?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'valid','name'=>'valid','value'=>'1','checked'=>set_value('valid',($candidate->valid==1?true:false)))) ?>
								Valid
							</label>
						</div>
						<div class="checkbox <?php echo ($this->user_login['level']==3?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'audit','name'=>'audit','value'=>'1','checked'=>set_value('audit',($candidate->audit==1?true:false)))) ?>
								Audit
							</label>
						</div>
					</div>
					<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
				</div>	
				<div class="box-footer">
					<textarea name="remark" class="form-control" placeholder="Remark/Keterangan"><?php echo set_value('remark',(isset($candidate->remark)?$candidate->remark:'')) ?></textarea>
				</div>
			</div>	
			<div class="box box-opening">
				<div class="box-header info">
					<b>Opening</b>
				</div>	
				<div class="box-body">
					<h3><?php echo $greeting; ?>. Nama saya <strong><?php echo $this->user_login['name'] ?></strong> dan saya mewakili UBM Singapore Expo, penyelenggara <strong><?php echo $this->event['name']; ?></strong> di Singapura. Bolehkah saya berbicara dengan <strong><?php echo $candidate->name; ?></strong></h3>
					<p class="info"><?php echo $greeting_english; ?>. My name is <strong><?php echo $this->user_login['name'] ?></strong> and I am calling on behalf of UBM Singapore Expo, organiser of <?php echo $this->event['name']; ?> in Singapore. May I speak with <strong><?php echo $candidate->name; ?></strong> please?</p>
					<table class="table table-bordered">
						<tr>
							<td>
								<label>Perusahaan</label>
								<p><?php echo $candidate->co; ?></p>
							</td>
							<td>
								<label>Jabatan</label>
								<p><?php echo $candidate->title; ?></p>
							</td>
							<td>
								<label>Telephone</label>
								<p><?php echo $candidate->tel; ?></p>
							</td>
							<td>
								<label>Mobile</label>
								<p><?php echo $candidate->mobile; ?></p>
							</td>
						</tr>
					</table>
					<div class="info">
						<p>Cari Pegawai dengan title : </p>
						<?php if ($this->event['id']=='1'){ ?>
						<ol>
							<li>Corporate Management</li>
							<li>Engineering Management</li>
							<li>Technical Management</li>
							<li>Operations Management</li>
							<li>Digital Media / New Media</li>
							<li>IT Management</li>
							<li>Human Resource</li>
						</ol>
						<?php }else if ($this->event['id']=='2'){ ?>
						<ol>							
							<li>Digital</li>
							<li>Innovation</li>
							<li>Next Generation</li>
							<li>Future Technology</li>
							<li>IoT Security Solutions</li>
							<li>Cyber-Intelligence</li>
						</ol>
						<?php } ?>
					</div>
					<div class="checkbox">
						<label>
							<?php echo form_checkbox(array('id'=>'resign','name'=>'resign','value'=>'1','checked'=>set_value('resign',($candidate->resign==1?true:false)))) ?>
							Pengganti/Data Baru
						</label>
					</div>
					<table class="table table-bordered hide pengganti">
						<tr>
							<td>Nama</td>
							<td><input id="name_new" type="text" name="name_new" class="form-control" maxlength="100" autocomplete="off" value="<?php echo set_value('name_new',(isset($candidate->name_new)?$candidate->name_new:'')) ?>"></td>
						</tr>	
						<tr>
							<td>Jabatan</td>
							<td><input type="text" name="title_new" class="form-control" maxlength="100" autocomplete="off" value="<?php echo set_value('title_new',(isset($candidate->title_new)?$candidate->title_new:'')) ?>"></td>
						</tr>	
						<tr>
							<td>Telephone</td>
							<td><input type="text" name="tel_new" class="form-control" maxlength="100" autocomplete="off" value="<?php echo set_value('tel_new',(isset($candidate->tel_new)?$candidate->tel_new:'')) ?>"></td>
						</tr>	
					</table>
				</div>	
				<div class="box-footer">
					<p class="info">Jika <b>"tidak ada ditempat"</b> : Minta waktu yang tepat untuk dihubungi kembali</p>
					<p class="info">Jika <b>"Sudah resign/pindah"</b> : Minta orang yang menggatikannya</p>
					<div class="checkbox">
						<label>
							<?php echo form_checkbox(array('id'=>'called','name'=>'called','value'=>'1','checked'=>set_value('called',($candidate->called==1?true:false)))) ?>
							Berhasil Dihubungi
						</label>
					</div>
				</div>					
			</div>
			<div class="box box-minute hide">
				<div class="box-body form-inline">
					<h3><?php echo $greeting; ?>, <strong><?php echo $candidate->name; ?></strong>. Nama saya <strong><?php echo $this->user_login['name'] ?></strong> dan saya mewakili UBM Singapore Expo, penyelenggara <strong><?php echo $this->event['name']; ?></strong> di Singapura. Boleh minta waktunya beberapa menit?</h3>
					<p class="info"><?php echo $greeting_english; ?>, <strong><?php echo $candidate->name; ?></strong>. My name is <strong><?php echo $this->user_login['name'] ?></strong> and I am calling on behalf of UBM SES, organiser of ConnecTechAsia in Singapore. May I have a few minutes of your time?</p>
					<label>Jawaban :</label>
					<?php echo form_dropdown('minute',array('0'=>'','1'=>'Ya','2'=>'Tidak'),set_value('minute',$candidate->minute),'id="minute" class="form-control"') ?>
				</div>
				<div class="box-footer">
					<p class="info">Jika <b>"tidak ada waktu"</b> atau <b>"sibuk"</b> : Pastikan apakah candidate mengetahui acara <?php echo $this->event['name'] ?> yang akan diselenggarakan pada bulan Juni (Jika prospek memberikan indikasi untuk melanjutkan dengan panggilan, Lanjutkan kebagian selanjutnya)</p>
					<p class="info">Jika Benar-benar <b>"tidak ada waktu"</b> atau <b>"sibuk"</b> : Minta waktu yang tepat untuk dihubungi kembali</p>
				</div>
			</div>
			<div class="box box-know hide">
				<div class="box-body form-inline">
					<h3>Bolehkah saya tahu apakah Anda mengetahui <?php echo $this->event['name'] ?> yang merupakan bagian dari ConnecTechAsia, yang diselenggarakan pada tanggal 26-28 Juni di Suntec Singapore ?</h3>
					<p class="info">May I know if you are aware of ConnecTechAsia which incorporates BroadcastAsia, CommunicAsia and NXTAsia? This mega event will be held from 26 – 28 June at Marina Bay Sands and Suntec Singapore.</p>
					<label>Jawaban :</label>
					<?php echo form_dropdown('know',array('0'=>'','1'=>'Ya','2'=>'Tidak'),set_value('know',$candidate->know),'id="know" class="form-control"') ?>
				</div>
			</div>
			<div class="box box-know-no hide">
				<div class="box-body form-inline">
					<p class="info">Beri info tentang BroadcastAsia2018 dan ConnecTechAsia</p>
					<button type="button" class="btn btn-default btn-xs doc">Klik Info tentang <?php echo $this->event['name'] ?></button>										
				</div>
			</div>
			<div class="box box-pre-registered hide">
				<div class="box-body form-inline">
					<h3>Wah Bagus! Sudahkah Anda mendaftarkan/pre registered untuk acara tersebut ?</h3>
					<label>Jawaban :</label>
					<?php echo form_dropdown('pre_registered',array('0'=>'','1'=>'Ya','2'=>'Tidak'),set_value('pre_registered',$candidate->pre_registered),'id="pre_registered" class="form-control"') ?>
				</div>
			</div>
			<div class="box box-pre-registered-yes hide">
				<div class="box-body form-inline">
					<h3>Terima kasih atas dukungan & waktunya. Harap di ingat agar membawa email konfirmasi Anda untuk koleksi lencana Anda. Jika Anda ingin kami mengirimkan reminder/pengingat untuk event pertunjukan, Anda dapat menginformasikan nomor ponsel Anda dan kami akan mengirimkan pengingat SMS kepada Anda. </h3>
				</div>
			</div>
			<div class="box box-pre-registered-no hide">
				<div class="box-body form-inline">
					<h3>Dapatkah saya mengirimkan undangan via email kepada Anda untuk menghadiri <?php echo $this->event['name'] ?> bersamaan dengan informasi acara dan link pendaftaran secara online ? </h3>
					<label>Jawaban :</label>
					<?php echo form_dropdown('send_email',array('0'=>'','1'=>'Ya','2'=>'Tidak'),set_value('send_email',$candidate->send_email),'id="send_email" class="form-control"') ?>
				</div>
			</div>
			<div class="box box-send-email-yes hide">
				<div class="box-body form-inline">
					<h3>Jika Anda tertarik untuk mengunjungi acaranya, mohon daftarkan kunjungan Anda secara online di www.Broadcast-Asia.com sebelum 18 Juni 2018.</h3>
					<h3>Juga daftarkan rekan kerja dan teman Anda di industri ini ke event ini karena saya yakin itu sangat relevan dan bermanfaat bagi pekerjaan mereka juga. Rekan kerja Anda juga bisa mendaftar secara online.</h3>
					<h3>Mohon perhatikan email yang akan segera saya kirimkan kepada Anda.</h3>
				</div>
			</div>
			<div class="box box-email hide">
				<div class="box-header info">Dapatkan alamat email</div>
				<div class="box-body">
					<label>Alamat email :</label>
					<input id="email_new" type="text" name="email_new" class="form-control" maxlength="100" size="30" autocomplete="off" value="<?php echo set_value('email_new',(isset($candidate->email_new)?$candidate->email_new:'')) ?>">
				</div>
			</div>			
			<div class="box box-mobile hide">
				<div class="box-header info">Dapatkan nomor ponsel</div>
				<div class="box-body">
					<label>Nomor ponsel :</label>
					<input id="mobile_new" type="text" name="mobile_new" class="form-control" maxlength="100" size="30" autocomplete="off" value="<?php echo set_value('mobile_new',(isset($candidate->mobile_new)?$candidate->mobile_new:'')) ?>">
				</div>
				<div class="box-footer">
					<?php if ($candidate->mobile): ?>						
						<p class="info">Nomor Sebelumnya : <b><?php echo $candidate->mobile; ?></b></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="box box-closing-yes hide">
				<div class="box-body">
					<h3>Sampai jumpa di acara tersebut! </h3>
					<p class="info">See you at the event! </p>
				</div>
			</div>			
			<div class="box box-closing-no hide">
				<div class="box-body">
					<h3>Baik, Terima kasih atas waktunya, <?php echo $greeting ?></h3>
					<p class="info">See you at the event! </p>
				</div>
			</div>			
			<div class="box box-closing hide">
				<div class="box-body">
					<h3>Terima kasih dan kami menantikan kehadiran Anda</h3>
					<p class="info">Thank you for your time & have a nice day</p>
				</div>
			</div>			
		</div>
		<?php echo form_close() ?>
		<div class="col-md-4 col-sm-4 pl">
			<div class="">
				<?php if ($this->user_login['level']==1 || $this->user_login['level']==2): ?>			
				<div class="box">
					<div class="box-header">
						<b>Interviewer</b>
					</div>	
					<div class="box-header">
						<td><?php echo $candidate->interviewer_name ?></td>
					</div>	
				</div>		
				<?php endif ?>	
				<div class="box callhis-wrap">
					<div class="box-header">
						<b>Call History</b>
					</div>	
					<div class="box-body box-callhis">
						<table class="table table-responsive">
							<tr>
								<th>No</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>	
							<?php $i=1; ?>
							<?php foreach ($callhis as $row): ?>
							<tr>
								<td><?php echo $i++ ?></td>
								<td><?php echo $row->date ?></td>
								<td data-id="<?php echo $row->id ?>" class="btn-callhis-update"><?php echo $row->status ?></td>
								<td><button type="button" class="btn btn-danger btn-xs btn-callhis-delete" value="<?php echo $row->id ?>">Delete</button></td>
							</tr>							
							<?php endforeach ?>
						</table>
					</div>	
					<div class="box-footer">
						<button type="button" class="btn btn-success btn-xs btn-callhis" value="Answer">Answer</button>
						<button type="button" class="btn btn-warning btn-xs btn-callhis" value="No Answer">No Answer</button>
						<button type="button" class="btn btn-default btn-xs btn-callhis" value="Busy">Busy</button>
						<button type="button" class="btn btn-danger btn-xs btn-callhis" value="Reject">Reject</button>
					</div>	
					<div class="box-footer">
						<input id="note" type="text" name="note" maxlength="100" class="form-control" placeholder="note..." autocomplete="off">
					</div>	
				</div>	
				<div class="box callhis-form hide">
					<div class="box-header">
						<b>Update Call History</b>
					</div>	
					<div class="box-body">
						<input type="hidden" name="id" id="callhis-id" value="5">
						<div class="form-group">
							<?php echo form_label('Date','date',array('class'=>'control-label'))?>
							<?php echo form_input(array('id'=>'callhis-date','name'=>'date','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('date',''),'required'=>'required'))?>
						</div>
						<div class="form-group">
							<?php echo form_label('Status','status',array('class'=>'control-label'))?>
							<?php echo form_input(array('id'=>'callhis-status','name'=>'status','class'=>'form-control input-sm','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('status',''),'required'=>'required'))?>
						</div>
					</div>	
					<div class="box-footer">
						<button type="button" class="btn btn-success btn-xs btn-callhis-save-update">Save</button>
						<button type="button" class="btn btn-default btn-xs btn-callhis-cancel-update">Cancel</button>
					</div>	
				</div>
				<?php if ($related): ?>					
					<div class="box">
						<div class="box-header">
							<b>Related Company</b>
						</div>	
						<div class="box-body box-callhis">
							<table class="table table-responsive">
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Title</th>
									<th>Action</th>
								</tr>	
								<?php $i=1; ?>
								<?php foreach ($related as $row): ?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><?php echo $row->name ?></td>
									<td><?php echo $row->title ?></td>
									<td><?php echo anchor('interview/phone/'.$row->id,'Phone') ?></td>
								</tr>							
								<?php endforeach ?>
							</table>
						</div>	
					</div>					
				<?php endif ?>
			</div>
		</div>
	</div>	
</section>
<div id="doc-modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Documentation</h4>
			</div>		
            <div class="modal-body">
				<?php echo $this->load->view('doc/doc_'.$candidate->event,'',true); ?>
            </div>
        </div>        
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.sticky-kit.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/interview.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.doc').click(function(){
		$('#doc-modal').modal('show');
	});
	$('#note').keyup(function(e){
	    if(e.keyCode == 13 && $(this).val() != ''){	        
			$.ajax({
				url:'<?php echo base_url() ?>index.php/interview/callhis/create',
				type:'post',
				data:{
					status:$(this).val(),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);							
				}
			});
			$(this).val('');
	    }else{
			console.log('Note is Emptry');
	    }
	});

	$('.btn-callhis').click(function(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/create',
			type:'post',
			data:{
				status:$(this).attr('value'),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});
	});
	$('body').on('click','.btn-callhis-save-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/update',
			type:'post',
			data:{
				id:$('#callhis-id').val(),
				date:$('#callhis-date').val(),
				status:$('#callhis-status').val(),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');		
	});	
	$('body').on('click','.btn-callhis-cancel-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/get/<?php echo $candidate->id ?>',
			type:'post',
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');
	});	
	
	<?php if ($this->user_login['level']<>3): ?>
		$('body').on('click','.btn-callhis-update',function(){
			var date = $(this).parent().children().eq(1).html();
			var status = $(this).parent().children().eq(2).html();
			$('#callhis-id').val($(this).attr('data-id'));
			$('#callhis-date').val(date);
			$('#callhis-status').val(status);
			$('.callhis-form').removeClass('hide');
			$('.callhis-wrap').addClass('hide');
		});		
	<?php endif ?>

	$('body').on('click','.btn-callhis-delete',function(){
		if(confirm('You sure ?')){
			$.ajax({
				url:'<?php echo base_url() ?>index.php/interview/callhis/delete',
				type:'post',
				data:{
					id:$(this).attr('value'),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);
				}
			});				
		}
	});	
	/* - Send Email - */
	$('body').on('click','#btn-send-email',function(event){
		if(confirm('Are you sure')){
			$.ajax({
				url:$(this).attr('href')
				,data:{email:$('#email_new').val(),'fullname':$('#name_new').val()}
				,type:'post'
				,beforeSend: function () {
					$('.send-email-alert').html('<p>Please wait...</p>');
				}
				,success:function(str){
					$('.send-email-alert').html(str);
				}
			});	
		}
		event.preventDefault();	
	});	
});
</script>
<script type="text/javascript">
	/* - Deactive text submit on enter - */
	$(document).on('keyup keypress', 'form input[type="text"]', function(e) {
		if(e.which == 13) {
			e.preventDefault();
		}
	});	
</script>