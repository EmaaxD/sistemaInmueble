<?php  
include '../conexion/conexiones.php';
$conexion = conexion();
$ruta = servidor();

include '../extend/header.php'; 

?>

<div class="row">
	
	<div class="col s12">
		
		<div class="card">

		    <div class="card-content">

		    	<h1>Editar perfil</h1>

		    </div>

		    <div class="card-tabs">

		      <ul class="tabs tabs-fixed-width">

		        <li class="tab"><a class="active" href="#datos">Datos</a></li>

		        <li class="tab"><a href="#pass">Contrasena</a></li>

		      </ul>

		    </div>

		    <div class="card-content grey lighten-4">

		      <div id="datos">
		      	
		      	<form class="form" action="up_perfil.php" method="post" enctype="multipart/form-data">

					<div class="input-field">
										
						<input type="text" name="nombre" title="Nombre del usuario" id="nombre" onblur="may(this.value, this.id)" required pattern="[A-Z/s ]+" value="<?php echo $_SESSION['nombre'] ?>">
				
						<label for="nombre">Nombre Completo Del Usuario</label>
				
					</div>


					<div class="input-field">
										
						<input type="email" name="correo" title="Correo electronico" id="correo" value="<?php echo $_SESSION['correo'] ?>">
				
						<label for="correo">Correo Electronico</label>
				
					</div>

					<button type="submit" class="btn black">Editar<i class="material-icons">send</i></button>

				</form>

		      </div>

		      <div id="pass">
		      	
		      	<form class="form" action="up_pass.php" method="post" enctype="multipart/form-data">

					<div class="input-field">
										
						<input type="password" name="pass1" title="CONTRASENA CON NUMEROS,LETRAS,MAYUSCULAS,MINUSCULAS ENTRE 8 Y 15 CARACTER" pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
				
						<label for="pass1">contrasena</label>
				
					</div>

					<div class="input-field">
										
						<input type="password" title="CONTRASENA CON NUMEROS,LETRAS,MAYUSCULAS,MINUSCULAS ENTRE 8 Y 15 CARACTER" pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
				
						<label for="pass2">Verificar contrasena</label>
				
					</div>

					<button type="submit" class="btn black" id="btn_guardar">Editar<i class="material-icons">send</i></button>

				</form>


		      </div>

		    </div>

	  </div>

	</div>

</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/primer.js"></script>
<script src="../js/validacion.js"></script>