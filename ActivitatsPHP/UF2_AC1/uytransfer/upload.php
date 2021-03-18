<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="CSS/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<body>


<?php 

include "header.php";

print_r($_POST);
print_r($_FILES);

if (empty($_POST) == false) {

  $nombre = $_POST["nombre"];
  echo "<p>Hola $nombre </p>";


if ( $_FILES["Adjuntar"]["error"] == 0) {

  $nombreArchivo = $_FILES["Adjuntar"]["name"];
  echo "<p>Hola el archivo es  $nombreArchivo </p>";

}


if(isset($_POST["email"])) {
  echo "Se tiene que enviar un mail!!";
}


} 

else {
  header("Location: upload.php");
}




?>

	</body>	
</html>