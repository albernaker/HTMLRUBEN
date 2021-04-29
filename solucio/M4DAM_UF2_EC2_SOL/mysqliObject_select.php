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

			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if ($conn->connect_error) {
				die("ERROR al conectar con la BBDD");
			}

			$sql = "SELECT * FROM usuaris";
			
			$result = $conn->query($sql);
			
			if ($result) {

				if ($result->num_rows > 0) {

					echo "<table>
							<tr>
								<th>Usuario</th>
								<th>Contraseña</th>
								<th>Nombre</th>
								<th>Apellidos</th>
							</tr>";

					$row = $result->fetch_assoc();
					while ($row) {
						echo "<tr>
								<td>$row[nom_usuari]</td>
								<td>$row[contrasenya]</td>
								<td>$row[nom]</td>
								<td>$row[cognoms]</td>
							</tr>";

						$row = $result->fetch_assoc();
					}

					echo "</table>";

				} else {
					echo "<p>No hay ningun usuario</p>";
				}
			}

			$conn->close();
		?>
	</body>
</html>
