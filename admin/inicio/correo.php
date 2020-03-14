<?php 

include '../conexion/conexiones.php';
$ruta = servidor();

// include '../extend/header.php';

$nombre = htmlentities($_GET['nombre']);
$correo = htmlentities($_GET['correo']);
$id_mensaje = htmlentities($_GET['id_mensaje']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie-edge">

  <link rel="stylesheet" href="<?php echo $ruta; ?>css/materialize.min.css">

  <link href="<?php echo $ruta; ?>css/icon.css" rel="stylesheet">

  <title>Admin</title>

</head>
<body>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Enviar correo a: <?php echo $nombre ?></span>
        <form  action="email.php" method="post">
          <div class="input-field">
            <input type="text" name="asunto"  title="asunto"  id="asunto" onblur="may(this.value, this.id)"  >
            <label for="asunto">Asunto:</label>
          </div>
          <div class="input-field">
            <textarea name="mensaje" rows="8" cols="80" id="mensaje" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
            <label for="mensaje">Mensaje:</label>
          </div>
          <input type="hidden" name="correo" value="<?php echo $correo ?>">
          <input type="hidden" name="id_mensaje" value="<?php echo $id_mensaje ?>">
          <input type="hidden" name="correo_asesor" value="<?php echo $_SESSION['correo']?>" >
            <input type="hidden" name="asesor" value="<?php echo $_SESSION['nombre']?>" >
          <button type="submit" class="btn">Enviar correo</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/primer.js"></script>

</body>
</html>