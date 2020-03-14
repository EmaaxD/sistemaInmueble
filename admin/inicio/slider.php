<?php  
include '../conexion/conexiones.php';
$conexion = conexion();
$ruta = servidor();

include '../extend/header.php'; 


?>

<div class="row">

 	 <div class="col s6">
 	 	
 	 	<h2 class="header">Cargar imagenes para Slader</h2>

			<div class="row">
					
				<div class="col s12">
					
					<div class="card">
						
						<div class="card-content">

							<form action="ins_slider.php" class="form" method="post" enctype="multipart/form-data">
					          	
					          	<div class="file-field input-field">
									
									<div class="btn">
										
										<span>Imagen:</span>

										<input type="file" name="ruta[]" multiple>

									</div>

									<div class="file-path-wrapper">
										
										<input class="file-path validate" type="text">

									</div>

								</div>

								<button type="submit" class="btn">Guardar</button>

					        </form>

						</div>

					</div>

				</div>

			</div>
 	 </div>
          
</div>

<div class="row cargador">
	
	<div class="col s12 center">
		
		<div class="preloader-wrapper big active">

		    <div class="spinner-layer spinner-blue-only">

		      <div class="circle-clipper left">

		        <div class="circle"></div>

		      </div><div class="gap-patch">

		        <div class="circle"></div>

		      </div><div class="circle-clipper right">

		        <div class="circle"></div>

		      </div>

		    </div>

		</div>

	</div>
</div>

<div class="row">
	
	<div class="col s12">
		
		<div class="card">
			
			<div class="card-content">

				<?php 

					$sel_img = $conexion->prepare("SELECT * FROM slider ");
					$sel_img->execute();
					$res_img = $sel_img->get_result();
					while ($f_img = $res_img->fetch_assoc()) { ?>

					 <a href="#" onclick="swal({ title: 'Estas seguro que deseas eliminar la imagen?', text: 'Al eliminarla no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor:'#d33', confirmButtonText: 'Si, eliiminarlo' }).then(function () {
                  		location.href='eliminar_slider.php?id=<?php echo $f_img['id'] ?>&ruta=<?php echo $f_img['ruta'] ?>'; })"><img src="<?php echo $f_img['ruta'] ?>" alt=""></a>

					<?php 

						} 
						$sel_img->close(); 
						$conexion->close();
					?>
			</div>

		</div>

	</div>

</div>


<?php include '../extend/scripts.php'; ?>

<script>
	
	$('.cargador').hide();

	$('.form').submit(function (argument) {
		
		$('.cargador').show();
	})
</script>