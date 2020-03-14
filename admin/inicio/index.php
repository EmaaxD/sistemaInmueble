<?php 

include '../conexion/conexiones.php';
$conexion = conexion();
$ruta = servidor();

$sel = $conexion->prepare("SELECT propiedad FROM inventario WHERE operacion = ? ");
$sel->bind_param('s', $operacion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../extend/header.php';   ?>
</head>
<body>

	<div class="row">
			
		<div class="col s12 m6 l6">
			
			<div class="card green darken-1">

				
				<div class="card-content">
					
					<span class="card-title white-text "><b>venta</b></span>

					<h2 align="center" class="white-text">
						<?php

						$operacion = 'VENTA';
						$sel->execute();
						$res_venta = $sel->get_result(); 

						echo mysqli_num_rows($res_venta);

						?>

						<i class="material-icons center" style="font-size: 40px;">trending_up</i>

					</h2>



				</div>

				<div class="card-action">
					
					<a href="../propiedades/index.php?ope=VENTA" class="white-text">ver mas...<i class="material-icons left">tag_faces</i></a>
				</div>

			</div>

		</div>

		<div class="col s12 m6 l6">
			
			<div class="card light-blue darken-1">

				
				<div class="card-content">
					
					<span class="card-title white-text"><b>renta</b></span>

					<h2 align="center" class="white-text">
						<?php

						$operacion = 'RENTA';
						$sel->execute();
						$res_renta = $sel->get_result(); 

						echo mysqli_num_rows($res_renta);

						?>

						<i class="material-icons center" style="font-size: 40px;">content_paste</i>
					</h2>

				</div>

				<div class="card-action">
					
					<a href="../propiedades/index.php?ope=RENTA" class="white-text">ver mas...<i class="material-icons left">tag_faces</i></a>
				</div>

			</div>

		</div>

		<div class="col s12 m6 l6">
			
			<div class="card teal darken-1">

				
				<div class="card-content">
					
					<span class="card-title white-text"><b>traspado</b></span>

					<h2 align="center" class="white-text">
						<?php

						$operacion = 'TRASPASO';
						$sel->execute();
						$res_traspaso = $sel->get_result(); 

						echo mysqli_num_rows($res_traspaso);

						?>

						<i class="material-icons center" style="font-size: 40px;">import_export</i>
					</h2>

				</div>

				<div class="card-action">
					
					<a href="../propiedades/index.php?ope=TRASPASO" class="white-text">ver mas...<i class="material-icons left">tag_faces</i></a>
				</div>

			</div>

		</div>

		<div class="col s12 m6 l6">
			
			<div class="card yellow darken-1">

				
				<div class="card-content">
					
					<span class="card-title white-text"><b>ocupado</b></span>

					<h2 align="center" class="white-text">
						<?php

						$operacion = 'OCUPADO';
						$sel->execute();
						$res_ocupado = $sel->get_result(); 

						echo mysqli_num_rows($res_ocupado);

						?>

						<i class="material-icons center" style="font-size: 40px;">pause</i>
					</h2>

				</div>

				<div class="card-action">
					
					<a href="../propiedades/index.php?ope=OCUPADO" class="white-text">ver mas... <i class="material-icons left">tag_faces</i></a>
				</div>

			</div>

		</div>

	</div>

	<div class="row">
		
		<div class="col s12">
			
			<div class="card teal lighten-2">

			    <div class="card-content white-text">

			      <h4 align="center"><b>COMENTARIOS</b></h4>

			    </div>

			    <div class="card-tabs">

			      <ul class="tabs tabs-fixed-width tabs-transparent">
			        <li class="tab"><a class="active" href="#nuevos">Nuevos</a></li>
			        <li class="tab"><a href="#resueltos">Resueltos</a></li>
			      </ul>

			    </div>

			    <div class="card-content white">

			      <div id="nuevos">
			      	
			      	<table>

			           <th>Vista</th>
			           <th>Solicitante</th>
			           <th>Telefono</th>
			           <th>Correo</th>
			           <th>Mensaje</th>

			           <?php
			           $sel_com = $conexion->prepare("SELECT * FROM comentario WHERE estatus = ? ");
			           $sel_com->bind_param('s', $estatus);
			           $estatus = 'NUEVO';
			           $sel_com->execute();
			           $res_nuevo = $sel_com->get_result();

			           while ($fn =$res_nuevo->fetch_assoc()) { ?>
			           <tr>

			             <td class="borrar"><button data-target="modal1" class="btn modal-trigger btn-floating" onclick="enviar(this.value)" value="<?php echo $fn['id_propiedad'] ?>"><i class="material-icons">visibility</i></button></td>
			             <td><?php echo $fn['nombre'] ?></td>
			             <td><?php echo $fn['tel'] ?></td>
			             <td><a href="correo.php?correo=<?php echo $fn['correo'] ?>&nombre=<?php echo $fn['nombre'] ?>&id_mensaje=<?php echo $fn['id'] ?>"><?php echo $fn['correo'] ?></a></td>
			             <td><?php echo $fn['mensaje'] ?></td>

			           </tr>
			           <?php } ?>

			         </table>

			      </div>

			      <div id="resueltos">
			      	
			      	<table>

			           <th>Vista</th>
			           <th>Solicitante</th>
			           <th>Telefono</th>
			           <th>Correo</th>
			           <th>Mensaje</th>

			           <?php
			           $estatus = 'RESUELTO';
			           $sel_com->execute();
			           $res_resuelto = $sel_com->get_result();

			           while ($fr =$res_resuelto->fetch_assoc()) { ?>
			           <tr>

			             <td class="borrar"><button data-target="modal1" class="btn modal-trigger btn-floating" onclick="enviar(this.value)" value="<?php echo $fr['id_propiedad'] ?>"><i class="material-icons">visibility</i></button></td>
			             <td><?php echo $fr['nombre'] ?></td>
			             <td><?php echo $fr['tel'] ?></td>
			             <td><?php echo $fr['correo'] ?></td>
			             <td><?php echo $fr['mensaje'] ?></td>

			           </tr>
			           <?php } ?>

			         </table>

			      </div>

			    </div>

			</div>
		</div>
	</div>

	
	<!-- Modal Structure -->
	<div id="modal1" class="modal">

	  <div class="modal-content">

	    <h4>Informacion</h4>
	    
	    <div class="res_modal">
	      

	    </div>

	  </div>

	  <div class="modal-footer">

	    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>

	  </div>

	</div>


	<?php include '../extend/scripts.php' ?>
	<script src="../js/primer.js"></script>
	<script>

	  $('.modal').modal();

	  function enviar(valor) {

	  $.get('../propiedades/modal.php',{

	    id:valor,

	    beforeSend:function () {
	      
	      $('.res_modal').html("Espere un momento por favor...");
	    }
	    
	  }, function (respuesta) {
	    
	      $('.res_modal').html(respuesta);
	  });

	}
	    
	</script>
</body>
</html>




 