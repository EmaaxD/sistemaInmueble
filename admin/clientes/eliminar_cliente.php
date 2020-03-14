<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

$id = htmlentities($_GET['id']);

$del = $conexion->prepare("DELETE FROM clientes WHERE id=? ");

$del->bind_param('i',$id);

if ($del->execute()) {
	
	header('location:../extend/alerta.php?msj=Cliente eliminado&c=cli&p=in&t=success');
}else{

	header('location:../extend/alerta.php?msj=El cliente no pudo ser eliminado&c=cli&p=in&t=error');
}

$del->close();
$conexion->close();
?>