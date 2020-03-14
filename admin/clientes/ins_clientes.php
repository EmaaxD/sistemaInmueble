<?php 

include '../conexion/conexiones.php';
$conexion =  conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$nombre = htmlentities($_POST['nombre']);

	$direccion = htmlentities($_POST['direccion']);

	$telefono = htmlentities($_POST['telefono']);

	$correo = htmlentities($_POST['emial']);

	$asesor = $_SESSION['nombre'];

	$id = '';

	$ins = $conexion->prepare("INSERT INTO clientes VALUES(?,?,?,?,?,?) ");

	$ins->bind_param("isssss", $id,$nombre,$direccion,$telefono,$correo,$asesor);

	$ins->execute();

	if ($ins->execute()) {
		
		header('location:../extend/alerta.php?msj=Cliente registrado&c=cli&p=in&t=success');

	}else{

		header('location:../extend/alerta.php?msj=El cliente no pudo ser registrado&c=cli&p=in&t=error');

	}

	$ins->close();

	$conexion->close();

}else{

	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
}

?>