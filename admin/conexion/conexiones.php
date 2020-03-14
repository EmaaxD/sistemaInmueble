<?php 

function conexion(){
	
	@session_start();

	$local = "localhost";
	$user = "root";
	$pass = "";
	$db = "sistema";

	$conexion = new mysqli ($local,$user,$pass,$db);

	$conexion->set_charset('utf8');

	if ($conexion->connect_errno) {

    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

	}

	return $conexion;
	
}

function servidor(){
	
	return "/cdnM/";
}


?>