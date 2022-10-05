<!DOCTYPE html>
<html>
<body>
<?php
 $notas = array(
        "Marina" => array(
                  'Ingles' => 10,
                    'FOL' => 8, 
                    'PHP' => 6, 
                   'JAVA' => 7,
                   ),
        "Julio" => array(
                  'Ingles' => 3,
                  'FOL' => 9,
                  'PHP' => 7, 
                  'JAVA' => 2,
                  ),
         "Pedro" => array(
                  'Ingles' => 9,
                    'FOL' => 2, 
                    'PHP' => 6, 
                   'JAVA' => 4,
                   ),
        "Ana" => array(
                  'Ingles' => 2,
                  'FOL' => 9,
                  'PHP' => 7, 
                  'JAVA' => 6,
                  ),
                  
      "Victor" => array(
                  'Ingles' => 3,
                    'FOL' => 8, 
                    'PHP' => 6, 
                   'JAVA' => 7,
                   ),
        "Carmen" => array(
                  'Ingles' => 2,
                  'FOL' => 9,
                  'PHP' => 7, 
                  'JAVA' => 4,
                  ),
      "Juan" => array(
                  'Ingles' => 1,
                    'FOL' => 8, 
                    'PHP' => 6, 
                   'JAVA' => 7,
                   ),
        "Alicia" => array(
                  'Ingles' => 7,
                  'FOL' => 9,
                  'PHP' => 7, 
                  'JAVA' => 4,
                  ),
         "Ema" => array(
                  'Ingles' => 1,
                    'FOL' => 8, 
                    'PHP' => 6, 
                   'JAVA' => 7,
                   ),
        "Fernando" => array(
                  'Ingles' => 2,
                  'FOL' => 6,
                  'PHP' => 7, 
                  'JAVA' => 8,
                  ),
                  
        
    );
  
//print_r($notas);
echo "<br>";  
echo "<br>";
/*
// Accessing array elements using for each loop.Todos los valores del array notas.No las keys
foreach($notas as $nota) {
    echo $nota['Ingles']. " ".$nota[ 'FOL']." ".$nota['PHP']." ".$nota['JAVA']."\n"; 
}
*/

//----------Accedo SOLO a la nota de key Marina y key ingles------------------------- 
//echo $notas['Marina']['Ingles'] . "\n"; 
//echo "<br>"; echo "<br>";

//---------A.Mostrar NOMBRE DEL alumno con mayor nota en INGLES.------------------
/*
//Accedo a los elementos de la asignatura ingles on un for each loop
foreach($notas as $nota) {
     $nota['Ingles']."<br>"; 
     echo "<br>"; 
 echo  max($nota['Ingles']);
}
*/
//Con array_map envio los valores del array a una funcion. extraigo los nombres y notas en la asignatura ingles de cada estudiante.

//funcion infoIngles q devuelve un array con los detalles de la asignatura ingles, es decir, su nombre de alumno y nota. TRANSFORMACION DE ARRAY asoc.2D A ARRAY asoc.1D
function infoIngles($info){ 
return $info['Ingles'];
}

//creo un array asociativo $notas_Ingles que solo va a contener nombre y notas de los alumnos
$notas_Ingles = array_map("infoIngles", $notas);

//Array asociativo de 1D con nombre alumno como key y nota como valor
echo "1Dimension Array asociativo creado: ";
print_r($notas_Ingles); 
 echo "<br>";

//echo $notaMayorIngles[0];
 $notaMayorIngles=array_keys($notas_Ingles, max($notas_Ingles));
 print_r($notaMayorIngles);
  echo "<br>";
 echo "El alumno con mayor nota en Ingles es: ";
 echo $notaMayorIngles[0];
  echo "<br>";   
  echo "<br>"; 
//---------B.Mostrar NOMBRE DEL alumno con menor nota en JAVA.------------------
function infoJava($info){ 
return $info['JAVA'];
}

$notas_Java = array_map("infoJava", $notas);
echo "1Dimension Array asociativo creado: ";
print_r($notas_Java); 
 echo "<br>";

//echo $notaMenorJava[0];
 $notaMenorJava=array_keys($notas_Java, min($notas_Java));
 print_r($notaMenorJava);
  echo "<br>";
 echo "El alumno con menor nota en JAVA es: ";
 echo $notaMenorJava[0];
  echo "<br>";   
   echo "<br>"; 
//---------C.Para un alumno, mostrar en que materia tiene su nota más baja(Marina)------------------

$alumnoElegido='Marina';
$asignaturaBaja = "";
    $notaAlta = 0;
    $asignaturaAlta = "";
    $notaBaja= 10;
    
foreach($notas as $key=> $valor) {
    foreach ($valor as $sub_key => $sub_valor) {
    
          if ($key==$alumnoElegido &&  $sub_valor < $notaBaja) { 
               $notaBaja = $sub_valor;
               $asignaturaBaja = $sub_key;     
            }
            
            if ($key == $alumnoElegido && $sub_valor > $notaAlta) {
                $notaAlta = $sub_valor;
                $asignaturaAlta = $sub_key;
            } 
    }
}

 echo "Alumno ".$alumnoElegido." en la asignatura " . $asignaturaBaja . " tiene  una nota de " . $notaBaja . " y es su nota más baja";
    echo "</br>";
  
//---------D.Para un alumno, mostrar en que materia tiene su nota más alta(Marina)------------------
echo "Alumno " .$alumnoElegido. " en la asignatura " . $asignaturaAlta . " tiene una nota de " . $notaAlta . " y es su nota más alta";
 echo "<br>";
//--------E. Mostrar la media por materia de todos los alumnos.--------------------------

  //Materia1= Ingles.  solo con notas de ingles
$ingles=array_column($notas, 'Ingles');

$suma=0;
for ($j = 0; $j < count($ingles); $j++) {
      $ingles[$j];
      $suma+=$ingles[$j];  
}
"Suma de las notas= ". $suma;
echo "<br>";  
echo "Media de INGLES= ".$suma/count($ingles)."</br>";

//----Materia2= FOL. -------------------------------
 $fol=array_column($notas, 'FOL');
$suma=0;
for ($j = 0; $j < count($fol); $j++) {
      $fol[$j];
      $suma+=$fol[$j];  
}
"Suma de las notas= ". $suma;
echo "Media de FOL= ".$suma/count($fol)."</br>";
//--------Materia3= PHP. ---------------------------------------- 
$php=array_column($notas, 'PHP');
$suma=0;
for ($j = 0; $j < count($php); $j++) {
      $php[$j];
      $suma+=$php[$j];  
}
$suma;
echo "Media de PHP= ".$suma/count($php)."</br>";
//--------Materia4= JAVA. ---------------------------------------- 
$java=array_column($notas, 'JAVA');
$suma=0;
for ($j = 0; $j < count($java); $j++) {
      $java[$j];
      $suma+=$java[$j];  
}
$suma;
echo "Media de JAVA= ".$suma/count($java)."</br>";
 echo "<br>";
///-------F. Mostrar la media por alumno para todas las materias---------------- 
 /*foreach ($notas as $clave => $valor) {
       $mediaGlobal=0;
        foreach ($valor as $clave2 => $valor2) {         
            $mediaGlobal = $valor2 + $mediaGlobal;         
        }
        
        echo "la nota media de " . $clave . " es ". $mediaGlobal/4;
        echo "</br>";
    }
*/
///-------F. Mostrar la media por alumno para todas las materias---------------- 

    echo "<br>";
  $num_asignaturas=4; 
   foreach($notas as $nota) {
    echo ($nota['Ingles']+ $nota[ 'FOL'] + $nota['PHP']+$nota['JAVA'])/ $num_asignaturas."<br>";
}
?>

</body>
</html>