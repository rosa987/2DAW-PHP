<!DOCTYPE html>
<html>
<body>

<?php
//Creo una matriz 
//$matriz=array(array(), array(), array());

  /* echo $matriz[0][0]=1;
     echo $matriz[0][1]=2;
    echo $matriz[0][2]=3;
    
    echo $matriz[1][0]=4;
    echo $matriz[1][1]=5;
    echo $matriz[1][2]=6;
    
    echo $matriz[2][0]=7;
    echo $matriz[2][1]=8;
    echo $matriz[2][2]=9;
    
   */

 $counter=0; 
 // Tres filas y 3 columnas
for ($fila = 0; $fila < 3; $fila++) {
  echo "<p><b>Fila nº: $fila</b></p>";
      
  echo "<ul>";
  
   for ($col = 0; $col < 3; $col++) {
   
   //Hallar los muliplos de 2 = contar de 2 en 2 desde 0
    $counter+=2; 
  
    //relleno la matriz con los multiplos de 2
    echo $matriz[$fila][$col]=$counter."  ";
    
   }
 
  echo "</ul>";
}
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
?>

</body>
</html>