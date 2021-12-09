<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Contactanos </title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<main class="container">

		<nav>
		<script src="js/app.js"></script>
		  <div class="topnav" id="myTopnav">
		  <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
		  <a href="productos.php"> Productos</a>
		  <a href="carrito.php"><i class="fa fa-cart-plus"></i> Carrito</a>
		  <?php
		  if(isset($_COOKIE['logeado']))
		  {
		  	 echo '<a href="logout.php"><i class="fa fa-arrow-circle-left"></i> Cerrar sesión</a>';
		  }else{
		 	 echo '<a href="iniciarsesion.php"><i class="fa fa-arrow-circle-right"></i> Iniciar sesión</a>';
		  }
		  ?>
		  <a href="contacto.php" class="active"><i class="fa fa-info-circle"></i> Contacto</a>
		  <a href="detalles.php"><i class="fa fa-history"></i> Historial de ventas</a>
		  <a href="javascript:void(0);" class="icon" onclick="desplegable()">
		    <i class="fa fa-bars"></i>
		  </a>

		</div>
		</nav>
		<form action="enviarcor.php" method="POST">
			<section class="container-contacto">
			<div class="form-contacto">
			<h3>Soporte técnico</h3>
			<input type="text" name="nombre" placeholder="Nombre" class="form-correo">
			<?php
			  require_once('conexion.php');
			  if(isset($_COOKIE['logeado']))
			  {
			  	$email=$_COOKIE['logeado'];
			  	$sql = "SELECT * FROM Usuario where email='$email'";
			  	$result = mysqli_query($conn,$sql);
				$fila = mysqli_fetch_assoc($result); 
				$nom = $fila['nombre'];
			  	 echo '<input type="email" name="Correo" placeholder="Correo electronico" class="form-correo" value=',$email,'>';
			  }else{
			 	 echo '<input type="email" name="Correo" placeholder="Correo electronico" class="form-correo">';
			  }
			  ?>			
			<textarea rows="10" cols="50" placeholder="Comentarios/dudas/quejas" name="queja"></textarea>
			<button type="submit" class="btn-crear" name="envcorreo">Enviar comentarios</button>
			<h4>Numero telefonico: XXXXXXXXX</h4>
			
		</form>
		</div>
	</section>
</main>
</body>
</html>
