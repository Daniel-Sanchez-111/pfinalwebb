<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<meta charset="utf-8">
	<title> Carrito</title>
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
		  <a href="carrito.php" class="active"><i class="fa fa-cart-plus"></i> Carrito</a>
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
	
	<?php
		require_once('conexion.php');
			if(isset($_COOKIE['logeado'])){
				$email=$_COOKIE['logeado'];
			}else{
				$email="";
			}	
			$prods = "";
			$sql = "SELECT * FROM Carrito WHERE email='$email'";
			$result = mysqli_query($conn,$sql);
			echo'<section class="container-carrito">';
			if(mysqli_num_rows($result)>0){	

				while ($fila = mysqli_fetch_assoc($result)) {
					$preciot = $fila["precioProd"] * $fila["cantidad"];
					$prods.=' x'.$fila["cantidad"].' '.$fila["nombre"].nl2br('\n');
					echo '<form action="" method="POST" id="carritoCompras">';
					echo '<input type="hidden" name="id_produ" value="',$fila["idProducto"],'">';
					echo '<span class="form-carrito"> <div class="form-producto-carrito">
					<div><img src=',$fila["ruta"],' class="img-carrito"><h4>',
					$fila["nombre"],'</h4></div><div class=push> Precio: $',$preciot,
					'</div><div><input type="number" class="form-cantidad" min="1" name="Cantidad"  value=',
					$fila["cantidad"],'></div><div><button class="btn-actualizar" name="act">Actualizar</button>	
					</div><div><button class="btn-eliminar2" name="eliminar"><i class="fa fa-trash"></i></button>
					</div></div></span></form>';
				}
				
				echo '</section>';
				echo '<section class="container-carrito"> <div class="form-carrito">';
				$sql = "SELECT SUM(precioProd*cantidad) as suma FROM Carrito WHERE email='$email'";
				$result = mysqli_query($conn,$sql);
				$fila = mysqli_fetch_assoc($result); 
				$sum = $fila['suma'];
				$impuesto = $sum * .16;
				$total = $impuesto + $sum;
				echo "<div class=push><h5>Subtotal: $$sum</h5></div>";
				echo "<div class=push><h5>Impuestos: $$impuesto</h5></div>";
				echo "<div class=push><h6>Total: $$total</h6></div>";
				echo '</section>';
				echo '<form action="" method="POST">';
				echo '<section class="container-carrito"> <div class="form-carrito3">
				<button class="btn-comprar" name="pago"><i class="fa fa-check-circle"></i> Pagar</button>		
				</div>
				</span>
				</section>
				</form>';
			}else{
				echo "<h3>Tu carrito está vacio, añade productos y vuelve mas tarde</h3>";
			}
			
			if (isset($_POST['eliminar'])) {
				$idprod = $_POST["id_produ"];
				$sql = "DELETE FROM Carrito WHERE idProducto = '$idprod' AND email = '$email'";
				var_dump($_POST);
				if(mysqli_query($conn,$sql)){
						echo "<script>
			                alert('Se ha eliminado el producto del carrito');
			                window.location= 'carrito.php'
			   				 </script>";
					
					
				}else{

					echo "<script>
			                alert('Se ha producido un error al eliminar el producto');
			                window.location= 'carrito.php'
			   				 </script>";
				}
			}
			if (isset($_POST['act'])) {
				$idprod = $_POST["id_produ"];
				$cant = $_POST["Cantidad"];
				$sql = "UPDATE Carrito SET cantidad='$cant' WHERE idProducto = '$idprod' AND email = '$email'";

				if(mysqli_query($conn,$sql)){
						echo "<script>
			                alert('Se ha actualizado la cantidad del producto');
			                window.location= 'carrito.php'
			   				 </script>";
					
					
				}else{
						echo "<script>
			                alert('Se ha producido un error al actualizar la cantidad');
			                window.location= 'carrito.php'
			   				 </script>";
				}
			}
			if (isset($_POST['pago'])) {

				$fec =  date("Y-m-d H:i:s"); 
				$sql = "INSERT INTO Venta (idVenta,email,productos,fechaVenta,monto) VALUES (NULL,'$email','$prods','$fec','$total')";
				if(mysqli_query($conn,$sql)){
					$sql = "DELETE FROM Carrito WHERE email='$email'";
					mysqli_query($conn,$sql);
					echo "<script>
			                alert('Se ha completado la venta');
			                window.location= 'carrito.php'
			   				 </script>";			
				}else{

					echo "<script>
			                alert('Se ha producido un error al procesar la venta');
			                window.location= 'carrito.php'
			   				 </script>";
				}
			}



		
		?>
	
	<a href=""><img src="imagenes/publicidad2.jpg" class="banner"></a>
</main>
</body>
</html>
