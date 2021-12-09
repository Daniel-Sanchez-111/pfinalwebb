<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Crear cuenta</title>
	<link rel="stylesheet" href="style.css">
	 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

	<main class="container">
		<script src="js/app.js"></script>
		<nav>
		
		  <div class="topnav" id="myTopnav">
		  <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
		  <a href="productos.php">Productos</a>
		  <a href="carrito.php"><i class="fa fa-cart-plus"></i> Carrito</a>
		  <?php
		  if(isset($_COOKIE['logeado']))
		  {
		  	 echo '<a href="logout.php"><i class="fa fa-arrow-circle-left"></i> Cerrar sesión</a>';
		  }else{
		 	 echo '<a href="iniciarsesion.php"><i class="fa fa-arrow-circle-right"></i> Iniciar sesión</a>';
		  }
		  ?>
		  <a href="contacto.php"><i class="fa fa-info-circle"></i> Contacto</a>
		  <a href="detalles.php"><i class="fa fa-history"></i> Historial de ventas</a>
		  <a href="javascript:void(0);" class="icon" onclick="desplegable()">
		    <i class="fa fa-bars"></i>
		  </a>

		</div>
	</nav>
	<form action="registrar.php" method="POST" id="registro">
	<section class="container-login">
		<div class="form-login">

			<h3>Crear cuenta</h3>
			<input type="text" name="Nombre" placeholder="Nombre" class="form-correo">
			<input type="email" name="Correo" placeholder="Correo electronico" class="form-correo">
			<input type="password" name="Contraseña" placeholder="Contraseña (8-20 caracteres)" class="form-correo" minlength="8" maxlength="20">
			<input type="password" name="ContraseñaConfirmacion" placeholder="Repetir contraseña" class="form-correo" minlength="8" maxlength="20">
			<button type="submit" class="btn-crear" name="crear">Crear cuenta</button>
			<a href="iniciarsesion.php" class="a-4"><h4>¿Ya tienes una cuenta? Inicia sesión</h4></a>
			<div class="sp"> </div>
			<button type="submit" class="btn-loginALT"><img src="imagenes/facebook.png">Continuar con Facebook</button>
			<button type="submit" class="btn-loginALT"><img src="imagenes/google.png">Continuar con Google</button>
		
		</div>
	</section>
	</form>
</main>
</body>
</html>
