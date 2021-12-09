<?php 
		require_once('conexion.php');
		session_start(); 
		
		$verificar_usuario = 0;
		if(isset($_POST['crear'])){
			if ($_POST['Nombre'] == '' or $_POST['Correo'] == '' or $_POST['Contraseña'] == '' or $_POST['ContraseñaConfirmacion'] == ''){
				 echo "<script>
                alert('Por favor ingrese todos los datos');
                window.location= 'crearcuenta.php'
   				 </script>";
			}else{	

					$cor = $_POST['Correo'];
					if (filter_var($cor, FILTER_VALIDATE_EMAIL)) {
							require_once('src/PHPMailer.php');
							require_once('src/SMTP.php');
							
							$mail = new PHPMailer();
							$mail-> CharSet = 'UTF-8';
							$cuerpo = "No responda a este correo";
							$dest = $_POST["Correo"];
							$asunto = "Confirmacion de correo";
							$rec = $_POST["Nombre"];
							$mail->isSMTP();
							$mail->Host = 'smtp.gmail.com';
							$mail->SMTPSecure = 'tls';
							$mail->Port = 587;
							$mail->SMTPAuth = true;
							$mail->Username = 'soportewebids5@gmail.com';
							$mail->Password = 'loquendoXD12';
							$mail->setFrom('soporteWEBIDS5@gmail.com', 'Soporte');
							$mail->AddReplyTo('soporteWEBIDS5@gmail.com', 'Soporte');
							$mail->Subject=$asunto;
							$mail->MsgHTML($cuerpo);
							$mail->AddAddress($dest,$rec);
							if($mail->send()){
								$sql = "SELECT * FROM Usuario WHERE email = '$cor'";
							$result = $conn->query($sql);

							if ($result->num_rows >= 1) {
							    echo "<script>
				                alert('El correo ya ha sido registrado');
				                window.location= 'crearcuenta.php'
				   				 </script>";
									}else{
										$verificar_usuario=1;
									}
				        		 }
				        		 else
				        		 {
				        		 		echo "<script>
						                alert('El correo no es valido');
						                window.location= 'crearcuenta.php'
						   				 </script>";
				        		 }
							}
							if($verificar_usuario==1){
								if($_POST['Contraseña'] == $_POST['ContraseñaConfirmacion']){
									echo "string";
									$usuario = $_POST['Nombre'];
									$contra = MD5($_POST['Contraseña']);
									$correo = $_POST['Correo'];
									$sql="INSERT INTO Usuario (idUsuario,nombre,email,contraseña) VALUES (NULL,'$usuario','$correo','$contra')";
									mysqli_query($conn,$sql);
									echo "<script>
					                alert('Usuario registrado con exito');
					                window.location= 'iniciarsesion.php'
					   				 </script>";
									
								}
							}

				}
							}else{
								echo "<script>
								                alert('Por favor introduzca un correo valido');
								                window.location= 'contacto.php'
								   				 </script>";
							}
					
	?>