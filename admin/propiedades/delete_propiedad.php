<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

$id = htmlentities($_GET['id']);
$foto = htmlentities($_GET['foto']);

$del = $conexion->prepare("DELETE FROM inventario WHERE propiedad=? ");
$del->bind_param('s', $id);

if ($del->execute()) {

	if ($foto != "casas/foto_principal.jpg") {
		
		unlink($foto);
	}
	
	$sel = $conexion->prepare("SELECT * FROM imagenes WHERE id_propiedad=? ");
	$sel->bind_param('s', $id);
	$sel->execute();
	$res = $sel->get_result();

	while ($f = $res->fetch_assoc()) {
		
		unlink($f['ruta']);
	}

	$del_img = $conexion->prepare("DELETE FROM imagenes WHERE id_propiedad=? ");
	$del_img->bind_param('s', $id);
	$del_img->execute();
	$del_img->close();

	header('location:../extend/alerta.php?msj=Propiedad eliminada&c=prop&p=can&t=success');

}else{

	header('location:../extend/alerta.php?msj=Propiedad no eliminada&c=prop&p=can&t=error');
}

$del->close();
$conexion->close();

?>