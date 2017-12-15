$(document).ready(function(){

	$('#titlediv').focusout(function(){
		var titleval=$(this).val().trim(); //trim() removes whitespaces
		//alert('aaaaaa');
		if(titleval.length==0) 
			$(this).next().html('please fill above field');
		else if(titleval.length>250)
			$(this).next().html('no more than 250 characters');
		else
			$(this).next().html(' ');
	});

	$('#bodydiv').focusout(function(){
		var val=$(this).val().trim();

		if(val.length==0)
			$(this).next().html('please fill above field');
		else
			$(this).next().html(' ');
	});
});