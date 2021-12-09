<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Recuperar contraseña </title>
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
		  <a href="productos.php"> Productos</a>
		  <a href="carrito.php"><i class="fa fa-cart-plus"></i> Carrito</a>
		  <a href="iniciarsesion.php"><i class="fa fa-arrow-circle-right"></i> Iniciar sesión</a>
		  <a href="contacto.php" ><i class="fa fa-info-circle"></i> Contacto</a>
		  <a href="detalles.php"><i class="fa fa-history"></i> Historial de ventas</a>
		  <a href="javascript:void(0);" class="icon" onclick="desplegable()">
		    <i class="fa fa-bars"></i>
		  </a>

		</div>
		</nav>
		<form method="POST">
			<section class="container-contacto">
			<div class="form-contacto">
			<h3>Recuperar contraseña</h3>
			
			
			<?php
			
			function generarCodigo($longitud) {
			    $key = '';
			    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
			    $max = strlen($pattern)-1;
			    for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
			    return $key;
			}

			$longitud = 4;
			$cod = generarCodigo($longitud);
			$_SESSION['cod'] = $cod;
			?>
			<input type="email" name="Correo" placeholder="Correo electronico" class="form-correo">			
			<button type="submit" class="btn-crear" name="envcorreo">Enviar correo de recuperación</button>

			<?php
				require_once('src/PHPMailer.php');
				require_once('src/SMTP.php');
				require_once('conexion.php');
				if(isset($_POST["envcorreo"])){
					$dest = $_POST["Correo"];
					$sql = "SELECT * FROM Usuario where email='$dest'";
					$result = mysqli_query($conn,$sql);
					if ($result->num_rows >= 1) {
						echo '<form action="cambiarcontra.php" method="POST">';
						$cont = $_SESSION['cod'];
						$mail = new PHPMailer();
						$mail-> CharSet = 'UTF-8';
						$cuerpo = "Codigo: ".$cont;
						$asunto = "Recuperación de contraseña";
						$rec = $dest;
						$_SESSION["email"] = $dest;
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
						echo '<input type="hidden" name="email" value=',$dest,'>';
						echo '<input type="hidden" name="codigo" value=',$cont,'></form>';
						if($mail->send()){

							echo "<script>
							                alert('Se ha enviado su correo con exito');
							   				 window.location= 'cambiarcontra.php'</script>";
						}else{
							echo "<script>
							                alert('Se ha producido un error al enviar su correo');
							                window.location= 'recontraseña.php'
							   				 </script>";
						}
					}else{
							echo "<script>
							                alert('No existe ningun usuario registrado con ese correo');
							                window.location= 'recontraseña.php'
							   				 </script>";
						}
				
			}
			?>

		</form>
		</div>
	</section>
</main>
</body>
</html>