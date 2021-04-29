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
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$datos = $_GET;
			} else {
				$datos = $_POST;
			}
			
			//if (isset($datos["texto"])) { OPCIÓN 1
			//if (count($datos) > 0) { OPCIÓN 2
			if (!empty($datos)) { // OPCIÓN 3

				echo "<h3>Datos recibidos por $_SERVER[REQUEST_METHOD]</h3>";

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

			} else {
				echo "<form name=\"datos\" action=\"form2en1.php\" method=\"post\">
						<label for=\"texto\">Caja de texto</label>
						<input type=\"text\" name=\"texto\" id=\"texto\" />
						<label for=\"contrasenya\">Caja de contraseña</label>
						<input type=\"password\" name=\"contrasenya\" id=\"contrasenya\" />
						<label for=\"oculto\">Caja oculta</label>
						<input type=\"hidden\" name=\"oculto\" id=\"oculto\" />
						<label for=\"deshabilitada\">Caja de texto deshabilitada</label>
						<input type=\"text\" disabled name=\"deshabilitada\" id=\"deshabilitada\" value=\"no funciono\" />
						<label for=\"area\">Area de texto</label>
						<textarea name=\"area\" id=\"area\"></textarea>
						<label for=\"lista\">Lista desplegable</label>
						<select name=\"lista\" id=\"lista\">
							<option value=\"lista1\">Opción 1</option>
							<option value=\"lista2\">Opción 2</option>
							<option value=\"lista3\">Opción 3</option>
							<option value=\"lista4\">Opción 4</option>
							<option value=\"lista5\">Opción 5</option>
							<option value=\"lista6\">Opción 6</option>
						</select>
						<label for=\"multiple\">Lista de selección multiple</label>
						<select name=\"multiple[]\" id=\"multiple\" multiple>
							<option value=\"multiple1\">Opción 1</option>
							<option value=\"multiple2\">Opción 2</option>
							<option value=\"multiple3\">Opción 3</option>
							<option value=\"multiple4\">Opción 4</option>
							<option value=\"multiple5\">Opción 5</option>
							<option value=\"multiple6\">Opción 6</option>
						</select>
						<label for=\"opciones\">Botones de opción</label>
						<label for=\"opcion1\">Botón 1</label>
						<input type=\"radio\" name=\"opciones\" id=\"opcion1\" value=\"opcion1\" />
						<label for=\"opcion2\">Botón 2</label>
						<input type=\"radio\" name=\"opciones\" id=\"opcion2\" value=\"opcion2\" />
						<label for=\"opcion3\">Botón 3</label>
						<input type=\"radio\" name=\"opciones\" id=\"opcion3\" value=\"opcion3\" />
						<label for=\"fecha\">Selector de fechas</label>
						<input type=\"date\" name=\"fecha\" id=\"fecha\" />
						<label for=\"numero\">Selector de numeros</label>
						<input type=\"number\" name=\"numero\" id=\"numero\" />
						<label for=\"color\">Selector de color</label>
						<input type=\"color\" name=\"color\" id=\"color\" />
						<label for=\"validacion\">Caja de validación</label>
						<input type=\"checkbox\" name=\"validacion\" id=\"validacion\" />
						<button type=\"submit\">Enviar</button>
					</form>";
			}
		?>
	</body>
</html>