$(document).ready(function(){
$(function(){
	$("#dsr_user").load('dsr_user.php');
	$("#curr_date").html('<h2>'+$('#datepicker').val()+'</h2>');
})

$('#submit1').click(function(){
		//alert($('#datepicker').val());
		$("#curr_date").html('<h2>'+$('#datepicker').val()+'</h2>');
	var formData = {
		'date' : $('#datepicker').val(),
		'user' : $('#user_drp').val()
	}
		$.ajax({
			type     : 'POST',
			url		 : 'dsr_user.php',
			data     : formData,
			datatype : 'json',
			encode   : true,
		})
		.success(function(data) 
		{
			//console.log(data);
			//alert(data);
			$("#dsr_user").html(data);
		})
})

})