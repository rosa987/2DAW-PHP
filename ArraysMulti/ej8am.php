<!DOCTYPE html>
<html>
<body>

<?php

$matriz1 = array(array(1, 1, 1),
                 array(2, 2, 2),
                array(3, 3, 3));
  
$matriz2 = array(array(1, 1, 1),
              array(2, 2, 2),
              array(3, 3, 3));
             
//----------------------SUMA--------------------------------

$matrizSuma=[];

for ($fila = 0; $fila < 3; $fila++) {
   for ($col = 0; $col < 3; $col++) {
       echo $matrizSuma[$fila][$col]=$matriz1[$fila][$col] + $matriz2[$fila][$col];
    echo " ";
   }
   echo "</br>";
   }
   echo "</br>";
//----------------------PRODUCTO--------------------------------
$n=3;
$matrizProd=[];
for ($fila = 0; $fila < 3; $fila++) {
   for ($col = 0; $col < 3; $col++) {
       $matrizProd[$i][$j]=0;
       for ($k = 0; $k < $n; $k++){
        $matrizProd[$fila][$col]+=$matriz1[$fila][$k] * $matriz2[$k][$col];
       echo " ";
       }
       echo $matrizProd[$fila][$col];
   }
   echo "</br>";
   }

?>

</body>
</html>
