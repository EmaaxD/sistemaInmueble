<?php 

include 'admin/conexion/conexion_web.php';
$conexion = conexion_web();

include 'admin/conexion/conexiones.php';
$ruta = servidor();

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
		
		<a href="index.phpw" class="brand-logo center">Logo</a>
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

			$sel_marc = $conexion->prepare("SELECT * FROM inventario WHERE marcado = 'SI' ");
			$sel_marc->execute();
			$res_marc = $sel_marc->get_result();

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

	<div class="row">
			
		<div class="col s12">
			
			<div class="card">

				<div class="card-content">
					
					<span class="card-title">Buscador de inmuebles</span>
					
					<form action="buscar.php" method="post">
						
						<div class="row">
        
				            <div class="col s6">
				              
				              <select id="estado" name="estado" required>

				                <option value="" disabled selected>SELECCIONE UN ESTADO</option>
				                
				                <?php 

				                  $sel_estado = $conexion->prepare("SELECT * FROM estados");

				                  $sel_estado->execute();

				                  $res_estado = $sel_estado->get_result();

				                  while ($f_estado = $res_estado->fetch_assoc()) { ?>

				                  <option value="<?php echo $f_estado['idestados'] ?>"><?php echo $f_estado['estado'] ?></option>

				                  <?php } $sel_estado->close(); ?>
				                  
				              </select>

				            </div>

				            <div class="col s6">
				              
				              <div class="res_estado"></div>
				              
				            </div>

			          	</div>

			          	<div class="row">
			          		
			          		<div class="col s6">
			          			
			          			<select name="operacion" required  >

					              <option value="" disabled selected  >ELIGE LA OPERACION</option>
					              <option value="VENTA">VENTA</option>
					              <option value="RENTA">RENTA</option>
					              <option value="TRASPASO">TRASPASO</option>
					              <option value="OCUPADO">OCUPADO</option>

					            </select>

			          		</div>

			          		<div class="col s6">
			          			
			          			<select name="tipo_inmueble" required >

					              <option value="" disabled selected  >ELIGE EL TIPO DE INMUEBLE</option>
					              <option value="CASA">CASA</option>
					              <option value="TERRENO">TERRENO</option>
					              <option value="LOCAL">LOCAL</option>
					              <option value="DEPARTAMENTO">DEPARTAMENTO</option>

					            </select>
					            
			          		</div>

			          	</div>

			          	<div class="row">
			          		
			          		<div class="col s6">
			          			
			          			<div class="input-field">
			          				
			          				<input type="number" name="rango1" id="rango1" required>
			          				<label for="rango1">Precio minimo</label>

			          			</div>

			          		</div>

			          		<div class="col s6">
			          			
			          			<div class="input-field">
			          				
			          				<input type="number" name="rango2" id="rango2" required>
			          				<label for="rango2">Precio maximo</label>

			          			</div>

			          		</div>

			          	</div>

			          	<button type="submit" class="btn">Buscar inmueble<i class="material-icons right">send</i></button>

					</form>

				</div>

			</div>

		</div>

	</div>

	<div class="row">
			
		<div class="col s12">
			
			<div class="card">
				
				<div class="card-content">

					<span class="card-title">Contacto</span>

					<div class="row">
						
						<div class="col s6">
							
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29071.245752560695!2d-65.14087461738974!3d-24.38458299394116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x941bacdad1fd15ef%3A0x13d3c0d6ca0268ad!2sPerico%2C+Jujuy!5e0!3m2!1ses!2sar!4v1521424050661" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen class="z-depth-4"></iframe>

						</div>

						<div class="col s6">
							
							<div class="input-field">

			                   <input type="text" name="nombre" pattern="[A-Za-z/s ]+" title=""  id="nombre" required >
			                   <label for="nombre">Nombre:</label>

			                 </div>

			                 <div class="input-field">

			                   <input type="text" name="asunto" title=""  id="asunto"  >
			                   <label for="asunto">Asunto:</label>

			                 </div>

			                 <div class="input-field">

			                   <input type="email" name="correo" title=""  id="correo" required  >
			                   <label for="correo">Correo:</label>

			                 </div>

			                 <div class="input-field">

			                   <textarea name="mensaje" rows="8" cols="80" id="mensaje" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
			                   <label for="">Mensaje:</label>
			                   
			                 </div>

			                 <div class="resultado"></div>

			                 <button type="button" class="btn" id="enviar">Enviar</button>

						</div>
					</div>

				</div>

			</div>

		</div>

	</div>

	<footer class="page-footer red white-text center">
		Copyright &copy; 2018 Empresa 
	</footer>	

	

	<?php include 'admin/extend/scripts.php'; ?>

	<script>
		
		$('.slider').slider();

		$('.materialboxed').materialbox();

		$('select').material_select();

		$('#estado').change(function() {
		
			$.post('admin/propiedades/ajax_muni.php',{

				estado:$('#estado').val(),

				beforeSend:function () {
					
					$('.res_estado').html("<div class='progress'><div class='indeterminate'></div></div>");
				}
				
			}, function (respuesta) {
				
					$('.res_estado').html(respuesta);
			});

		});

		$('#enviar').click(function() {
    
	      $.post('email.php',{

	        nombre:$('#nombre').val(),
	        asunto:$('#asunto').val(),
	        correo:$('#correo').val(),
	        mensaje:$('#mensaje').val(),
	        id_propiedad:$('#id_propiedad').val(),

	        beforeSend:function () {
	          
	          $('.resultado').html("<div class='progress'><div class='indeterminate'></div></div>");
	        }
	        
	      }, function (respuesta) {
	        
	          $('.resultado').html(respuesta);
	      });

	    });

	</script>
	
</body>
</html>