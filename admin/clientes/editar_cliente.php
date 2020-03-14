<?php 

include '../conexion/conexiones.php';
$conexion = conexion();
$ruta = servidor();

include '../extend/header.php';

$id = htmlentities($_GET['id']);

$sel = $conexion->prepare("SELECT * FROM clientes WHERE id='$id' ");

$sel->execute();

$res = $sel->get_result();

if ($f = $res->fetch_assoc()) {
	

}

?>

<div class="row">

  <div class="col s12">

    <div class="card">

      <div class="card-content">

        <span class="card-title">Alta de clientes</span>

        <form class="form" action="up_clientes.php" method="post" autocomplete=off >

          <input type="hidden" name="id" value="<?php echo $id ?>">	

          <div class="input-field">

            <input type="text" name="nombre" value="<?php echo $f['nombre'] ?>" title="Solo letras" pattern="[A-Z/s ]+"  id="nombre" onblur="may(this.value, this.id)"  >

            <label for="nombre">Nombre</label>

          </div>

          <div class="input-field">

            <input type="text" name="direccion" value="<?php echo $f['direccion'] ?>"  id="direccion" onblur="may(this.value, this.id)"  >

            <label for="direccion">Dirección</label>

          </div>

          <div class="input-field">

            <input type="text" name="telefono" value="<?php echo $f['tel'] ?>" id="telefono"  >

            <label for="telefono">Telefono</label>

          </div>

          <div class="input-field">

            <input type="email" name="email" value="<?php echo $f['correo'] ?>" id="email"   >

            <label for="email">Correo</label>

          </div>

          <button type="submit" class="btn" >Guardar</button>

        </form>

      </div>

    </div>

  </div>

</div>

<?php 

$sel->close();

$conexion->close();

include '../extend/scripts.php'; 

?>

<script src="../js/primer.js"></script>

 