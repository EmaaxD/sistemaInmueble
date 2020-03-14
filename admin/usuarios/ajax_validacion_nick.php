<?php 

include '../conexion/conexiones.php';

$conexion = conexion();

$nick = $conexion->real_escape_string($_POST['nick']);

$sel = $conexion->query("SELECT	id FROM usuario WHERE nick = '$nick' ");

$row = mysqli_num_rows($sel);

if ($row != 0) {
	
	echo "<label style='color:red;'>El nombre de usuario ya existe<i class='material-icons' style='position:relative;top:3px;left:7px;'>clear</i></label>";

}else{

	echo "<p style='color:green;'>El nombre de usuario esta disponible<i class='material-icons' style='position:relative;top:5px;left:7px;'>check</i></p>";
}

$conexion->close();
?>
