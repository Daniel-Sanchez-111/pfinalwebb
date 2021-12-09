<?php
	require_once('src/PHPMailer.php');
	require_once('src/SMTP.php');
	if(isset($_POST["envcorreo"])){
		
		$mail = new PHPMailer();
		$mail-> CharSet = 'UTF-8';
		$cuerpo = "Hola, respecto a su queja, un especialista se pondra en contacto con usted, por favor responda este correo con su numero telefonico";
		$dest = $_POST["Correo"];
		$asunto = $_POST["queja"];
		$rec = $_POST["nombre"];
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
			echo "<script>
			                alert('Se ha enviado su correo con exito');
			                window.location= 'index.php'
			   				 </script>";
		}else{
			echo "<script>
			                alert('Se ha producido un error al enviar su correo');
			                window.location= 'contacto.php'
			   				 </script>";
		}
		
	
}
?>