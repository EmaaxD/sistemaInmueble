<?php 

include '../conexion/conexiones.php';
$ruta = servidor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo $ruta; ?>css/sweetalert2.css">
</head>
<body background="grey">

	<?php 

		$mensaje = htmlentities($_GET['msj']);
		$c = htmlentities($_GET['c']);
		$p = htmlentities($_GET['p']);
		$t = htmlentities($_GET['t']);

		switch ($c) {

			case 'us':
				$carpeta = '../usuarios/';
			break;

			case 'home':
				$carpeta = '../inicio/';
			break;

			case 'salir':
				$carpeta = '../';
			break;

			case 'pe':
				$carpeta = '../pefil/';
			break;

			case 'cli':
				$carpeta = '../clientes/';
			break;

			case 'prop':
				$carpeta = '../propiedades/';
			break;
			
			
		}

		switch ($p) {

			case 'in':
				$pagina = 'index.php';
			break;

			case 'home':
				$pagina = 'index.php';
			break;

			case 'salir':
				$pagina = '';
			break;
			
			case 'perfil':
				$pagina = 'perfil.php';
			break;

			case 'img':
				$pagina = 'imagenes.php';
			break;

			case 'can':
				$pagina = 'cancelados.php';
			break;

			case 'sl':
				$pagina = 'slider.php';
			break;


		}

		if (isset($_GET['id'])) {
			
			$id = htmlentities($_GET['id']);
			$dir = $carpeta.$pagina.'?id='.$id;

		}else{

			$dir = $carpeta.$pagina;
			
		}


		if ($t == "error") {
			
			$titulo = "Oppss..";

		}else{

			$titulo = "Buen trabajo!";
		}

	?>

	<script src="<?php echo $ruta; ?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo $ruta; ?>js/sweetalert2.js"></script>

	<script>
		
		swal({
			
		  title: '<?php echo $titulo ?>',
		  text: '<?php echo $mensaje ?>',
		  type: '<?php echo $t ?>',
		  button: 'Ok'

		}).then(function () {
			
			location.href='<?php echo $dir ?>';
		});
		
		$(document).click(function () {
			
			location.href='<?php echo $dir ?>';
		});	

		$(document).keyup(function (e) {
			
			if (e.which == 27) {

				location.href='<?php echo $dir ?>';
			}
		});
	</script>
</body>
</html>