<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>mysqli</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<?php
		 	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "videojocs";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			if (!$conn) {
				die("ERROR al conectar con la BBDD");
			}

			$sql = "INSERT INTO videojocs
					VALUES ('123456789012', 'Fortnite', 29.99, 'PC', 7)";
			
			$result = mysqli_query($conn, $sql);

			if (!$result) {
				echo "ERROR al insertar los datos";
			} else {
				echo "Datos insertados correctamente";
			}

			mysqli_close($conn);
		?>
	</body>
</html>
