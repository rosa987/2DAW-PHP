<!DOCTYPE html>
<html>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<body>
<?php

$num="127";
$numdec=$num;
$resto = "";

    if ($num == "0") {
    echo "Numero $num en binario = 0"."<br/>";
    }
     
   elseif ($num >= "100" && $num <= "999" ) {
    
    while (floor($num) >0)
    {    //Acumulo el resto de la división entre 2. Se va concatenando
        $resto .= $num % 2;
        //Divido el nº entre 2. Fin ($num<=0)
        $num = $num /2;
    }
     //Obtengo el nº binario
     strrev($resto);
     //Aumento ceros por delante al nº binario
     $resto = substr("00000000",0,8 - strlen($resto)) . $resto;
    
    echo "Numero $numdec en binario = $resto"."<br/>";
   } else {
    while (floor($num) >0)
    {
         $resto .= $num % 2;
         $num = $num /2;
    }
  echo strrev($resto);
  echo "Numero $numdec en binario = $resto"."<br/>";
}

?>
</body>
</html>