$(document).ready(function(){
	function check_resign(){
		if($('#resign').is(":checked")){
			$('.pengganti').removeClass('hide');
		}else{
			$('.pengganti').addClass('hide');
		}			
	}
	check_resign();
	$('#resign').change(function(){
		check_resign();
	});

	function check_called(){
		if($('#called').is(":checked")){
			$('.box-minute').removeClass('hide');
		}else{
			$('.box-minute').addClass('hide');
		}			
	}
	check_called();
	$('#called').change(function(){
		check_called();
	});

	function check_minute(){
		if($('#minute').val()=='1'){
			$('.box-invite').removeClass('hide');
		}else{
			$('.box-invite').addClass('hide');
		}			
	}
	check_minute();
	$('#minute').change(function(){
		check_minute();
	});

	function check_invite(){
		if($('#invite').val()=='1'){
			$('.box-pre-registered').removeClass('hide');
			$('.box-pre-registered-no').addClass('hide');
		}else if ($('#invite').val()=='2') {
			$('.box-pre-registered').addClass('hide');
			$('.box-pre-registered-no').removeClass('hide');			
		}else{
			$('.box-pre-registered').addClass('hide');
			$('.box-pre-registered-no').addClass('hide');			
		}			
	}
	check_invite();
	$('#invite').change(function(){
		check_invite();
	});

	function check_pre_registered(){
		if($('#pre_registered').val()=='1'){
			$('.box-pre-registered-yes').removeClass('hide');
			$('.box-pre-registered-no').addClass('hide');
			$('.box-mobile').removeClass('hide');
			$('.box-closing-yes').removeClass('hide');
		}else if ($('#pre_registered').val()=='2') {
			$('.box-pre-registered-yes').addClass('hide');
			$('.box-pre-registered-no').removeClass('hide');
			$('.box-mobile').addClass('hide');
			$('.box-closing-yes').addClass('hide');			
		}else{
			$('.box-pre-registered-yes').addClass('hide');
			$('.box-pre-registered-no').addClass('hide');
			$('.box-mobile').addClass('hide');
			$('.box-closing-yes').addClass('hide');
		}			
		if ($('#invite').val()=='2' || $('#pre_registered').val()=='2') {
			$('.box-pre-registered-no').removeClass('hide');			
		}else{
			$('.box-pre-registered-no').addClass('hide');			
		}					
	}
	check_pre_registered();
	$('#pre_registered').change(function(){
		check_pre_registered();
	});

	function check_send_email(){
		if($('#send_email').val()=='1'){
			$('.box-email').removeClass('hide');
			$('.box-send-email-yes').removeClass('hide');
			$('.box-closing').removeClass('hide');
			$('.box-closing-no').addClass('hide');
		}else if ($('#send_email').val()=='2') {
			$('.box-email').addClass('hide');
			$('.box-send-email-yes').addClass('hide');
			$('.box-closing').addClass('hide');
			$('.box-closing-no').removeClass('hide');
		}else{
			$('.box-email').addClass('hide');
			$('.box-send-email-yes').addClass('hide');
			$('.box-closing').addClass('hide');
			$('.box-closing-no').addClass('hide');
		}			
	}
	check_send_email();
	$('#send_email').change(function(){
		check_send_email();
	});

});