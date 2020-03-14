<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$nick = $_SESSION['nick'];

	$pass = $conexion->real_escape_string(htmlentities($_POST['pass']));

	$pass = sha1($pass);

	$up = $conexion->query("UPDATE usuario SET pass='$pass' WHERE nick='$nick' ");

	if ($up) {

		header('location:../extend/alerta.php?msj=Password actualizada&c=pe&p=perfil&t=success');
	}else{

		header('location:../extend/alerta.php?msj=La password no se pudo actualizar&c=pe&p=perfil&t=error');
	}

	$conexion->close();
}else{

	header('location:../extend/alerta.php?msj=Foto de perfil actualizada&c=pe&p=in&t=success');
}

?>