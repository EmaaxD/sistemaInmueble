<?php 

if (!isset($_SESSION['nick'])) {
	
	header('location:../');
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

	<style>
		
		header, main, footer {

      		padding-left: 300px;
	    }

	    .button-collpase{

	    	display: none;
	    }

	    body {

	    	text-transform: uppercase;
	    }

	    @media only screen and (max-width : 992px) {

	      	header, main, footer {

	        	padding-left: 0;
	      	}

		    .button-collpase{

		    	display: inherit;
		   	}
	    }

	</style>

	<title>Admin</title>

</head>
<body class="grey lighten-3">
	
	<main>

		<?php 

			if ($_SESSION['nivel'] == 'ADMINISTRADOR') {
				
				include 'menu_admin.php';

			}else{

				include 'menu_asesor.php';
			}
			 
		?>
			

