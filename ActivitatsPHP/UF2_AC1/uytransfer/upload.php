<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<body>


<?php 

include "header.php";


if (empty($_POST) == false) {

  $nombre = $_POST["nombre"];
 

  $text = $_POST["text"];
  $pesarxiu = $_FILES["Adjuntar"]["size"];
  $email = $_POST["email"];
  $url = $_FILES["Adjuntar"]["tmp_name"];


if(isset($_POST["email"])) {

    if (empty($_POST["email"])) {
        echo "<h1>S'ha de posar un email !!! </h1>";

    }

      elseif (empty($_POST["nombre"])) {
          echo "<h1>S'ha de posar el nom usuariii!!!! </h1>";

      }

    else {


if ( $_FILES["Adjuntar"]["error"] == 0) {

  $nombreArchivo = $_FILES["Adjuntar"]["name"];
  echo " <table class='taula' >
    <tr>
      <td rowspan='3' class='h-75'> <img src='images/masv_03.jpg'> </td>
      <td><h2>Hola <strong>$nombre</strong>, </h2> <br>
      <h4>El archivo es <i> $nombreArchivo </i> l'arxiu pesa: $pesarxiu bytes </strong> <br> i se ha enviado correctamente  a <strong>$email</strong> <br></h4> 
      <h5><div><i> $text </i></div></h5>
      </td>

    </tr>
    <tr>
     <th>El enllaç de l'arxiu per compartir és <a href='$url'>$url </a></th>
  </tr>
</table> ";


}



} 
       
    }
}



?>

	</body>	
</html>