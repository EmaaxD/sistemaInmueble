<?php 

include '../conexion/conexiones.php';
$conexion = conexion();

$_SESSION = array();

session_destroy();

header("location:../");

?>