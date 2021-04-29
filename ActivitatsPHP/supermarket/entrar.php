<?php
	require "header.php";


	?>
		<div class="container m-5 mx-auto col-4 offset-4 text-white">
			<form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="form-group">
					<label for="username">Nom d'usuari:</label>
					<input type="text" class="form-control" name="username" id="username" />
				</div>
				<div class="form-group">
					<label for="pass">Contrasenya:</label>
					<input type="password" class="form-control" name="pass" id="pass" />
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Entrar</button>
				</div>
			</form>

		</div>

<?php


if (empty($_POST)) {
	
$_POST["username"] = " ";
$_POST["pass"]= "";

}


if (isset($_POST)) {

		$usuario = $_POST["username"];
		$contrasenya = $_POST["pass"];

		$sql = "SELECT id_client  FROM clients
				WHERE nom_usuari = '$usuario' AND contrasenya = '$contrasenya'";
		
		$result = $conn->query($sql);

if (!$result) {
die("La base de dades no dona resultats");
}



		$row = $result->fetch_assoc();
		if ($row) {	
			
			$_SESSION["user"] = $row["id_client"];

			header("Location: index.php");

				
			}
			else{
				echo "Les dades no son correctes";
				
			}


		$conn->close();

/*	if ($incioSesion) {
		header("Location: index.php");
	} else {
		header("Location: entrar.php");
	}
*/

}
?>


	</body>
</html>
