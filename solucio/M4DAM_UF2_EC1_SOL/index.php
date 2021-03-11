<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>


		<?php
			/* EXERCICIS 1, 2, 3 i 4 */
			$nombre = "Julio César";

			echo "<h3 style=\"word-spacing: 20px; color: green;\">Jo $nombre, estic utilitzant el <em>llenguatge de programació</em> <strong><em>PHP</em></strong></h3>";

			$url1 = "https://www.marca.com/";
			$nom1 = "Marca";
			$url2 = "https://www.sport.es/es/";
			$nom2 = "Sport";
			$url3 = "https://as.com/";
			$nom3 = "As";

			
			/* EXERCICI 5 */
			echo "<p><a href=\"$url1\">$nom1</a></p>";
			echo '<p><a href="'.$url2.'">'.$nom2.'</a></p>';
			echo "<p><a href='$url3'>$nom3</a></p>";
			
			
					/* EXERCICI 6 */
			echo "<ul>";
			$var = "Texto";
			echo "<li>".gettype($var)."</li>";
			$var = 33;
			echo "<li>".gettype($var)."</li>";
			$var = 33.99;
			echo "<li>".gettype($var)."</li>";
			$var = true;
			echo "<li>".gettype($var)."</li>";
			echo "</ul>";

			
			/* EXERCICI 7 */
			$num1 = "45.67";
			$num2 = "45.67";
			
			settype($num1, "integer");
			$num2 = (double)$num2;
			
			echo "<p>La variable \$num1 vale $num1 y el del tipo ".gettype($num1)."</p>";
			echo "<p>La variable \$num2 vale $num2 y el del tipo ".gettype($num2)."</p>";
			

			/* EXERCICI 8 */			
			define("COLOR_1", "#9e9e9e");
			const COLOR_2 = "pink";
			
			echo "<p>La constante  COLOR_1 vale ".COLOR_1." y la constante COLOR_2 vale ".COLOR_2;

			
			/* EXERCICI 9 */
			echo "<div style=\"float: left; margin-right: 5px; width: 100px; height: 100px; background-color: ".COLOR_1.";\"></div>";
			echo "<div style=\"float: left; width: 100px; height: 100px; background-color: ".COLOR_2.";\"></div>";

			
			/* EXERCICI 10 */
			$tamanyo = rand(10, 100)."px";
			echo "<p style=\"clear: both; font-size: $tamanyo;\">Tamaño variable</p>";

			
			/* EXERCICI 11 */
			$numDado = rand(1, 6);
			echo "<img src=\"images/$numDado.svg\" />";

			
			/* EXERCICI 12 */
			$numDado1 = rand(1, 6);
			echo "<br><img src=\"images/$numDado1.svg\" />";
			$numDado2 = rand(1, 6);
			echo "<img src=\"images/$numDado2.svg\" style=\"float: left;\" />";

			$sumaDados = $numDado1 + $numDado2;
			echo "<h3 style=\"clear: both;\">La suma de los dados es $sumaDados</h3>";
		
			
			/* EXERCICI 13 */
			$num = rand(1, 20);

			echo "<div style=\"display: table;\">";
			
			for($i = 0; $i <= 10; $i++) {

				if (($i % 2) == 0) {
					$color = COLOR_1;
				} else {
					$color = COLOR_2;
				}

				echo "<div style=\"display: table-row; background-color: $color;\">
						<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">$num</div>
						<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">x</div>
						<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">$i</div>
						<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">=</div>
						<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">".($num * $i)."</div>
					</div>";

			}

			echo "</div>";


			/* EXERCICI 15 */
			include "librerias/funciones.php";
			//exercici_14();


 	$noms = array("risto" => "12", "pau" => "15", "rever" => "19", "marc" => "23", "joan" => "32");
 	array_unshift($noms, "13", "23");
 	array_push($noms , "1", "999");

 	$treurenom = array_shift($noms);
 	$treurenom2 = array_pop($noms);

 	foreach ($noms as $key => $value) {
 		echo "<p><strong>$key</strong>:$value</p>";
 	}


for($i = 0; $i <count($noms); $i++){
	$suma = $suma + $noms[$i];
		if($max < $noms[i]) {
			$max = $noms[i];
		}

		if($min > $noms[i]) {
			$mainx = $noms[i];
		}
}
	$media = $suma / count($noms);
	echo "<p><strong>$media</strong></p>";
	echo "<p><strong>$max</strong></p>";
	echo "<p><strong>$min</strong></p>";



			/* EXERCICI 16 */
			//include "librerias/no-existo.php";
			//require "librerias/no-existo.php";

			
			/* EXERCICI 17 */
			exercici_17("Pepe");
			
			
			/* EXERCICI 18 */
			exercici_18("Toni");
			exercici_18();






		
		?>

	</body>
</html>