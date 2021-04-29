<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>DETALL</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<?php
			if (!empty($_GET)) {
				echo "<h1>Detalles del producto $_GET[prod] (categoria $_GET[cat])</h1>";
			} else {
				echo "<h1>mmmm... no se el producto!!";
			}
		?>
	</body>
</html>