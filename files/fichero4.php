<?php
echo "<table border='1'; style='border-collapse:collapse'>";
//$arrayDatos=array($nombre,$apellido1, $apellido2,$fnacimiento, $localidad );

$file = fopen("alumnos2.txt", "r") or die("Unable to open file!");
$contarLineas = 0;

while (!feof($file)){   
    $datos = fgets($file); 
	var_dump($datos);
		
	list($nombre, $apellido1, $apellido2, $fnacimiento, $localidad) = explode("##", $datos);
	
    echo "<tr>";
	echo "<td>" . $nombre. "</td>";
	echo "<td>" . $apellido1. "</td>";
	echo "<td>" . $apellido2. "</td>";
	echo "<td>" . $fnacimiento. "</td>";
	echo "<td>" . $localidad. "</td>";
	echo "</tr>";
	$contarLineas++;
}
echo '</table>';
//$contarLineas=$contarLineas-1;
fclose($file);
 echo "El número de filas que se han leído son: ".$contarLineas;
    
?>
