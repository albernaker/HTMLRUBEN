<?php
	session_start();

	$incioSesion = false;

	if (!empty($_POST)) {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "videojocs";

		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
			die("ERROR al conectar con la BBDD");
		}

		$usuario = $_POST["username"];
		$contrasenya = $_POST["pass"];

		$sql = "SELECT * FROM usuaris
				WHERE nom_usuari = '$usuario' AND contrasenya = '$contrasenya'";
		
		$result = $conn->query($sql);

		// OPCIÓN 1
		/*if ($result->num_rows > 0) {
			
			$row = $result->fetch_assoc();
			$_SESSION["user"] = $row["id_usuari"];

			$incioSesion = true;

		}*/

		// OPCIÓN 2
		$row = $result->fetch_assoc();
		if ($row) {	
			
			$_SESSION["user"] = $row["id_usuari"];

			$incioSesion = true;

		}

		$conn->close();
	}

	if ($incioSesion) {
		header("Location: index.html");
	} else {
		header("Location: form_login.html");
	}
?>