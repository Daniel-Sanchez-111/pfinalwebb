<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Recuperar contraseña </title>
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
		  <a href="iniciarsesion.php"><i class="fa fa-arrow-circle-right"></i> Iniciar sesión</a>
		  <a href="contacto.php" ><i class="fa fa-info-circle"></i> Contacto</a>
		  <a href="detalles.php"><i class="fa fa-history"></i> Historial de ventas</a>
		  <a href="javascript:void(0);" class="icon" onclick="desplegable()">
		    <i class="fa fa-bars"></i>
		  </a>

		</div>
		</nav>
		<form action="actualizar.php" method="POST">
			<section class="container-contacto">
			<div class="form-contacto">
			<h3>Cambiar contraseña</h3>

			<?php 
			$cod = $_SESSION["cod"];
			echo'
			<input type="text" name="confCodigo" placeholder="Codigo" class="form-correo"><input type="password" name="Contraseña" placeholder="Contraseña (8-20 caracteres)" class="form-correo" minlength="8" maxlength="20">
			<input type="password" name="ContraseñaConfirmacion" placeholder="Repetir contraseña" class="form-correo" minlength="8" maxlength="20">';

			?>		
			<button type="submit" class="btn-crear" name="envcodigo">Cambiar contraseña</button>
			<?php
				if(isset($_POST["envcodigo"]))
				{
					if($_POST["confCodigo"] = "" or  $_POST["Contraseña"] = "" or $_POST["ContraseñaConfirmacion"] = ""){

					}else{
						$conf = $_POST["confCodigo"];
						if ($cod=$conf) {
							if ($_POST["Contraseña"] = $_POST["ContraseñaConfirmacion"]) {
								echo "<script>
				                alert('Actualizando contraseña...');
				                 window.location= 'actualizar.php'
				   				 </script>";
							}else{
								echo "<script>
				                alert('Las contraseñas no coinciden');
				                 window.location= 'cambiarcontra.php'
				   				 </script>";
							}
						}else{
							echo "<script>
				                alert('El codigo introducido no es valido');
				                 window.location= 'cambiarcontra.php'
				   				 </script>";
						}
					}
					
				}
			?>
		</form>
		</div>
	</section>
</main>
</body>
</html>