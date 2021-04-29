<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SINGUP</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<?php
			$verForm = true;

			$nombre = "";
			$apellidos = "";
			$mail = "";
			$pass = "";

			$textoNombre = "";
			$textoMail = "";
			$textoPass = "";

			if (!empty($_POST)) {

				$verForm = false;

				$nombre = $_POST["nombre"];
				$apellidos = $_POST["apellidos"];
				$mail = $_POST["mail"];
				$pass = $_POST["pass"];
				$recordar = isset($_POST["recordar"]);

				if (strlen($nombre) == 0) {
					$verForm = true;
					$textoNombre = "<span style=\"color: red; font-size: 0.5em;\"> (El nombre es obligatorio)</span>";
				}

				if (strpos($mail, "@") == false) {
					$verForm = true;
					$textoMail = "<span style=\"color: red;; font-size: 0.5em;\"> (Debe introducir un email correcto)</span>";
				}

				if (strlen($pass) < 8) {
					$verForm = true;
					$textoPass = "<span style=\"color: red;; font-size: 0.5em;\"> (La contraseña debe tener un mínimo de 8 caracteres)</span>";
				}

			}

			if ($verForm) {

				if (isset($_COOKIE["mail"])) {
					$mail = $_COOKIE["mail"];
				}

			?>
				<form name="datos" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<label for="nombre">Nombre<?php echo $textoNombre; ?></label>
					<input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" />
					<label for="apellidos">Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>" />
					<label for="mail">Mail<?php echo $textoMail; ?></label>
					<input type="mail" name="mail" id="mail" value="<?php echo $mail; ?>" />
					<label for="recordar">Recordar mail</label>
					<input type="checkbox" name="recordar" id="recordar" />
					<label for="pass">Contraseña<?php echo $textoPass; ?></label>
					<input type="password" name="pass" id="pass" />
					<button type="submit">Enviar</button>
				</form>
		<?php 
			} else {
				echo "<h3>Datos enviados correctamente</h3>";
				echo "<p>Has recibido un email para continuar el proceso de registro</p>";

				if ($recordar) {
					setcookie("mail", $mail, time() + (60 * 60 * 24 * 365));
				} 
			}
		?>
	</body>
</html>