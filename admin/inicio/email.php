<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	foreach ($_POST as $campo => $valor) {
		
		$variable = "$" . $campo. "='" .htmlentities($valor). "';";
		eval($variable);
	}

	$header = "MINE-vERSION 1.0 \r\n";
	$header .= "Content-Type: text/html; charset=iso-8859-1 \r\n";
	$header .= "From: {$asesor} <{$correo_asesor}> \r\n";

	$mail = mail($correo, $asunto, $mensaje, $header);

	if ($mail) {
		
		$up = $conexion->prepare("UPDATE comentario SET estatus='RESUELTO' WHERE id=? ");
		$up->bind_param('i', $id_mensaje);
		$up->execute();
		$up->close();

		header('location:../extend/alerta.php?msj=Mensaje enviado&c=home&p=home&t=success');
	}else{

		header('location:../extend/alerta.php?msj=Mensaje no enviado&c=home&p=home&t=error');
	}

$conexion->close();
}else{

	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=home&p=home&t=error');
}

?>