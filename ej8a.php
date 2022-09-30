<!DOCTYPE html>
<html>
<body>

<?php
//Creo un array asociativo
$notaBD = array("Marina"=>"10", "Julio"=>"9", "Irene"=>"3","Pedro"=>"7", "Carla"=>"5");

//Key=posicion=indice ->nombre de alumnos  | el valor es la nota
foreach($notaBD as $i => $i_value) {
  echo "Nombre=" . $i . ", Nota=" . $i_value;
  echo "<br>";
  echo "<br>";
}
//----------A. Mostrar el alumno con mayor nota------------------
//echo max($notaBD);
$notaMayor= array_keys($notaBD,max($notaBD));
print_r($notaMayor);
echo $notaMayor[0];
  echo "<br>";   

//----------B. Mostrar el alumno con menor nota---------------
$notaMenor= array_keys($notaBD,min($notaBD));
print_r($notaMenor);
echo $notaMenor[0];
echo "<br>";

//---------C.Media notas obtenidas por los alumnos------
$suma=0;
//count($notaBD);
$arrayNotas=array_values($notaBD);
for ($j = 0; $j < count($arrayNotas); $j++) {
      $arrayNotas[$j];
     //Acumulo la suma de los valores del array en la variable $suma 
      $suma+=$arrayNotas[$j];  
}
echo "Suma de las notas= ". $suma;
echo "<br>";  
echo "Media de las notas= ".$suma/count($arrayNotas)."</br>";


?>

</body>
</html>