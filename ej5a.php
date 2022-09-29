<HTML>
<HEAD><TITLE> EJ1A – Ej5. Array de impares con TD</TITLE></HEAD>
<BODY>

<?php

//Creo 3 arrays 
$array1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
$array2 = array("Sistemas Informáticos","FOL","Mecanizado");
$array3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");
//-----------------------------Part A--------------------------------------
//Creo un array vacio
$arrayUnion=[];

$arrlength1=count($array1);
$arrlength2=count($array2);
$arrlength3=count($array3);

//Unir los 3 arrays en uno unico
for ($i = 0; $i < $arrlength1; $i++) {
   $arrayUnion[]=$array1[$i];
}

for ($i = 0; $i < $arrlength2; $i++) {
   $arrayUnion[]=$array2[$i];
}
for ($i = 0; $i < $arrlength3; $i++) {
   $arrayUnion[]=$array3[$i];
}
//Union los 3 arrays en uno unico
print_r($arrayUnion);
echo "</br>";
echo "</br>";
//---------------------------Part B----------------------------------------
//Creo un array vacio
$arrayUnion2=[];

$arrayUnion2=array_merge($array1,$array2,$array3);
print_r($arrayUnion2);
echo "</br>";
echo "</br>";
//-------------------------Part C---------------------------------
//Creo un array vacio
$arrayUnion3=[];
array_push($arrayUnion3, ...$array1, ...$array2,...$array3);
print_r($arrayUnion3);
?>

</BODY>
</HTML>