<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Pagina principal </title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<script src="js/app.js"></script>
	<main class="container">
		<nav>
		<div class="topnav" id="myTopnav">
		  <a href="index.php" class="active"><i class="fa fa-home"></i> Inicio</a>
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
		<section class="form-banner"> 
			<section class="bg-primary">
				<h1>Productos en oferta</h1>
			</section>
		</section>
		<section class="container-prod">
			<div class="form-cat">
				<h2> Categorias</h2>
				<section class="container-prod4">
				<div>
					<a href="" class="a-3"><img src="imagenes/ropa.png" title="Ropa"><p>Ropa</p></a>
				</div>
				<div>
					<a href="" class="a-3"><img src="imagenes/videojuegos.png" title="Videojuegos"><p>Videojuegos</p></a>
				</div>
				</section>
				<section class="container-prod4">
					<div>
						<a href="" class="a-3"><img src="imagenes/jardin.png" title="Jardin"><p>Jardin</p></a>
					</div>
					<div>
						<a href="" class="a-3"><img src="imagenes/cocinando.png" title="Cocina"><p>Cocina</p></a>
					</div>
					
				</section>
			</div>
			<div class="form-varios">
				<section class="container-prod3">
				<div class="image3">
					<a href="" class="a-3"><img src="imagenes/lego1.png" title="Juguete" class="image2"><p>LEGO Kit de construcción</p></a>
					<div class="descuento">
						$400.00MXN
					</div>	
					<div class="info">
						$250.00MXN
					</div>
				</div>
				<section class="container-prod3">
				<div>
					<a href="" class="a-3"><img src="imagenes/barbie1.png" title="Juguete" class="image2"><p>Barbie Fashionista</p></a>
					<div class="descuento">
						$531.00MXN
					</div>	
					<div class="info">
						$300.00MXN
					</div>
				</div>
			</section>
			</div>
			<div class="form-prod">
				<a href="" class="a-3"><img src="imagenes/secador.png" title="Belleza" class="image2"><p>Revlon secador</p></a>
					<div class="descuento">
						$1356.00MXN
					</div>	
					<div class="info">
						$890.00MXN
					</div>
			</div>
			<div class="form-prod">
				<a href="" class="a-3"><img src="imagenes/esferas.jpg" title="Hogar" class="image2"><p>Esferas de navidad</p></a>
					<div class="descuento">
						$120.00MXN
					</div>	
					<div class="info">
						$89.00MXN
					</div>
			</div>
		
		</section>
		<img src="imagenes/publicidad.jpg" class="banner">
		<section class="container-prod2">
			<div class="form-varios">
				<section class="container-prod3">
				<div class="image3">
					<a href="" class="a-3"><img src="imagenes/maleta.png" title="Maleta" class="image2"><p>Maleta deportiva</p></a>
					<div class="descuento">
						$290.00MXN
					</div>	
					<div class="info">
						$150.00MXN
					</div>
				</div>
				<section class="container-prod3">
				<div>
					<a href="" class="a-3"><img src="imagenes/control.png" title="Control remoto" class="image2"><p>Fire TV control remoto</p></a>
					<div class="descuento">
						$799.00MXN
					</div>	
					<div class="info">
						$450.00MXN
					</div>
				</div>
			</section>
			</div>
			<div class="form-prod">
				<div>
					<a href="" class="a-3"><img src="imagenes/delorean.png" title="Delorean Juguete" class="image2"><p>Juguete Delorean</p></a>
					<div class="descuento">
						$600.00MXN
					</div>	
					<div class="info">
						$350.00MXN
					</div>
				</div>
			</div>
			<div class="form-prod">

				<div>
					<a href="" class="a-3"><img src="imagenes/apa.png" title="Peluche Apa" class="image2"><p>Peluche Apa</p></a>
					<div class="descuento">
						$300.00MXN
					</div>	
					<div class="info">
						$190.00MXN
					</div>
				</div>
			</div>
			<div class="form-prod">

				<div>
					<a href="" class="a-3"><img src="imagenes/sw1.png" title="Peluche star wars" class="image2"><p>Juguete Star Wars</p></a>
					<div class="descuento">
						$450.00MXN
					</div>	
					<div class="info">
						$280.00MXN
					</div>
				</div>
			</div>
		</section>
	</nav>
	</main>
</body>
</html>