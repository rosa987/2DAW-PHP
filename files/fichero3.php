<?php
echo "<table border='1'; style='border-collapse:collapse'>";

$file = fopen("alumnos1.txt", "r") or die("Unable to open file!");
while (!feof($file)){   
    $datos = fgets($file); 
    echo "<tr><td>" . $datos. "</td></tr>";
}
echo '</table>';
fclose($file);
?>
