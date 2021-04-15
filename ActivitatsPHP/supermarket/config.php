		<?php

		$nomservidor = "localhost";
		$nomusuari = "root";
		$password = "";
		$dbname = "supermercat";

		$conn = new mysqli($nomservidor, $nomusuari, $password, $dbname);

		if ($conn->connect_error) {
			die("ERROR al connectar con la base de datos");
		}

		?>