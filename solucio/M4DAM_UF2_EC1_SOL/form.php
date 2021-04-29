<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<?php
			echo "<h3>Datos recibidos por $_SERVER[REQUEST_METHOD]</h3>";

			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$datos = $_GET;
			} else {
				$datos = $_POST;
			}

			foreach ($datos as $elemento => $valor) {
				if (is_array($valor)) {
					echo "<strong>$elemento</strong>: ";

					foreach ($valor as $valorDentroArray) {
						echo "$valorDentroArray, ";
					}
					echo "<br />";
				} else {
					echo "<strong>$elemento</strong>: $valor<br />";
				}
			}
		?>
	</body>
</html>