<!DOCTYPE html>
<html>
<body>

<?php

//---------------------Visualizo la tabla anterior ------------------------------
$count=0;
echo "<table border='1'; style='border-collapse:collapse'>";
for ($fila = 0; $fila < 3; $fila++) {
   echo "<tr>";
  for ($col = 0; $col < 3; $col++) {
 //Hallar los muliplos de 2 = contar de 2 en 2 desde 0
    $count+=2; 
  echo "<td>". $count."</td>";
  //relleno la matriz con los multiplos de 2
   /* echo */ $matriz[$fila][$col]=$count."  ";
  }
  echo "<tr>";
}
echo "</table>";
print_r($matriz);

//array para almacenar 3 valores resultantes de suma por filas
//$sumaFila=[];
//array //array para almacenar 3 valores resultantes de suma por columnas
//$sumaCol=[];


    for ($i=0;$i<3;$i++){ //filas
           $sumaFila[] = array_sum($matriz[$i]); //suma filas
        for ($j=0;$j<3;$j++){ //columnas
            $sumaCol[$j]+=$matriz[$i][$j];  //suma columnas
        }
    }
   echo "<br>";
      echo "<br>";
      echo "Suma filas= ";
 print_r($sumaFila);
    echo "<br>";
    echo "Suma columnas= ";
    print_r($sumaCol);

?>

</body>
</html>