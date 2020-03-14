<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$cont = 0;
	
	foreach ($_FILES['ruta']['tmp_name'] as $key => $value) {
		
		$ruta = $_FILES['ruta']['tmp_name'][$key];
		$imagen = $_FILES['ruta']['name'][$key];

		$ancho = 1080;
		$alto = 250;
		$info = pathinfo($imagen);
		$tamano = getimagesize($ruta);
		$width = $tamano[0];
		$heigth = $tamano[1];

		if ($info['extension'] == 'jpg' || $info['extension'] == 'JPG' ) {
			
			$imagenvieja = imagecreatefromjpeg($ruta);
			$nueva = imagecreatetruecolor($ancho, $alto);
			imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $heigth);
			$cont++;
			// $ran = rand(000,999);
			$rand = rand(000,999);
			$renombrar = $rand.$cont;
			$copia = "slider/".$renombrar.$rand.$id.".jpg";
			imagejpeg($nueva,$copia);

		}elseif ($info['extension'] == 'png' || $info['extension'] == 'PNG' ) {
			
			$imagenvieja = imagecreatefrompng($ruta);
			$nueva = imagecreatetruecolor($ancho, $alto);
			imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $heigth);
			$cont++;
			$rand = rand(000,999);
			$renombrar = $rand.$cont;
			$copia = "slider/".$renombrar.$rand.$id.".png";
			imagepng($nueva,$copia);
		}else {

			header('location:../extend/alerta.php?msj=Solo se acepta formato JPG y PNG&c=home&p=sl&t=error');
			exit();
		}


		$ins = $conexion->prepare("INSERT INTO slider VALUES(?,?) ");
		$ins->bind_param("is",$id_img,$copia);
		$id_img = '';
		$ins->execute();

		//termina foreach
	}

	if ($ins) {
		
		header('location:../extend/alerta.php?msj=Imagenes guardadas&c=home&p=sl&t=success');
	}else{

		header('location:../extend/alerta.php?msj=Imagenes no fue gardada&c=home&p=sl&t=error');
	}

	$ins->close();
	$conexion->close();
}else{

	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=home&p=sl&t=error');
}

?>