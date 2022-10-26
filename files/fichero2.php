<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>DATOS ALUMNOS</title>

</head>

<body>

<h2>DATOS ALUMNOS</h2>

<?php
$myfile = fopen("alumnos2.txt", "a") or die("Unable to open file!");

// definir variables 
$nombre = $apellido1 = $apellido2 = $fnacimiento = $localidad = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = test_input($_POST["nombre"]);
	
    $apellido1 = test_input($_POST["apellido1"]);

    $apellido2 = test_input($_POST["apellido2"]);

    $fnacimiento = test_input($_POST["fnacimiento"]);
	
    $localidad = test_input($_POST["localidad"]);
	
	$txt=$nombre."##".$apellido1."##".$apellido2."##".$fnacimiento."##".$localidad; 
	fwrite($myfile, $txt."\n"); // "\n" es salto de linea en php
	
	//fwrite ($myfile, "\n"); //salto de linea en php
	
	fclose($myfile);
}


function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;
}

?>
<p>
 Se ha creado el fichero.
</p>
</body>

</html>