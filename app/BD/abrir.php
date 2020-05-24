<?php

	$host="127.0.0.1";
	$usuario="root";
	$pass="";
	$database="horarios";

	
	$conexion = mysqli_connect($host, $usuario, $pass, $database);
	if(!$conexion)
	{
		echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
	}
?>
