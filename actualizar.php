<?php
	session_start();
	require_once('conexion.php');
	if(isset($_POST["envcodigo"])){
		if($_POST['codi'] = $_POST["confCodigo"]){
			if($_POST['Contraseña'] == $_POST['ContraseñaConfirmacion']){
				$contra = MD5($_POST['Contraseña']);
				$email = $_SESSION['email'];
				$sql = "UPDATE Usuario SET contraseña = '$contra' WHERE email = '$email'";
				if(mysqli_query($conn,$sql))
				{
					echo "<script>
				                alert('Se ha actualizado su contraseña con exito');
				                window.location= 'iniciarsesion.php'
				   				 </script>";
				}else{
					echo "<script>
				                alert('Se ha producido un error al actualizar su contraseña, vuelva a intentarlo mas tarde');
				                window.location= 'iniciarsesion.php'
				   				 </script>";
				}
			}else{
				echo "<script>
				                alert('Las contraseñas no son iguales');
				                window.location= 'cambiarcontra.php'
				   				 </script>";
			}
		}else{
			echo "<script>
				                alert('El codigo de verificacion es incorrecto');
				                window.location= 'cambiarcontra.php'
				   				 </script>";
		}
	}