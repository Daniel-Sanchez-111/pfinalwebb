<?php
	require_once('conexion.php');

	if (isset($_POST['agregar'])) {
		if(isset($_COOKIE['logeado'])){
			$email=$_COOKIE['logeado'];
			$idprod = $_POST['id_prod'];
			$img = $_POST["rut"];
			$nom = $_POST["nomb"];
			$precio = $_POST["pre"];
			$sql = "INSERT INTO Carrito (idProducto,email,nombre,precioProd,ruta) VALUES('$idprod','$email','$nom','$precio','$img')";
			if(!mysqli_query($conn,$sql)){
				echo "<script>
		                alert('Se ha producido un error al agregar el producto al carrito');
		                window.location= 'productos.php'
		   				 </script>";
		}
		else{
			echo "<script>
	                alert('Producto agregado con exito');
	                window.location= 'productos.php'
	   				 </script>";
		}

		}else{
			echo "<script>
	                alert('Por favor inicie sesion para agregar productos al carrito');
	                window.location= 'iniciarsesion.php'
	   				 </script>";
		}
		
}

?>