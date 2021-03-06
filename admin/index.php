 <?php 

include 'conexion/conexiones.php';
$conexion = conexion();
$ruta = servidor();

if (isset($_SESSION['nick'])) {
	
	header('location:inicio');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido</title>

	<link rel="stylesheet" href="<?php echo $ruta; ?>css/materialize.min.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="grey lighten-2">

	<main>

		<div class="row">
			

			<div class="input-field col s12 center">
								
				<img src="img/logo.png" width="200" class="circle">
		
			</div>

		</div>
		
		<div class="container">
			
			<div class="row">
					
				<div class="col s12">
					
					<div class="card z-depth-5">
						
						<div class="card-content">

							<span class="card-title"><center>Inicio de sesion</center></span>

							<form action="login/index.php" method="post" autocomplete="off">
								

								<div class="input-field">
									
									<i class="material-icons prefix">perm_identity</i>

									<input type="text" name="usuario" id="usuario" required pattern="[A-Za-z]{8,15}" autofocus>
							
									<label for="usuario">Usuario</label>
							
								</div>

								<div class="input-field">

									<i class="material-icons prefix">vpn_key</i>
													
									<input type="password" name="contra" id="contra" required pattern="[A-Za-z0-9]{8,15}">
							
									<label for="contra">Contrasena</label>
							
								</div>

								<div class="input-field center">
													
									<button type="submit" class="btn waves-effect waves-light">Acceder</button>
								</div>

							</form>
						</div>

					</div>

				</div>

			</div>

		</div>

	</main>

<?php include 'extend/scripts.php'; ?>

</body>
</html>