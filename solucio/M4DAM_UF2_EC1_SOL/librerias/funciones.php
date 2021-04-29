<?php
			
	/* EXERCICI 14 */
	function exercici_14() {
		echo "<h3 style=\"word-spacing: 20px; color: green;\">Estic utilitzant el <em>llenguatge de programació</em> <strong><em>PHP</em></strong></h3>";
	}
			
	/* EXERCICI 17 */
	function exercici_17($nombre) {
		echo "<h3 style=\"word-spacing: 20px; color: green;\">Jo, $nombre estic utilitzant el <em>llenguatge de programació</em> <strong><em>PHP</em></strong></h3>";
	}
			
	/* EXERCICI 18 */
	function exercici_18($nombre = "Alumne") {
		echo "<h3 style=\"word-spacing: 20px; color: green;\">Jo, $nombre estic utilitzant el <em>llenguatge de programació</em> <strong><em>PHP</em></strong></h3>";
	}

	/* EXERCICI 19 */			
	function hipotenusa($catetA, $catetB) {
		$cuadratA = $catetA * $catetA;
		$cuadratB = $catetB ** 2;
		$suma = $cuadradA + $cuadradB;
		
		$resultat = sqrt($suma);

		return $resultat;
	}

	
	/* EXERCICI 20 */
	function nomina($souBrut) {
		$percentatgeIRPF = 0;

		if ($souBrut > 2500) {
			$percentatgeIRPF = 0.19;
		} elseif ($souBrut > 1800) {
			$percentatgeIRPF = 0.17;
		} elseif ($souBrut > 1400) {
			$percentatgeIRPF = 0.15;
		} else {
			$percentatgeIRPF = 0.13;
		}

		$ss = $souBrut * (5.5 / 100);
		$irpf = $souBrut * $percentatgeIRPF;
		$souNet = $souBrut - $ss - $irpf;
		
		$texto = "<table border=\"1\">
					<tr>
						<td>Sou brut</td>
						<td>$souBrut €</td>
					</tr>
					<tr>
						<td>Seg. social (5,5%)</td>
						<td>$ss €</td>
					</tr>
					<tr>
						<td>IRPF (15%)</td>
						<td>$irpf €</td>
					</tr>
					<tr>
						<td>Sou net</td>
						<td>$souNet €</td>
					</tr>
				</table>";

		return $texto;
	}

	
	/* EXERCICI 21 */
	function taulaMultiplicar($num) {
		echo "<div style=\"display: table;\">";
		for ($i = 0; $i <= 10; $i++) {
			echo "<div style=\"display: table-row;\">
					<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">$num</div>
					<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">x</div>
					<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">$i</div>
					<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">=</div>
					<div style=\"display: table-cell; width: 30px; border: 1px solid lightblue; padding: 3px; color: lightblue; text-align: center;\">".($num * $i)."</div>
				</div>";
		}
		echo "</div>";
	}

	
	/* EXERCICI 25 */
	function estudiEstadistic($arrayNums) {
		$suma = 0;
		$numElements = count($arrayNums);
		$numMax = "-";
		$numMin = "-";

		foreach ($arrayNums as $num) {
			$suma = $suma + $num;

			if ($numMax < $num || $numMax == "-") {
				$numMax = $num;
			}

			if ($numMin > $num || $numMin == "-") {
				$numMin = $num;
			}
		}

		$promedio = $suma / $numElements;
		echo "<p>La mitjana és $promedio</p>";
		echo "<p>El valor màxim és $numMax</p>";
		echo "<p>El valor mínim és $numMin</p>";
	}

	
	/* EXERCICI 27 */
	function mostrarProductes($arrayProductes) {
		echo "<table border=\"1\">";
		foreach ($arrayProductes as $nom => $preu) {
			echo "<tr>";
				echo "<td>$nom</td>
					<td>$preu €</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	
	/* EXERCICI 28 */
	function mostrarProductes2($arrayProductes, $ordre = "N") {

		if ($ordre == "V") {
			asort($arrayProductes);
		} elseif ($ordre == "P") {
			ksort($arrayProductes);
		}

		echo "<table border=\"1\">";
		foreach ($arrayProductes as $nom => $preu) {
			echo "<tr>";
				echo "<td>$nom</td>
					<td>$preu €</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

?>