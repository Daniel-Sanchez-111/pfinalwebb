<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Iniciar sesión</title>
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
				  <a href="iniciarsesion.php" class="active"><i class="fa fa-arrow-circle-right"></i> Iniciar sesión</a>
				  <a href="contacto.php"><i class="fa fa-info-circle"></i> Contacto</a>
				  <a href="detalles.php"><i class="fa fa-history"></i> Historial de ventas</a>
				  <a href="javascript:void(0);" class="icon" onclick="desplegable()">
				   <i class="fa fa-bars"></i>
				  </a>
			</div>
	</nav>
	<form action="login.php"  method="POST" id="login">
	<section class="container-login">
		<div class="form-login">
			<h3>Inicia sesión</h3>
			<input type="email" name="Correo" placeholder="Correo electronico" class="form-correo">
			<input type="password" name="Contraseña" placeholder="Contraseña" class="form-correo">
			<a href="recontraseña.php" class="a-4"><h4>¿Olvidaste tu contraseña?</h4></a>
			<button type="submit" class="btn-login" name="iniciar">Iniciar sesión</button>
			<a href="crearcuenta.php" class="a-4"><h4>¿No tienes una cuenta? Crear cuenta</h4></a>
			<div class="sp"> </div>
			<button type="submit" class="btn-loginALT"><img src="imagenes/facebook.png" class="image4">Continuar con Facebook</button>
			<button type="submit" class="btn-loginALT"><img src="imagenes/google.png" class="image4">Continuar con Google</button>
		</div>
	</section>
	</form>
</main>
</body>
</html>