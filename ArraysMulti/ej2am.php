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
  echo "</tr>";
}
echo "</table>";
//print_r($matriz);
//-------------------------------------

for($i = 0; $i < 3; $i++) {
      for ($j=0;$j<3;$j++){ 
            $sumaFila[$i] += $matriz[$i][$j];
            $sumaCol[$j]+= $matriz[$i][$j];  
        }     
}

 echo "<br>";
 echo "<br>";
  echo "Suma filas= ";
print_r($sumaFila);
 echo "<br>";
 echo "<br>";
  echo "Suma columnas= ";
   print_r($sumaCol);
   
//------------Tabla con html-------------------
echo "<table border='1'; style='border-collapse:collapse'>";
 
       echo "<tr>";
           echo "<td>".$sumaFila[0]."</td>";
        echo "</tr>";  
          echo "<tr>";
              echo "<td>".$sumaFila[1]."</td>";
            echo "</tr>";
            echo "<tr>";
             echo "<td>".$sumaFila[2]."</td>";
           echo "</tr>";
    
echo "</table>";
 
 echo "<br>";

   
   echo "<table border='1'; style='border-collapse:collapse'>";
 
       echo "<tr>";
           echo "<td>".$sumaCol[0]."</td>";
            echo "<td>".$sumaCol[1]."</td>";
             echo "<td>".$sumaCol[2]."</td>";
           echo "</tr>";
    
echo "</table>";
 
?>

</body>
</html>