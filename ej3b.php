<!DOCTYPE html>

<HTML>

<HEAD><TITLE> EJ3B – Conversor Decimal a base 16 </TITLE></HEAD>

<BODY>

<?php

$num="15";
$numdec=$num;
$base="16";

$letras="0123456789ABCDEF";
$cadena="";
$resto = "";

if ($num == "0") {
    echo "Numero $num en base $base = 0"."<br/>";
    }else{
 while (floor($num) >0)

    {
      $resto = $num % $base;
     $cadena=$letras[$resto].$cadena;
         $num = $num /$base;
    }

  echo "Numero "."$numdec"." en base "."$base". " = ".$cadena;
}
?>

</BODY>

</HTML>