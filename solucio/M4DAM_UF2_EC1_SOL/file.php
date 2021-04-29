<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SUBIR ARCHIVO</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<?php
			if (!empty($_FILES)) {
				$nombre = $_FILES["archivo"]["name"];
				$rutaTmp = $_FILES["archivo"]["tmp_name"];
				$tamanyo = $_FILES["archivo"]["size"];
				$tipo = $_FILES["archivo"]["type"];
				$extension = substr($nombre, strpos($nombre, "."));
				$rutaDestino = "files/".time().$extension;
				$linkDescarga = $_SERVER["HTTP_ORIGIN"]."/$rutaDestino";

				echo "<table>
						<tr>
							<td>Nombre</td>
							<td>$nombre</td>
						</tr>
						<tr>
							<td>Ruta temporal</td>
							<td>$rutaTmp</td>
						</tr>
						<tr>
							<td>Tamaño</td>
							<td>$tamanyo</td>
						</tr>
						<tr>
							<td>Tipo</td>
							<td>$tipo</td>
						</tr>
					</table>";

				move_uploaded_file($rutaTmp, $rutaDestino);

				echo "<p>Puedes descargar el archivo a través de este link: <a href=\"$rutaDestino\">$linkDescarga</a></p>";
			}
		?>
	</body>
</html>