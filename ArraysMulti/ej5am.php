<HTML>

<HEAD>
    <TITLE> ejerc 5am</TITLE>
</HEAD>

<BODY>
    <?php
  $counter=0; 
 // 5 filas y 3 columnas
for ($fila = 0; $fila < 5; $fila++) {
  echo "<p><b>Fila nº: $fila</b></p>";
      
  echo "<ul>";
  
   for ($col = 0; $col < 3; $col++) {
   
   //Cada valor es suma de la posicion de fila y columna
    $counter=$fila+$col; 
  
    //relleno la matriz con numeros
    echo $matriz[$fila][$col]=$counter."  "; 
   }
  echo "</ul>";
}


    // Imprimir elementos por columnas
    for ($i=0;$i<3; $i++){
        for ($j=0;$j<5;$j++){
             echo $elementCols[]=$matriz[$j][$i]."-";
        }
    }
   //print_r($elementCols);     

    ?>

</BODY>

</HTML>