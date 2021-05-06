<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto">
			<div class="col-8 offset-2">
				<table class="table">        
					<tr> 
						<th>Producte</th> 
						<th>Categoria</th>
						<th>Preu</th>
						<th></th>
					</tr>

<?php 

if (isset($_GET["cat"])) {

	$id = $_GET["cat"];
$sql = "SELECT * FROM productes where categoria = '$id'";

} else {
$sql = "SELECT * FROM productes ORDER BY nom";
}

$result = $conn->query($sql);

if($result) {

	if ($result->num_rows > 0) {


	$row = $result->fetch_assoc();



		
while($row) {

					$imatge = $row["imatge"];
					$nom = $row["nom"];
					$preu = $row["preu"];
					$codi = $row["codi"];
					$unitats_stock = $row["unitats_stock"];
					$categoria = $row["categoria"];


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
						<td class=\"align-middle\">$preu €</td>
						<td class=\"align-middle\">
							<form class=\"form-inline\" action=\"$codi\" method=\"post\">
								<a href=\"form_producte.php?codi='$codi'\" class=\"btn btn-primary\"><i class=\"fas fa-pencil-alt\"></i></a>
								<div class=\"form-group\">
									<input type=\"hidden\" name=\"codi\" value=\"'$codi'\" />
								</div>
								<button type=\"submit\" name=\"borrar\" class=\"btn btn-primary\"><i class=\"fas fa-trash-alt\"></i></button>
							</form>
						</td> 
					</tr>
					<tr> ";


					$row = $result->fetch_assoc();
}
	}

}

					 ?>
							</form>
						</td> 
					</tr>
				</table>
			</div>
		</div>
			</body>
</html>
