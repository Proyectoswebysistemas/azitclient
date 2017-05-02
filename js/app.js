$(document).ready(function(){
	$("#btn_connect").on("click", function(){
		$("#view_content").html("Conectando...");
		$.ajax({
			url  : "acceso.php",
			data : { name : 'José Guerrero', email : 'jose@hotmail.com', password : "123" },
			type : "POST",
			success : function(response){
				setTimeout(function(){
					$("#view_content").html(response);
				}, 1000);
			} 
		});
	});
});