<!doctype html>
<?php
include "header.php"
?>

	<div class="formulari">
	<form role="form" name="Subir" action="upload.php" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="ejemplo_nombre_1">Nombre</label>
    <input type="text" class="form-control inputs" name="nombre" id="ejemplo_nombre_1"
           placeholder="Introduce tu nombre">
  </div>


    <div class="form-group borde">
    <label for="ejemplo_archivo_1" >Adjuntar un archivo</label> <br><br><br><br>
    <input type="file" name="Adjuntar" >
  </div>


  <div class="checkbox font">
    <label>
      <input type="checkbox" type="checkbox" name="pormail"> Quiero enviar el link de descarga por email
    </label>
  </div>
  <div class="form-group">
    <label for="ejemplo_password_1">Email del destinatario</label>
    <input type="email" name="email"  class="form-control inputs" id="email"
           placeholder="Email destinatario">
  </div>
<div>
	<label for="texto">Introduce un texto</label><br><br>
     <textarea class="form-control width" name="text" rows="3"></textarea>
</div>


   <button  type="submit" class="btn btn-primary btn-lg active ">Subir Archivo</button>

</form>
</div>



	</body>	


</html>


