$("#login").submit(function(){
	username = $("#username").val();
	password = $("#password").val();

	apiUrl = '../../api/login.php?username='+username+'&password='+password+'';
	 $.getJSON(apiUrl, function(data){
	 		console.log(data);
		 	if(data.output == 'Failed'){
		 		$("#login-error").removeClass('hide');
		 	}else{
		 		document.location = 'account.php';
		 	}
	 });
	 
	event.preventDefault();
});