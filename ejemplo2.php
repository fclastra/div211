<?php
extract ($_POST);


if ( isset($_POST['boton'])) {
	if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {

		$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        $ext = explode(".", $_FILES["foto"]["name"]);
		$extension = end($ext);
		
		if($_FILES['archivo']['size'] < 885000) {
			
			if ((($_FILES["foto"]["type"] == "image/gif")
                || ($_FILES["foto"]["type"] == "image/jpeg")
                || ($_FILES["foto"]["type"] == "image/png")
                || ($_FILES["foto"]["type"] == "image/pjpeg"))
                && in_array($extension, $allowedExts)) {
					
				$directorio = './uploads/'; // directorio de tu elecci&oacute;n
                $extension = end(explode('.', $_FILES['foto']['name']));
                $foto = substr(md5(uniqid(rand())),0,10).".".$extension;

				copy($_FILES['archivo']['tmp_name'], $directorio.$foto);
				$subio = true;
			}
		}
	}
	
	if($subio) {
		echo "El archivo subio con exito";
	} else {
		echo "El archivo no cumple con las reglas establecidas";	
	}
	
	echo "<p><a href=ejemplo2.php>Volver</a></p>";
	die();
}

?>
<html>
<head>
<title>Upload en PHP - Ejemplo 2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form action="<?=$PHP_SELF?>" method="post" enctype="multipart/form-data" name="form1">
  <p align="center">Archivo
  	<input name="archivo" type="file" id="archivo">(Solo formato GIF Y JPG menores a 800K)
  </p>
  <p align="center"><input name="boton" type="submit" id="boton" value="Enviar"></p>
</form>
</body>
</html>