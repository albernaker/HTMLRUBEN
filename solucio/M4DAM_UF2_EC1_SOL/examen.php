<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>EXAMEN</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<?php
			$datos = $_POST;
			
			if (!empty($datos)) {

				$numAciertos = 0;

				if ($datos["pregunta1"] == "F") {
					$numAciertos++;
					echo "<p style=\"color: green;\">Has acertado la pregunta 1 :)</p>";
				} else {					
					echo "<p style=\"color: red;\">No has acertado la pregunta 1 :(</p>";
				}

				if ($datos["pregunta2"] == "C") {
					$numAciertos++;
					echo "<p style=\"color: green;\">Has acertado la pregunta 2 :)</p>";
				} else {					
					echo "<p style=\"color: red;\">No has acertado la pregunta 2 :(</p>";
				}

				if ($datos["pregunta3"] == "F") {
					$numAciertos++;
					echo "<p style=\"color: green;\">Has acertado la pregunta 3 :)</p>";
				} else {					
					echo "<p style=\"color: red;\">No has acertado la pregunta 3 :(</p>";
				}

				if ($datos["pregunta4"] == "C") {
					$numAciertos++;
					echo "<p style=\"color: green;\">Has acertado la pregunta 4 :)</p>";
				} else {					
					echo "<p style=\"color: red;\">No has acertado la pregunta 4 :(</p>";
				}

				if ($datos["pregunta5"] == "F") {
					$numAciertos++;
					echo "<p style=\"color: green;\">Has acertado la pregunta 5 :)</p>";
				} else {					
					echo "<p style=\"color: red;\">No has acertado la pregunta 5 :(</p>";
				}

				$nota = ($numAciertos / 5) * 10;
				$nota = round($nota, 2);

				echo "<p>La nota obtenida es <strong>$nota</strong>";

			} else {

			?>
				<h1>Examen de PHP</h1>
				<form name="examen" action="examen.php" method="post">
					
					<div>
						<h3>Pregunta 1</h3>
						<label><strong> </strong>PHP es un lenguaje de programación en entorno cliente</label> 
						<label for="verdadero">Verdadero</label>
						<input type="radio" name="pregunta1" id="verdadero" value="V" />
						<label for="falso">Falso</label>
						<input type="radio" name="pregunta1" id="falso" value="F" />
					</div>
					
					<div>
						<h3>Pregunta 2</h3>
						<label for="pregunta2">Con 	que función puedo mostrar el contenido de un array?</label>
						<select name="pregunta2" id="pregunta2">
							<option value="">Selecciona una opción</option>
							<option value="A">echo</option>
							<option value="B">print</option>
							<option value="C">print_r</option>
							<option value="D">Ninguna de las anteriores</option>
						</select>
					</div>
					
					<div>
						<h3>Pregunta 3</h3>
						<label><strong> </strong>PHP es un lenguaje de programación en entorno cliente</label> 
						<label for="verdadero">Verdadero</label>
						<input type="radio" name="pregunta3" id="verdadero" value="V" />
						<label for="falso">Falso</label>
						<input type="radio" name="pregunta3" id="falso" value="F" />
					</div>
					
					<div>
						<h3>Pregunta 4</h3>
						<label for="pregunta4">Con 	que función puedo mostrar el contenido de un array?</label>
						<select name="pregunta4" id="pregunta4">
							<option value="">Selecciona una opción</option>
							<option value="A">echo</option>
							<option value="B">print</option>
							<option value="C">print_r</option>
							<option value="D">Ninguna de las anteriores</option>
						</select>
					</div>
					
					<div>
						<h3>Pregunta 5</h3>
						<label><strong> </strong>PHP es un lenguaje de programación en entorno cliente</label> 
						<label for="verdadero">Verdadero</label>
						<input type="radio" name="pregunta5" id="verdadero" value="V" />
						<label for="falso">Falso</label>
						<input type="radio" name="pregunta5" id="falso" value="F" />
					</div>

					<button type="submit">Enviar</button>
				</form>
		<?php
			}
		?>
	</body>
</html>

