
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<meta charset="utf-8">
	<title> Historial de ventas</title>
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
		  <a href="productos.php">Productos</a>
		  <a href="carrito.php" ><i class="fa fa-cart-plus"></i> Carrito</a>
		  <?php
		  if(isset($_COOKIE['logeado']))
		  {
		  	 echo '<a href="logout.php"><i class="fa fa-arrow-circle-left"></i> Cerrar sesión</a>';
		  }else{
		 	 echo '<a href="iniciarsesion.php"><i class="fa fa-arrow-circle-right"></i> Iniciar sesión</a>';
		  }
		  ?>
		  <a href="contacto.php"><i class="fa fa-info-circle"></i> Contacto</a>
		  <a href="detalles.php" class="active"><i class="fa fa-history"></i> Historial de ventas</a>
		  <a href="javascript:void(0);" class="icon" onclick="desplegable()">
		    <i class="fa fa-bars"></i>
		  </a>

		</div>
	</nav>
	
<?php
	require_once('conexion.php');
	if(isset($_COOKIE['logeado'])){
		$email=$_COOKIE['logeado'];
		$sql = "SELECT * FROM Venta WHERE email='$email' order by fechaVenta desc";
		$result = mysqli_query($conn,$sql);
		echo'<section class="container-carrito">';
		echo '<h3>Historial de ventas</h3>';
		if(mysqli_num_rows($result)>0){	
			while ($fila = mysqli_fetch_assoc($result)) {
				echo '<form>';
				echo '<span class="form-carrito2"> <div class="form-producto-carrito2"><div class="push2">Productos </div><div class="prods"><h4>',$fila["productos"],'</h4></div>
				<div class="push2">Fecha de venta <h4>',$fila["fechaVenta"],'</h4></div><div class="push2">Monto total de venta <h4>$',$fila["monto"],' MXN</h4></div>';
				
				echo '</div></span></form>';
		}
	}
	}else{
		echo "<script>alert('Por favor inicie sesion para ver su historial de compras');
			  window.location= 'iniciarsesion.php'</script>";
	}	
	

?>