<?php
echo "<table border='1'; style='border-collapse:collapse'>";

$file = fopen("alumnos1.txt", "r") or die("Unable to open file!");
$filePath="alumnos1.txt";
$contarLineas = 0;
while (!feof($file)){   
    $datos = fgets($file); 
    echo "<tr><td>" . $datos. "</td></tr>";
	$contarLineas++;
}
echo '</table>';
fclose($file);
 echo "El número de filas que se han leído son: ".$contarLineas;
    
?>
