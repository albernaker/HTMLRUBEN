<?php
	require "header.php";

if(!empty($_POST)){
	$mail = $_POST["mail"];
	$username = $_POST["username"];
	$pass = $_POST["pass"];
	$rp_pass = $_POST["rp_pass"];
	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$nif = $_POST["nif"];
	$direccion = $_POST["direccion"];
	$codigo_postal = $_POST["codigo_postal"];
	$mail = $_POST["mail"];
	$telefono = $_POST["telefono"];
	$poblacion = $_POST["poblacion"];	
	}

	else {

$username="";
$pass = "";
$rp_pass = "";
$nombre ="";
$apellidos = "";
$nif = "";
$direccion = "";
$codigo_postal = "";
$mail = "";
$poblacion = "";
$telefono = "";	
	}


require "common/validacions.php";

if (isset($_SESSION["user"])) {

	
	$sql = "SELECT * FROM clients WHERE id_client = $_SESSION[user]";
$result = $conn->query($sql);

if($result) {

	if ($result->num_rows > 0) {


	$row = $result->fetch_assoc();


$mail = $row["email"];
$username = $row["nom_usuari"];
$pass = $row["contrasenya"];
$rp_pass = $row["contrasenya"];
$nombre = $row["nom"];
$apellidos = $row["cognoms"];
$nif = $row["nif"];
$direccion = $row["adreca"];
$codigo_postal = $row["codi_postal"];
$telefono = $row["telefon"];
$poblacion = $row["poblacio"];	



}
}
}

if (!empty($_POST)) {

if (empty($_POST["username"]) || empty($_POST["pass"]) || empty($_POST["rp_pass"]) || empty($_POST["nombre"]) || empty($_POST["apellidos"]) || empty($_POST["nif"]) || empty($_POST["direccion"]) || empty($_POST["poblacion"])) {

	echo "<div class=\"text-danger alert alert-danger\">Introdueix les dades obligatories!</div>";

}
	else {

$correcteNU = false;
$correcteRPpass = false;
$correctePass = false;
$correcteNif = false;
$correcteEmail = false;

 

				if  (nomUsuariValid($_POST["username"])) {
						$correcteNU = true;
					}

				else {
	echo "<div class=\"text-danger alert alert-danger\">El nom d'usuari es incorrecte!</div>";

				}

						if($_POST["pass"]==$_POST["rp_pass"]) {
							$correcteRPpass = true;
						}
							else {
	echo "<div class=\"text-danger alert alert-danger\">Les contrasenyes no son iguals</div>";
							}

							if(seguretatContrasenya($_POST["pass"]) == 3){
								$correctePass = true;
							}
									else {
	echo "<div class=\"text-danger alert alert-danger\">Les contrasenyes no son segures</div>";
									}

			if(NIFValid($_POST["nif"]) == true) {
										$correcteNif = true;

									}
											else {
	echo "<div class=\"text-danger alert alert-danger\">El nif no es valid</div>";
											} 

										if(esEmail($_POST["mail"]) == true) {
										$correcteEmail = true;

									}
											else {
	echo "<div class=\"text-danger alert alert-danger\">El email no es valid</div>";
											}

											if (($correcteNU == true) && ($correcteEmail == true) && ($correcteRPpass == true) && ($correctePass == true) && ($correcteNif = true)) {
											

										$mail = $_POST["mail"];
										$username = $_POST["username"];
										$pass = $_POST["pass"];
										$rp_pass = $_POST["rp_pass"];
										$nombre = $_POST["nombre"];
										$apellidos = $_POST["apellidos"];
										$nif = $_POST["nif"];
										$direccion = $_POST["direccion"];
										$codigo_postal = $_POST["codigo_postal"];
										$mail = $_POST["mail"];
										$telefono = $_POST["telefono"];
										$poblacion = $_POST["poblacion"];	


										$sql =  " INSERT INTO clients(nom_usuari, contrasenya, nom, cognoms, nif, adreca, codi_postal, poblacio, telefon, email)
										

										VALUES('$username', '$pass', '$nombre', '$apellidos', '$nif', '$direccion', '$codigo_postal', '$poblacion', '$telefono', '$mail')";



										$result = $conn->query($sql);


														if ($result) {
															header("Location: entrar.php");
														}

														else {
echo "<div class=\"text-danger alert alert-danger\">Hi han dades que ja estan introduides, possiblement ja estas registrat</div>";
														}

									}


 	}
}


?>




		<div class="container m-5 mx-auto text-white">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="username">Nom d'usuari (obligatori):</label>
							<input type="text" value="<?php echo "$username"; ?>" class="form-control" name="username" id="username" />
						</div>
						<div class="form-group">
							<label for="pass">Contrasenya (obligatori):</label>
							<input type="password" value="<?php echo "$pass"; ?>" class="form-control" name="pass" id="pass" />
						</div>
						<div class="form-group">
							<label for="rp_pass">Repeteix la contrasenya (obligatori):</label>
							<input type="password" value="<?php echo "$rp_pass"; ?>" class="form-control" name="rp_pass" id="rp_pass" />
						</div>
						<div class="form-group">
							<label for="nombre">Nom (obligatori):</label>
							<input type="text" value="<?php echo "$nombre"; ?>"  class="form-control" name="nombre" id="nombre" />
						</div>
						<div class="form-group">
							<label for="apellidos">Cognoms (obligatori):</label>
							<input type="text" value="<?php echo "$apellidos"; ?>" class="form-control" name="apellidos" id="apellidos" />
						</div>
						<div class="form-group">
							<label for="nif">NIF (obligatori):</label>
							<input type="text" value="<?php echo "$nif"; ?>" class="form-control" name="nif" id="nif" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="direccion">Adreça (obligatori):</label>
							<input type="text" value="<?php echo "$direccion"; ?>" class="form-control" name="direccion" id="direccion" />
						</div>
						<div class="form-group">
							<label for="codigo_postal">Codi postal (obligatori):</label>
							<input type="text" value="<?php echo "$codigo_postal"; ?>" class="form-control" name="codigo_postal" id="codigo_postal" />
						</div>
						<div class="form-group">
							<label for="poblacion">Població (obligatori):</label>
							<select class="form-control" name="poblacion" id="poblacion">
								<option value="">Selecciona una opció</option>
								


<?php

require "config.php";


$conn = new mysqli($nomservidor, $nomusuari, $password, $dbname);

		$sql = "SELECT id_poblacio, nom FROM poblacions ORDER BY nom";

		$result = $conn->query($sql);

	if ($conn->connect_error) {
			die("ERROR al connectar con la base de datos");
			}




	if($result) {

$row = $result->fetch_assoc();
		
while($row) {

					$opcio = $row["id_poblacio"];
					$poblacio = $row["nom"];
					
					echo "<option value=$opcio>$poblacio</option>";


					$row = $result->fetch_assoc();
}
	}
?>
							</select>
						</div>
						<div class="form-group">
							<label for="telefono">Telèfon:</label>
							<input type="text" value="<?php echo "$telefono"; ?>" class="form-control" name="telefono" id="telefono" />
						</div>
						<div class="form-group">
							<label for="codigo_postal">Email:</label>
							<input type="text" value="<?php echo "$mail"; ?>" class="form-control" name="mail" id="mail" />
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-default">Enviar</button>
						</div>

					</div>
				</div>
			</form>
		</div>


	
	</body>
</html>




