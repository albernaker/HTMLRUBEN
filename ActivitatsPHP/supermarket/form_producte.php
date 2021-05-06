<?php
	require "header.php";

	$codi = "";
	$nom = "";
	$categoria = "";
	$preu = "";
	$stock ="";
	$imatge = "";



if (isset($_GET["codi"])) {

$id = $_GET["codi"];

$consulta = "SELECT * FROM productes WHERE codi = $id";

$resultat = $conn->query($consulta);



if (!$resultat) {
die("No funciona la base de dades");
}

$row = $resultat->fetch_assoc();


if (empty($_POST)) {

$codi = $row["codi"];
$nom = $row["nom"];
$categoria = $row["categoria"];
$preu = $row["preu"];
$stock= $row["unitats_stock"];
}
}

	
?>
		<div class="container m-5 mx-auto text-white">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="codi">Codi:</label>
							<input type="text" value="<?php echo "$codi"; ?>" class="form-control" name="codi" id="codi" />
						</div>
						<div class="form-group">
							<label for="nom">Nom:</label>
							<input type="text" value="<?php echo "$nom"; ?>" class="form-control" name="nom" id="nom" />
						</div>
						<div class="form-group">
							<label for="categoria">Categoria:</label>
							<select class="form-control" name="categoria" id="categoria">
								<option value="">Selecciona una opció</option>

<?php 


require "config.php";

		$sql = "SELECT id_categoria, nom FROM categories ORDER BY nom";

		$result = $conn->query($sql);


	if($result) {

$row = $result->fetch_assoc();
		
while($row) {

					$opcio = $row["id_categoria"];
					$categoria = $row["nom"];
					
					
					echo "<option value=$opcio>$categoria</option>";


					$row = $result->fetch_assoc();
}
	}
	 ?>

							
							</select>
						</div>
						<div class="form-group">
							<label for="preu">Preu:</label>
							<input type="number" value="<?php echo "$preu"; ?>" class="form-control" name="preu" id="preu" />
						</div>
						<div class="form-group">
							<label for="stock">Unitats en stock:</label>
							<input type="number" value="<?php echo "$stock"; ?>" class="form-control" name="stock" id="stock" />
						</div>
						<div class="form-group text-right">
							<a href="productes.php" class="btn btn-outline-secondary mx-2">Tornar</a>
							<button type="submit" class="btn btn-default">Guardar</button>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="imatge">Imatge:</label>
							<input type="file" class="form-control" value="<?php echo "$imatge"; ?>" name="imatge" id="imatge" />
						</div>
						<div class="text-center">
							<img src="images/productes/no-image.png" class="img-thumbnail" style="height: 250px;" />
						</div>
					</div>
				</div>
			</form>


			<?php 

				if(empty($_POST)) {

		$_POST["codi"]="";
		$_POST["nom"] = "";
		$_POST["categoria"] = "";
		$_POST["preu"] ="";
		$_POST["stock"] = "";
		$_POST["imatge"] ="";

	}

else {


			$codi = $_POST["codi"];
			$nom = $_POST["nom"];
			$categoria = $_POST["categoria"];
			$preu = $_POST["preu"];
			$stock = $_POST["stock"];
			$nomArxiu = $_FILES["imatge"]["tmp_name"];

if(!empty($imatge)){
 $nomext = pathinfo($_FILES["imatge"]["name"]);
$extensio = ($nomext['extension']);
move_uploaded_file($imatge, "images\productes\$codi.$extensio");
 }



		$sql2 = "INSERT INTO productes (codi, categoria, nom, preu, unitats_stock, imatge) 
				VALUES ('$codi','$categoria', '$nom', '$preu', '$stock' ,'$nomArxiu')";


		$result = $conn->query($sql2);


		if ($result) {
		echo "<div class=\".text-success alert alert-success\">S'ha registrat correctament</div>";
		}

		else {
		echo "<div class=\"text-danger alert alert-danger\">Hi han dades que ja estan introduides, possiblement ja esta registrada</div>";
				}
		}
			 ?>

		</div>
	</body>
</html>
