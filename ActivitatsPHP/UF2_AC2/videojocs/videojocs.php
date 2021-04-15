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
					<li class="nav-item">
						<a class="nav-link" href="form_login.html">Inici de sessió</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container m-5 mx-auto text-white">
			<div class="row">
				<div class="col-4 offset-4">
					<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
						<div class="form-group">
							<select class="form-control form-control-sm mr-2" name="plataforma" id="plataforma">
								<option>Selecciona una plataforma ...</option>
								<option>Nintendo DS</option>
								<option>Nintendo Wii</option>
								<option>PC</option>
								<option>PlayStation 3</option>
								<option>PSP</option>
								<option>Xbox 360</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default btn-sm">Filtrar</button>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="plataforma" id="plataforma" />Guardar com a plataforma favorita
							</label>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-8 offset-2">
					<h3 class="text-success my-2">Llistat de videojocs</h3>
					<table class="table">
						<tr> 
							<td class="align-middle">Crysis 3</td>
							<td class="align-middle">50.00 €</td>
							<td class="align-middle">PSP</td>
							<td class="align-middle">16</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
