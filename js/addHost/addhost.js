$("#addhost").submit(function(){

	domain = $("#addHostHostName").val();
	ip = $("#addHostIp").val();
	apiUrl = '/api/addDomain.php?ip='+ip+'&domain='+domain+'';
	 $.getJSON(apiUrl, function(data){
	 	console.log(data);
	 	if(data.output == 'Success'){
	 		$("#p-info").empty();
	 		$("#p-info").append('Success');
	 		$("#modal-info").modal('show');
	 		iframeUrl = '/api/iframe.php';
	 		window.open(iframeUrl);
	 	}
	 	else{

	 		$("#p-info").empty();
	 		$("#p-info").append('Failed');
	 		$("#modal-info").modal('show');
	 	}

	 	
	 })
	 .complete(function(){
	 	
	 })
	 .error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    })
	 

	event.preventDefault();
});