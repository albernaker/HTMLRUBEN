<?php
	session_start();

	$plataforma = "";
	if (isset($_GET["plataforma"])) {

		if ($_GET["plataforma"] != "-") {
			$plataforma = $_GET["plataforma"];
		}

		if (isset($_GET["favorita"])) {
			setcookie("plataforma", $plataforma, time() + (60 * 60 * 24 * 365));
		}

	} elseif (isset($_COOKIE["plataforma"])) {
		$plataforma = $_COOKIE["plataforma"];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Videojocs</title>
		<link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body class="bg-dark">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="index.html">Videojocs</a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item ">
						<a class="nav-link" href="form_usuari.php">Nou usuari</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="videojocs.php">Llistat de videojocs</a>
					</li>
					<?php
						if (!isset($_SESSION["user"])) {
							echo '<li class="nav-item">
								<a class="nav-link" href="form_login.html">Inici de sessió</a>
							</li>';
						} else {
							echo '<li class="nav-item">
								<a class="nav-link" href="logout.php">Tancar de sessió</a>
							</li>';
						}
					?>
				</ul>
			</div>
			<div class="text-right">
				<?php

					if (isset($_SESSION["user"])) {
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "videojocs";

						$conn = new mysqli($servername, $username, $password, $dbname);
						
						if ($conn->connect_error) {
							die("ERROR al conectar con la BBDD");
						}

						$sql = "SELECT * FROM usuaris
								WHERE id_usuari = $_SESSION[user]";
						
						$result = $conn->query($sql);

						$row = $result->fetch_assoc();

						echo "Hola $row[nom] $row[cognoms]";

						$conn->close();
					}

				?>
			</div>
		</nav>
		<div class="container m-5 mx-auto text-white">
			<div class="row">
				<div class="col-4 offset-4">
					<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
						<div class="form-group">
							<select class="form-control form-control-sm mr-2" name="plataforma" id="plataforma">
								<option value="-">Selecciona una plataforma ...</option>
								<option <?php if ($plataforma == "Nintendo DS") echo "selected"; ?>>Nintendo DS</option>
								<option <?php if ($plataforma == "Nintendo Wii") echo "selected"; ?>>Nintendo Wii</option>
								<option <?php if ($plataforma == "PC") echo "selected"; ?>>PC</option>
								<option <?php if ($plataforma == "PlayStation 3") echo "selected"; ?>>PlayStation 3</option>
								<option <?php if ($plataforma == "PSP") echo "selected"; ?>>PSP</option>
								<option <?php if ($plataforma == "Xbox 360") echo "selected"; ?>>Xbox 360</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default btn-sm">Filtrar</button>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="favorita" id="favorita" />Guardar com a plataforma favorita
							</label>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-8 offset-2">
					<h3 class="text-success my-2">Llistat de videojocs</h3>
					<?php
					 	$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "videojocs";

						$conn = new mysqli($servername, $username, $password, $dbname);
						
						if ($conn->connect_error) {
							die("ERROR al conectar con la BBDD");
						}

						if ($plataforma != "") {
							$sql = "SELECT * FROM videojocs
									WHERE plataforma = '$plataforma'";
						} else {
							$sql = "SELECT * FROM videojocs";
						}
						
						$result = $conn->query($sql);
						
						if ($result) {

							if ($result->num_rows > 0) {

								echo "<table class=\"table\">";

								$row = $result->fetch_assoc();
								while ($row) {
									echo "<tr> 
											<td class=\"align-middle\">$row[titol]</td>
											<td class=\"align-middle\">$row[preu] €</td>
											<td class=\"align-middle\">$row[plataforma]</td>
											<td class=\"align-middle\">$row[pegi]</td>
										</tr>";

									$row = $result->fetch_assoc();
								}

								echo " </table>";

							} else {
								echo "<p>No hi ha cap videojoc</p>";
							}
						}

						$conn->close();
					?>
				</div>
			</div>
		</div>
	</body>
</html>
