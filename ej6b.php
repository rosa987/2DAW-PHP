<HTML>
<HEAD><TITLE>EJ6B – Factorial</TITLE></HEAD>
<BODY>
<?php
$num="4";
$factorial=1;

echo "$num". "!=" ;
for ($i = 1; $i <= $num; $i++) {
       //Obtengo el factorial
       $factorial=$factorial*$i;
       //echo $i;
      
       }
 //Muestra como se obtiene el resultado del factorial      
 for ($j = $num; $j >= 1; $j--) {
 if($j!=1){
 echo " $j x"; 
 }else{
 echo  $j;//Cuando el 1 aparece, a su lado ya no se coloca "x"
 }
 }
echo " = " . $factorial ."<br/>";   
?>
</BODY>
</HTML>