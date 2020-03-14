<?php include 'admin/conexion/conexion_web.php';
$con = conexion_web();

include 'admin/conexion/conexiones.php';
$ruta = servidor();

$id = htmlentities($_GET['id']);
$sel = $con->prepare("SELECT * FROM inventario WHERE propiedad = ? ");
$sel->bind_param('s', $id);
$sel->execute();
$res = $sel->get_result();
if ($f =$res->fetch_assoc()) {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie-edge">

  <link rel="stylesheet" href="<?php echo $ruta; ?>css/materialize.min.css">

  <link href="<?php echo $ruta; ?>css/icon.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo $ruta; ?>css/sweetalert2.css">

  <title>Sitio web</title>

</head>

<body class="blue-grey lighten-5">

<nav class="red" >
  <a href="index.php" class="brand-logo center">Logo</a>
</nav>

<div class="container">
  <div class="row">
    <div class="col s12">
      <h5 class="header"><?php echo $f['tipo_inmueble'] ?> EN <?php echo $f['operacion'] ?> PRECIO $ <?php echo number_format($f['precio']) ?></h5>
      <div class="card horizontal">
        <div class="card-image">
          <img src="admin/propiedades/<?php echo $f['foto_principal'] ?>">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p><b>UBICACION:</b> <?php echo $f['mapa'] ?></p>
            <p><b>DESCRIPCION:</b> <?php echo $f['comentario_web'] ?></p>
            <p><b>RECAMARAS:</b> <?php echo $f['recamaras'] ?></p>
            <p><b>BAÑOS:</b> <?php echo $f['banos'] ?></p>
            <p><b>COCHERAS:</b> <?php echo $f['cocheras'] ?></p>
            <p><b>PLANTAS:</b> <?php echo $f['plantas'] ?></p>
            <div class="row">
              <br>
              <div class="col s4">
                <?php
                $asesor = $f['asesor'];
                $sel_ase = $con->prepare("SELECT correo, foto FROM usuario WHERE nombre = ? ");
                $sel_ase->bind_param('s', $asesor);
                $sel_ase->execute();
                $res_ase = $sel_ase->get_result();
                if ($f_ase =$res_ase->fetch_assoc()) {
                }
                 ?>
                 <img src="admin/usuarios/<?php echo $f_ase['foto'] ?>" width="100" class="circle">
              </div>
              <div class="col s8">
                <p><b>ASESOR: </b><?php echo $asesor ?></p>
                <p><b>CORREO: </b><?php echo $f_ase['correo'] ?></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
   </div>

   <div class="row">
     <div class="col s12">
       <div class="card">
         <div class="card-content">
          <div class="row">
           <?php $sel_img = $con->prepare("SELECT * FROM imagenes WHERE id_propiedad = ? ");
           $sel_img->bind_param('s', $id);
           $sel_img->execute();
           $res_img = $sel_img->get_result();
           while ($f_img =$res_img->fetch_assoc()) {?>
           <div class="col s3">
            <img class="materialboxed" src="admin/propiedades/<?php echo $f_img['ruta'] ?>" width="200" >
          </div>
            <?php }
            ?>
            </div>
         </div>
       </div>
     </div>
   </div>

   <div class="row">
     <div class="col s12">
       <div class="card">
         <div class="card-content">
           <span class="card-title">UBICACION</span>
           <div class="row">
             <div class="col s6">
               <iframe width="100%" height="500" src="admin/propiedades/mapa.php?mapa=<?php echo $f['mapa'] ?>" frameborder="0" class="z-depth-4"></iframe>
             </div>
             <div class="col s6">
                 <div class="input-field">
                   <input type="text" name="nombre" pattern="[A-Za-z/s ]+"  title=""  id="nombre" required >
                   <label for="nombre">Nombre:</label>
                 </div>
                 <div class="input-field">
                   <input type="text" name="telefono"   title=""  id="telefono"  >
                   <label for="telefono">Telefono:</label>
                 </div>
                 <div class="input-field">
                   <input type="email" name="correo"   title=""  id="correo" required  >
                   <label for="correo">Correo:</label>
                 </div>
                 <div class="input-field">
                   <textarea name="mensaje" rows="8" cols="80" id="mensaje" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
                   <label for="">Mensaje:</label>
                   <input type="hidden" name="id_propiedad" id="id_propiedad" value="<?php echo $id ?>">
                 </div>
                 <div class="resultado"></div>
                 <button type="button" class="btn" id="enviar">Enviar</button>
                 
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

</div>

    <?php include 'admin/extend/scripts.php'; ?>
    <script src="admin/js/primer.js"></script>

    <script>
      $('.materialboxed').materialbox();

      $('#enviar').click(function() {
    
      $.post('ins_comentario.php',{

        nombre:$('#nombre').val(),
        telefono:$('#telefono').val(),
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