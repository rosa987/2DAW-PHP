<HTML>

<HEAD><TITLE> EJ1A – Ej2. Array de impares con TD</TITLE></HEAD>

<BODY>



<?php

//Creo un array vacio

$impares=[];



//bucle for que genera los 20 primeros numeros impares

for ($i = 1; $i <= 20; $i++) {

$impares[]=2*$i-1;

}

//Los bordes de la tabla colapsan en un solo borde y se crea el encabezado de la tabla

echo "<table border='1'; style='border-collapse:collapse'> 

<tr>

<th>&nbsp; Indice &nbsp;</th>

<th>&nbsp; Valor &nbsp;</th>

<th>&nbsp; Suma &nbsp;</th>

</tr>"; 



$suma=0;

$arrlength=count($impares);

for ($j = 0; $j < $arrlength; $j++) {



     echo "<tr>";



     echo "<td>&nbsp; $j &nbsp;</td>";

     echo "<td>&nbsp; $impares[$j] &nbsp;</td>";

     

     //Acumulo la suma de los valores del array impares en la variable $suma 

      $suma+=$impares[$j];

     echo "<td>&nbsp; $suma &nbsp;</td>";

}

   echo "</tr>";  

echo "</table>";  

//----------Calcular Media pares e impares---------------------------------

$sumaPar=0;

$contPar=0;



$sumaImpar=0;

$contImpar=0;



for ($k = 0; $k < $arrlength; $k++) {

       if ($k%2==0){

		 $contPar++;

                 $sumaPar+=$impares[$k];

                 }else{

                 $contImpar++;

                 $sumaImpar+=$impares[$k];

                 }

 }

echo "</br>";

 echo "Media de los valores que están en 

las posiciones pares = ".$sumaPar/$contPar."</br>";

echo "Media de los valores que están en 

las posiciones impares = ".$sumaImpar/$contImpar;

?>

</table>

</BODY>

</HTML>