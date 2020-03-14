<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$nick = $_SESSION['nick'];

	$nombre = $conexion->real_escape_string(htmlentities($_POST['nombre']));

	$correo = $conexion->real_escape_string(htmlentities($_POST['correo']));

	$up = $conexion->query("UPDATE usuario SET nombre='$nombre',correo='$correo' WHERE nick='$nick' ");

	if ($up) {
		
		$_SESSION['nombre'] = $nombre;

		$_SESSION['correo'] = $correo;

		header('location:../extend/alerta.php?msj=Datos actualizados&c=pe&p=perfil&t=success');
	}else{

		header('location:../extend/alerta.php?msj=Datos no actualizados&c=pe&p=perfil&t=error');
	}

	$conexion->close();
}else{

	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=pe&p=in&t=success');
}
?>