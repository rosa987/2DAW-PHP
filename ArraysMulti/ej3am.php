<HTML>

<HEAD>
    <TITLE> Multidimensional 3</TITLE>
</HEAD>

<BODY>
    <?php
   
  $counter=0; 
 // Tres filas y 5 columnas
for ($fila = 0; $fila < 3; $fila++) {
  echo "<p><b>Fila nº: $fila</b></p>";
      
  echo "<ul>";
  
   for ($col = 0; $col < 5; $col++) {
   
   //Cuenta de 1 en 1
    $counter++; 
  
    //relleno la matriz con numeros
    echo $matriz[$fila][$col]=$counter."  "; 
   }
 
  echo "</ul>";
}

 print_r($matriz);
 echo "<br>";
 echo "<br>";
// Elementos por filas
    for ($i=0;$i<3; $i++){
        for ($j=0;$j<5;$j++){
            echo $elementFilas[]=$matriz[$i][$j]."-";
        }
    }
   //print_r($elementFilas); 
    echo "<br>";
    
// Elementos por columnas
    for ($i=0;$i<5; $i++){
        for ($j=0;$j<3;$j++){
             echo $elementCols[]=$matriz[$j][$i]."-";
        }
    }
   //print_r($elementCols);     


    ?>

</BODY>

</HTML>