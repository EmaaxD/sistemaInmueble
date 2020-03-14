<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

$id = $conexion->real_escape_string(htmlentities($_GET['id']));

$del = $conexion->query("DELETE FROM usuario WHERE id='$id' ");

if ($del) {
		
	header('location:../extend/alerta.php?msj=Usuario eliminado correctamente&c=us&p=in&t=success');
}else{

	header('location:../extend/alerta.php?msj=El usuario no pudo ser eliminado&c=us&p=in&t=error');
}

$conexion->close();

?>