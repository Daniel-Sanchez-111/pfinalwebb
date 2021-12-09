<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> Productos </title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 

	?>
	
	<main class="container">
		<script src="js/app.js"></script>
		  <div class="topnav" id="myTopnav">
		  <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
		  <a href="productos.php" class="active">Productos</a>
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
		<section class="form-banner"> 
			<section class="bg-primary">
				<h1>Productos</h1>
			</section>
			
		</section>
				<div class="drop">
				  <button class="btn-drop">Categorias</button>
				  <div class="drop-categorias">
				    <a href="">Belleza</a>
				    <a href="">Videojuegos</a>
				    <a href="">Electronica</a>
				    <a href="">Hogar</a>
				    <a href="">Juguetes</a>
				  </div>
				</div>
			</span>
		<span class="sp3"></span>
			<?php
				require_once('conexion.php');
				if(isset($_COOKIE['logeado'])){
				$email=$_COOKIE['logeado'];
				}else{
					$email="";
				}	
				echo '<link rel="stylesheet" href="style.css">';
				$sql = "SELECT * FROM Producto";
				$result = mysqli_query($conn,$sql);

				if(mysqli_num_rows($result)>0){
					echo '<section class="container-productos">';
					
					while ($fila = mysqli_fetch_assoc($result)) {
						if(isset($_COOKIE['logeado'])){
							$usuario=$_COOKIE['logeado'];
						}else{
							$usuario=NULL;
						}
						$idprodu=$fila["idProducto"];
						$nombre=$fila["nombreProd"];
						$ruta=$fila["ruta"];
						$precio=$fila["precioOriginal"];
						$desc=$fila["precioDesc"];
						
						

						$sql2 = "SELECT * FROM Carrito WHERE idProducto = '$idprodu' AND email = '$usuario'";
						$result2 = mysqli_query($conn,$sql2);
						if(mysqli_num_rows($result2)>0){
							$esta = 1;
						}else{
							$esta=0;
						}
						$preOriginal = $fila["precioOriginal"];
						echo '<form action="agregaralcarrito.php" method="POST">';
						echo '<div class="form-productos">
						<input type="hidden" name="id_prod" value="',$idprodu,'">
						<input type="hidden" name="rut" value="',$ruta,'">
						<input type="hidden" name="nomb" value="',$nombre,'">
						<input type="hidden" name="pre" value="',$desc,'">
						<a href="" class="a-3"><img src=',$ruta,' title="Juguete" class="image2"><p>',
						$nombre,'</p></a><div class=descuento>',($precio>0?$preOriginal:""),'</div><div class="info">$',
						$desc,'.00</div>';
						echo ($esta>0?'</form><form action="" method="POST">':"");
						echo '<input type="hidden" name="id_produ" value="',$idprodu,'">';
						echo ($esta>0?'
							<button class="btn-encarrito" disabled><i class="fa fa-check-circle"></i> En el carrito</button>
							<button class="btn-eliminar" name="eliminar" ><i class="fa fa-trash"></i> Eliminar</button>
							</form>':'<button class="btn-agregar" name="agregar" ><i class="fa fa-cart-plus" ></i> Agregar al carrito</button>'),'</div>';
						echo '</form>';

					}
					
					echo '</section>';
				}
				if (isset($_POST['eliminar'])) {
				$idprod = $_POST["id_produ"];
				$sql = "DELETE FROM Carrito WHERE idProducto = '$idprod' AND email = '$email'";
				var_dump($_POST);
				if(mysqli_query($conn,$sql)){
						echo "<script>
			                alert('Se ha eliminado el producto del carrito');
			                window.location= 'productos.php'
			   				 </script>";
					
					
				}else{

					echo "<script>
			                alert('Se ha producido un error al eliminar el producto');
			                window.location= 'productos.php'
			   				 </script>";
				}
			}

			?>
		<div class="sp2"> </div>
	</main>
</body>
</html>