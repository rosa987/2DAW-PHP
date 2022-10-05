<!DOCTYPE html>
<html>
<body>

<?php
//Creo un array asociativo
$edad = array("Maria"=>"35", "Juan"=>"40", "Ana"=>"5","Pedro"=>"17", "Carla"=>"81");

//----------a. Mostrar el contenido del array utilizando bucles------------------
//Key=posicion=indice ->nombre de alumnos  | el valor es la edad
foreach($edad as $i => $i_value) {
  echo "Key=" . $i . ", Value=" . $i_value;
  echo "<br>";
  echo "<br>";
}
//----------b. Sitúa el puntero en la segunda posición del array y muestra su valor-------
/*El array es asociativo por lo que su posicion esta determinada por nombres de alumnos y en principio no se puede*/
/* Pero se podria hacer con un loop for previamente 
obteniendo un array indexado con array_keys()*/



echo "<br>";
/*//Array indexado a partir de un array asociativo.Asi puedo hallar las posiciones del array $edad y su longitud
$nombre = array_keys($edad); //Array indexado
print_r($nombre);  //Array indexado
echo "<br>";
count($edad); //longitud 5 
echo "<br>";
//Elemento de la Posicion 2 del Array
echo $edad['Ana'];//5
echo "<br>";
*/
//--------- C.Avanza una posición y muestra el valor-------
echo "Posición inicial y muestra el valor= ".current($edad) . "<br>";
echo "Avanza una posición y muestra el valor= ".next($edad). "<br>";
echo "<br>";
//--------D.Coloca el puntero en la última posición y muestra el valor------
echo "puntero en la última posición y muestra el valor= ".end($edad). "<br>";
echo "<br>";
//--------E. Ordena el array por orden de edad (de menor a mayor) y muestra la primera posición del array y la última----------------------------------
//asort() mantiene las keys originales y ordena los valores
asort($edad);
echo "<br>";
foreach($edad as $i => $i_value) {
  echo "Key=" . $i . ", Value=" . $i_value;
  echo "<br>";
  echo "<br>";
}
echo "<br>";
//array_keys() devuelve un array indexado con las keys del array $edad que meto en el array $arraypos1
$arraypos1=array_keys($edad,5);
//print_r($arraypos1);

$arrayposEnd=array_keys($edad,81);
//print_r($arrayposEnd);

echo "Valor de la 1º posicion del array= ".current($edad) . " y su key= ".$arraypos1[0]."<br>";
echo "Valor de la ultima posicion del array= ".end($edad). " y su key= ".$arrayposEnd[0]."<br>";

?>

</body>
</html>