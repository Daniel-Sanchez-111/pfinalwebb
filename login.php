<?php
	require_once('conexion.php');
	session_start();
	$verificar_usuario = 0;
	if (isset($_POST['iniciar'])) {
		
		if($_POST['Correo'] == '' or $_POST['Contraseña'] == ''){

				 echo "<script>
                alert('Por favor ingrese todos los datos');
                window.location= 'iniciarsesion.php'
   				 </script>";

		}else{
			$contra = MD5($_POST['Contraseña']);
			$cor = $_POST['Correo'];
			$sql = "SELECT * FROM Usuario WHERE email = '$cor' AND contraseña = '$contra'";
			$result = $conn->query($sql);

			if ($result->num_rows == 0) {
				    echo "<script>
	                alert('El correo o la contraseña son incorrectos ');
	                window.location= 'iniciarsesion.php' </script>";
			}else{
					setcookie('logeado',$_POST['Correo'],0);
					echo "<script>
			        alert('Sesion iniciada con exito');
			        window.location= 'index.php' </script>";
					
	            
			}
			}
	}

?>