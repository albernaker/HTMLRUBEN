<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SERVER</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<?php
			echo "<ul>";
			echo "<li>Nom de la pàgina actual: ".$_SERVER["PHP_SELF"]."</li>";
			echo "<li>Nom del lloc web:".$_SERVER["SERVER_NAME"]."</li>";
			echo "<li>IP del servidor:".$_SERVER["SERVER_ADDR"]."</li>";
			echo "<li>Tipus de navegador:".$_SERVER["HTTP_USER_AGENT"]."</li>";
			echo "</ul>";
		?>
	</body>
</html>