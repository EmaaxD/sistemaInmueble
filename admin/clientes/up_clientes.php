<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$nombre = htmlentities($_POST['nombre']);

	$direccion = htmlentities($_POST['direccion']);

	$telefono = htmlentities($_POST['telefono']);

	$correo = htmlentities($_POST['emial']);

	$id = htmlentities($_POST['id']);

	$up = $conexion->prepare("UPDATE clientes SET nombre=?, direccion=?, tel=?, correo=? WHERE id=? ");

	$up->bind_param('ssssi', $nombre,$direccion,$telefono,$correo,$id);


	if ($up->execute()) {
		
		$up_inv = $conexion->prepare("UPDATE inventario SET nombre_cliente=? WHERE id_cliente=? ");
		$up_inv->bind_param('si', $nombre, $id);
		$up_inv->execute();
		$up_inv->close();

		header('location:../extend/alerta.php?msj=Cliente actualizado&c=cli&p=in&t=success');

	}else{

		header('location:../extend/alerta.php?msj=El cliente no pudo ser actualizado&c=cli&p=in&t=error');

	}

	$up->close();
	$conexion->close();

}else{

	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
}

?>