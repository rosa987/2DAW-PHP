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
//-----------------------------Eliminar un el elemento del array y en orden inverso--------------------------------------
//Elimino solo un(1) el elemento del array en la posicion 5(5) 
array_splice($arrayUnion,5,1);
print_r($arrayUnion);
echo "</br>";
echo "</br>";
print_r(array_reverse($arrayUnion));
?>

</BODY>
</HTML>