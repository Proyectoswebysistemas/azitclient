<?php 
    $postData = array("server" => 'localhost', "root" => "root", "password" => "123");  
	/*Convierte el array en el formato adecuado para cURL*/  
	$name 	  = $_POST['name'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$paramentros = "name=$name&email=$email&password=$password";
	$url = "http://azitsever.esy.es/index.php";
	$handler = curl_init();  
	curl_setopt($handler, CURLOPT_URL, $url);  
	curl_setopt($handler, CURLOPT_POST, true);  
	curl_setopt($handler, CURLOPT_POSTFIELDS, $paramentros);
	curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($handler, CURLOPT_CONNECTTIMEOUT, 10); 
	$response = curl_exec ($handler);  
	if ($response !== FALSE) {
		if (!empty($response)) {
			echo "Datos de conexion correctos<br />";
			foreach (json_decode($response, TRUE) as $key => $value) {
				echo $key." - ".$value['nombre']."<br />";		
			}		
		}elseif (empty($response)) {
			echo "Datos de conexion incorrectos";	
		}  
	}else{
		echo "No se logro conectar con el servidor web";
	}
	curl_close($handler);
?>