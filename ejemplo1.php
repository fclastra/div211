<?php

extract ($_POST);

if ( isset($_POST['boton'])) {
	if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
		copy($_FILES['archivo']['tmp_name'], $_FILES['archivo']['name']);
		$subio = true;
	}
	
	if($subio) {
		echo "El archivo subio con exito";
	} else {
		echo "El archivo no cumple con las reglas establecidas";	
	}
	die();
}
?>
<html>
<head>
<title>Upload en PHP - Ejemplo 1</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form action="<?=$PHP_SELF?>" method="post" enctype="multipart/form-data" name="form1">
  <p align="center">Archivo
  	<input name="archivo" type="file" id="archivo">
  </p>
  <p align="center"><input name="boton" type="submit" id="boton" value="Enviar"></p>
</form>
</body>
</html>