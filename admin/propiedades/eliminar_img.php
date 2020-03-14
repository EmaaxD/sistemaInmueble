<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

$id = htmlentities($_GET['id']);
$ruta = htmlentities($_GET['ruta']);
$id_propiedad = htmlentities($_GET['id_propiedad']);

$del = $conexion->prepare("DELETE FROM imagenes WHERE id = ? ");
$del->bind_param('i', $id);


if ($del->execute()) {
	
	unlink($ruta);

	header('location:../extend/alerta.php?msj=Imagen eliminada&c=prop&p=img&t=success&id='.$id_propiedad.'');
}else{

	header('location:../extend/alerta.php?msj=Imagen no eliminada&c=prop&p=img&t=error&id='.$id_propiedad.'');
}

$del->close();
$conexion->close();
?>