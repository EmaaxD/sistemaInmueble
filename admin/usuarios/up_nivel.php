<?php 
include '../conexion/conexiones.php';
$conexion = conexion();
include '../extend/permiso.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$id = $conexion->real_escape_string(htmlentities($_POST['id']));

	$nivel = $conexion->real_escape_string(htmlentities($_POST['nivel']));

	$up = $conexion->query("UPDATE usuario SET nivel='$nivel' WHERE id='$id' ");

	if ($up) {
		
		header('location:../extend/alerta.php?msj=Nivel actualizado&c=us&p=in&t=success');
	}else{

		header('location:../extend/alerta.php?msj=El nivel del usuario no pudo ser actualizado&c=us&p=in&t=error');
	}

}else{

	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
}

?>