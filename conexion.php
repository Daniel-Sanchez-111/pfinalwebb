<?php 
		$conn = mysqli_connect("localhost", "root", "", "BDWeb");
		$conn->set_charset("utf8");
		
		if (!$conn) {
	    echo "Error: No se pudo conectar a MySQL. Error " . mysqli_connect_errno() . " : ". mysqli_connect_error() . PHP_EOL;
	    die;
	    }
?> 