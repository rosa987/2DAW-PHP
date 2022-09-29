<HTML>

<HEAD><TITLE> EJ1A – Ej2. Array de impares con TD</TITLE></HEAD>

<BODY>



<?php

//Creo un array vacio

$binarios=[];



//bucle for que genera los 20 primeros numeros binarios

for ($i = 0; $i < 20; $i++) {

   $binarios[]=decbin(strval($i));

}



echo "<table border='1'; style='border-collapse:collapse'> 

<tr>

<th>&nbsp; Indice &nbsp;</th>

<th>&nbsp; Binario &nbsp;</th>

<th>&nbsp; Octal &nbsp;</th>



</tr>"; 



$octal=0;

$arrlength=count($binarios);

for ($j = 0; $j < $arrlength; $j++) {



     echo "<tr>";



     echo "<td>&nbsp; $j &nbsp;</td>";

     echo "<td>&nbsp; $binarios[$j] &nbsp;</td>";

     

     //Acumulo los valores del array binarios convertidos a octal en $octal

      $octal=base_convert($binarios[$j],2,8);

     echo "<td>&nbsp; $octal &nbsp;</td>";

}







$binariosRev=[];

for ($k = $arrlength-1; $k >= 0; $k--) {



     //el array $binarios en orden inverso

      $binarios[$k];

      // nuevo array que almacene los números binarios en orden inverso

     array_push($binariosRev,$binarios[$k]);

}

//Mostrar en pantalla el nuevo array

//print_r($binariosRev);

echo "<table border='1'; style='border-collapse:collapse'> 

<tr>

<th>&nbsp; BinarioInverso &nbsp;</th>

</tr>"; 

$arrlengthRev=count($binariosRev);

//Recorro el array  $binariosRev  

for ($r = 0; $r < $arrlengthRev; $r++) {

 echo "<tr>";

    echo "<td>&nbsp; $binariosRev[$r] &nbsp;</td>";



}

echo "</tr>";

   echo "</tr>";  

echo "</table>"; 









?>



</BODY>

</HTML>