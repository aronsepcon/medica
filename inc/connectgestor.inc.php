<?php 

    $dsn = "mysql:dbname=ibis;host=192.168.1.30";
	$user = "remoto";
	$password = "s3pc0n2020";

/*
	$dsn = "mysql:dbname=ibis;host=localhost";
	$user = "root";
	$password = "";
*/
	try {
		$pdo = new PDO($dsn,$user,$password);
		$errorDbConexion = false;
	}
	catch ( PDOException $e) {
		echo 'Error al conectarnos ' . $e->getMessage();
	}

	$pdo->exec("SET CHARACTER SET utf8"); // <--utf8
?>