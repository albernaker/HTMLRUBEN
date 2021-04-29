<?php
	require "header.php";
	session_start();

	$categoria = "";
	if (isset($_GET["categoria"])) {

		if ($_GET["categoria"] != "-") {
			$categoria = $_GET["categoria"];
		}

		//if (isset($_GET["favorita"])) {
		//	setcookie("plataforma", $plataforma, time() + (60 * 60 * 24 * 365));
		//}

	} elseif (isset($_COOKIE["categoria"])) {
		$categoria = $_COOKIE["categoria"];
	}
?>
		<div class="container m-5 mx-auto">
			<div class="row">
				<div class="col-2 offset-1">
					<div class="list-group">

						<a href="comprar.php?cat=1" class="list-group-item list-group-item-action">Arròs</a>
						<a href="comprar.php?cat=2" class="list-group-item list-group-item-action">Begudes</a>
						<a href="comprar.php?cat=3" class="list-group-item list-group-item-action">Drogueria</a>
						<a href="comprar.php?cat=4" class="list-group-item list-group-item-action">Conserves</a>
						<a href="comprar.php?cat=5" class="list-group-item list-group-item-action">Esmorzars</a>
						<a href="comprar.php?cat=6" class="list-group-item list-group-item-action">Mascotes</a>
						<a href="comprar.php?cat=7" class="list-group-item list-group-item-action">Lactis i ous</a>
						<a href="comprar.php?cat=8" class="list-group-item list-group-item-action">Llegums</a>
						<a href="comprar.php?cat=9" class="list-group-item list-group-item-action">Oli, vinagre i sal</a>
						<a href="comprar.php?cat=10" class="list-group-item list-group-item-action">Pasta</a>
						<a href="comprar.php?cat=11" class="list-group-item list-group-item-action">Salses i espècies</a>
						<a href="comprar.php?cat=12" class="list-group-item list-group-item-action">Snacks i aperitius</a>
						<a href="comprar.php?cat=13" class="list-group-item list-group-item-action">Sopa i puré</a>
					</div>
				</div>
				<div class="col-8">
					<h3 class="text-white">Els nostres productes</h3>
					<table class="table">        

<?php

require "config.php";


	if ($conn->connect_error) {
			die("ERROR al connectar con la base de datos");
			}

if (isset($_GET["cat"])) {

	$id = $_GET["cat"];
$sql = "SELECT * FROM productes where categoria = '$id'";

} else {
$sql = "SELECT * FROM productes ORDER BY nom";
}

$result = $conn->query($sql);

if($result) {

	if ($result->num_rows > 0) {

		echo "string";

	$row = $result->fetch_assoc();
		
while($row) {

					$imatge = $row["imatge"];
					$nom = $row["nom"];
					$preu = $row["preu"];
					$codi = $row["codi"];
					$unitats_stock = $row["unitats_stock"];




if ($row["categoria"] == 1) {
	$categoria = 'Arròs';
} else if ($row["categoria"] == 2) {
	$categoria = 'Begudes';
} else if ($row["categoria"] == 3) {
	$categoria = 'Drogueria';
}else if ($row["categoria"] == 4) {
	$categoria = 'Conserves';
}else if ($row["categoria"] == 5) {
	$categoria = 'Esmorzars';
}else if ($row["categoria"] == 13) {
	$categoria = 'Sopa i puré';
}else if ($row["categoria"] == 6) {
	$categoria = 'Mascotes';
}else if ($row["categoria"] == 7) {
	$categoria = 'Lactis i ous';
}else if ($row["categoria"] == 8) {
	$categoria = 'Llegums';
}else if ($row["categoria"] == 9) {
	$categoria = 'Oli,vinagre i sal';
}else if ($row["categoria"] == 10) {
	$categoria = 'Pasta';
}else if ($row["categoria"] == 11) {
	$categoria = 'Salses i espècies';
}else if ($row["categoria"] == 12) {
	$categoria = 'Snacks i aperitius';
}

					
					echo "<tr> 
							<td class=\"align-middle\">
								<img src=\"$imatge\" class=\"img-thumbnail mr-2\" style=\"height: 50px;\" />
								$nom
							</td>
							<td class=\"align-middle\">$categoria</td>
							<td class=\"align-middle text-right\">$preu €</td>
							<td class=\"align-middle\">
								<form class=\"form-inline\" action=\"carrito.php\" method=\"post\">
									<div class=\"form-group\">
										<input type=\"hidden\" name=\"codi\" value=\"$codi\" />
										<input type=\"number\" class=\"form-control form-control-sm mr-2\" name=\"quantitat\" min=\"1\" value=\"1\" style=\"width: 50px;\" />
										$unitats_stock
									</div>
									<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cart-plus\"></i></button>
								</form>
							</td> 
						</tr>";


					$row = $result->fetch_assoc();
}
	}

}





?>
						<tr> 
							<th>Producte</th> 
							<th>Categoria</th>
							<th class="text-right">Preu</th>
							<th></th>
						</tr>
						<tr> 
							
							</td> 
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
