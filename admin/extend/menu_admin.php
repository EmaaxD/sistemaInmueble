<nav class="black">
	<a href="" data-activates="menu" class="button-collpase"><i class="material-icons">menu</i></a>
</nav>

<ul id="menu" class="side-nav fixed">
	
	<li>
		
		<div class="userView">
			
			<div class="background">
				
				<img src="../img/programacion2.jpg" alt="programacion">

			</div>

			<a href="../pefil/index.php"><img src="../usuarios/<?php echo $_SESSION['foto']  ?>" class="circle" alt=""></a>

			<a href="../pefil/perfil.php" class="white-text"><?php echo $_SESSION['nombre']  ?></a>

			<a href="" class="white-text"><?php echo $_SESSION['correo']  ?></a>

		</div>

		<li><a href="../inicio"><i class="material-icons">home</i>INICIO</a></li>
		<li><div class="divider"></div></li>

		<!--====  Link para ver los usuarios logeados ====-->

		<li><a href="../usuarios"><i class="material-icons">contacts</i>Usuarios</a></li>
		<li><div class="divider"></div></li>

		<!--====  Link para ver los clientes  ====-->
		
		<li><div class="divider"></div></li>
		<li><a href="../clientes"><i class="material-icons">contact_phone</i>Clientes</a></li>

		<!--====  Link para ver las propiedades  ====-->

		<li><div class="divider"></div></li>
		<li><a href="#" class="dropdown-button" data-activates="dropdown1"><i class="material-icons">work</i>PROPIEDADES<i class="material-icons right">arrow_drop_down</i></a></li>

		<!--====  Slider ====-->
		
		<li><div class="divider"></div></li>
		<li><a href="../inicio/slider.php"><i class="material-icons">web</i>SLIDER</a></li>


		<!--====  Logout ====-->

		<li><div class="divider"></div></li>
		<li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i>SALIR</a></li>
		


	</li>

</ul>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
	
  <li><a href="../propiedades/index.php">GENERALES</a></li>
  <li><a href="../propiedades/index.php?ope=VENTA">VENTAS</a></li>
  <li><a href="../propiedades/index.php?ope=RENTA">RENTA</a></li>
  <li><a href="../propiedades/index.php?ope=TRASPASO">TRANSPASO</a></li>
  <li><a href="../propiedades/index.php?ope=OCUPADO">OCUPADO</a></li>
  <li><a href="../propiedades/cancelados.php">CANCELADO</a></li>

</ul>