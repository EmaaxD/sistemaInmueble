<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

$id = htmlentities($_GET['id']);
$ruta = htmlentities($_GET['ruta']);

$del = $conexion->prepare("DELETE FROM slider WHERE id = ? ");
$del->bind_param('i', $id);


if ($del->execute()) {
	
	unlink($ruta);

	header('location:../extend/alerta.php?msj=Imagen eliminada&c=home&p=sl&t=success');
}else{

	header('location:../extend/alerta.php?msj=Imagen no eliminada&c=home&p=sl&t=error');
}

$del->close();
$conexion->close();
?>