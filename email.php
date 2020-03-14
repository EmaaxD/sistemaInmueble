<?php 

include 'admin/conexion/conexion_web.php';
$conexion = conexion_web();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	foreach ($_POST as $campo => $valor) {
		
		$variable = "$" . $campo. "='" .htmlentities($valor). "';";
		eval($variable);
	}

	$header = "MINE-vERSION 1.0 \r\n";
	$header .= "Content-Type: text/html; charset=iso-8859-1 \r\n";
	$header .= "From: {$nombre} <{$correo}> \r\n";

	$mail = mail("correo@empresa.com", $asunto, $mensaje, $header);

	if ($mail) {
		
		echo '<h5 for="" style="color:green;">Su mensaje ha sido enviado</h5>';

	}else{
		 	
		echo '<h5 for="" style="color:red;">Su mensaje no pudo ser enviado</h5>';
	}

$conexion->close();
}else{

	echo '<h5 for="" style="color:red;">Utilize el formulario</h5>';
}

?>