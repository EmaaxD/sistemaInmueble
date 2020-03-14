<?php 

include 'admin/conexion/conexion_web.php';
$conexion = conexion_web();

include 'admin/conexion/conexiones.php';
$ruta = servidor();

filter_var(variable)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$id_estado = htmlentities($_POST['estado']);
	$municipio = htmlentities($_POST['municipio']);
	$operacion = htmlentities($_POST['operacion']);
	$tipo_inmueble = htmlentities($_POST['tipo_inmueble']);
	$rango1 = htmlentities($_POST['rango1']);
	$rango2 = htmlentities($_POST['rango2']);

	$sel_edo = $conexion->prepare("SELECT estado FROM estados WHERE idestados=? ");
	$sel_edo->bind_param('i', $id_estado);
	$sel_edo->execute();
	$res_edo = $sel_edo->get_result();

	if ($f_edo = $res_edo->fetch_assoc()) {
		
		$estado = $f_edo['estado'];
	}

	$sel_marc = $conexion->prepare("SELECT * FROM inventario WHERE estado = ? AND municipio = ? AND operacion = ? AND tipo_inmueble = ? AND precio BETWEEN ? AND ? ");
	$sel_marc->bind_param('ssssdd', $estado, $municipio, $operacion, $tipo_inmueble, $rango1, $rango2);
	$sel_marc->execute();
	$res_marc = $sel_marc->get_result();

}else{

	header('location:index.php');
	exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Sitio Web</title>
	<link rel="stylesheet" href="<?php echo $ruta; ?>css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="blue-grey lighten-5">
	
	<nav class="red">
		
		<a href="index.php" class="brand-logo center">Logo</a>
	</nav>

	<div class="slider">

	    <ul class="slides">

	    	<?php 

	    		$sel = $conexion->prepare("SELECT * FROM slider");
	    		$sel->execute();
	    		$res = $sel->get_result();

	    		while ($f = $res->fetch_assoc()) { ?>

	      <li>

	        <img src="admin/inicio/<?php echo $f['ruta'] ?>"> <!-- random image -->

	        <div class="caption <?php echo $f['estilos'] ?>">

	          <h3 class="<?php echo $f['h3'] ?>">This is our big Tagline!</h3>
	          <h5 class="<?php echo $f['h5'] ?>">Here's our small slogan.</h5>

	        </div>

	      </li>

	      <?php 

	      	}

	      	$sel->close();
	      ?>

	    </ul>

	</div>

	<div class="row">

		<?php 

			while ($f_marc = $res_marc->fetch_assoc()) { ?>
		
		<div class="col s12 m6 l3">
			
			<div class="card">

	            <div class="card-image">

	              <img class="materialboxed" data-caption="A picture of a way with a group of trees in a park" width="250" height="300" src="admin/propiedades/<?php echo $f_marc['foto_principal'] ?>">
	              <span class="card-title"><?php echo '$'. number_format($f_marc['precio'], 2) ?></span>

	            </div>

	            <div class="card-content">

	              <p><?php echo $f_marc['fraccionamiento'].' '.$f_marc['estado'].' '.$f_marc['municipio']; ?></p>

	            </div>

	            <div class="card-action">

	              <a href="ver_mas.php?id=<?php echo $f_marc['propiedad'] ?>">Ver mas..</a>

	            </div>

            </div>

		</div>

		<?php 

			} 

			$sel_marc->close();

		?>

	</div>
	

	<?php include 'admin/extend/scripts.php'; ?>

	<script>
		
		$('.slider').slider();

		$('.materialboxed').materialbox();

	</script>
	
</body>
</html>