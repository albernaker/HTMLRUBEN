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


print_r($_POST);


define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);



if (empty($_POST) == false) {

       $nombre = $_POST["nombre"];    

  $text = $_POST["text"];
  $pesarxiu = $_FILES["Adjuntar"]["size"] ;
  $email = $_POST["email"];
   $nombreArchivo = $_FILES["Adjuntar"]["name"];

  $url = $_FILES["Adjuntar"]["tmp_name"];
          $data = getdate();
          $year = strval($data["year"]);
          $month = strval($data["mon"]);
          $day = strval($data["mday"]);

              $extension = substr($nombreArchivo, strpos($nombreArchivo, "."));
              $numrandom = strval(rand(11111, 99999));
              $nomdelarxiu = ($year.$month.$day.$numrandom.$extension);
              $linkDescarga = $_SERVER["HTTP_ORIGIN"]."/PHP/HTMLRUBEN/ActivitatsPHP/UF2_AC1/uytransfer/$nomdelarxiu";

        if ($month < 10) {
          $month = "0$month";
      }


if(isset($_POST["email"])) {

    if (empty($_POST["email"])) {
        echo "<h2>Hola <strong>$nombre</strong>, </h2> <h1>S'ha de posar un email obligatoriament!!! </h1><br>
        ";
echo "<td rowspan='3' class='h-75'> <img src='images/descarga.jfif'> </td>";
    }



    else {


if ( $_FILES["Adjuntar"]["error"] == 0) {


  if(empty($_POST["nombre"]) == false) {

   $nombre = $_POST["nombre"];

  }

else {
   $nombre = "tuu";
}

  if (empty($_POST["text"]) == false) {
 $text = $_POST["text"];
}

  else {

    $text = "Sorpresa!! Alguien ha compartido contigo un archivo.";
  }
   
    if(($extension == ".png" || $extension == ".jpg" || $extension == ".pdf" || $extension == ".rar" || $extension == ".zip" || $extension == ".jpeg" || $extension == ".mp4" ) && ($pesarxiu <= 10000000)) {

  mail($email, $nombre, $text);

  echo " <table class='taula' >
    <tr>
      <td rowspan='3' class='h-75'> <img src='images/masv_03.jpg'> </td>
      <td><h2>Hola <strong>$nombre</strong>, </h2> <br>
      <h4>El archivo es <i> $nombreArchivo </i> l'arxiu pesa:  $pesarxiu bytes </strong> <br> i se ha enviado correctamente  a <strong>$email</strong> <br></h4> 
      <h5><div><i> $text </i></div></h5>
      </td>


    </tr>
    <tr>
     <th><p>Puedes descargar el archivo a través de este link: <a href=\'$linkDescarga\'>$linkDescarga</a></p></th>
  </tr>
</table> ";
      
}



  else{

      echo "<h1>CHAVAAAAAL $nombre HAS POSAT UNA EXTENSIÓ NO VALIDA O T'HAS PASSAT DE MIDA D'ARXIU </h1> <br>
      ";
      
      echo "<td rowspan='3' class='h-75'> <img src='images/descarga.jfif'> </td>";

}
  }
    } 
      }
        }



?>

	</body>	
</html>