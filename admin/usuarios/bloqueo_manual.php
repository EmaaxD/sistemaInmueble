<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

$id = $conexion->real_escape_string(htmlentities($_GET['us']));

$bloquedo = $conexion->real_escape_string(htmlentities($_GET['bl']));

if ($bloquedo == 1) {
	
	$up = $conexion->query("UPDATE usuario SET bloqueo=0 WHERE id='$id' ");

	if ($up) {
		
		header('location:../extend/alerta.php?msj=El usuario ha sido bloqueado&c=us&p=in&t=success');
	}else{

		header('location:../extend/alerta.php?msj=El usuario no ah podido ser bloqueado&c=us&p=in&t=error');
	}
}else{

	$up = $conexion->query("UPDATE usuario SET bloqueo=1 WHERE id='$id' ");

	if ($up) {
		
		header('location:../extend/alerta.php?msj=El usuario ha sido desbloqueado&c=us&p=in&t=success');
	}else{

		header('location:../extend/alerta.php?msj=El usuario no ah podido ser desbloqueado&c=us&p=in&t=error');
	}

}
?>