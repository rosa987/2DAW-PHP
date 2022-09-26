<HTML>

<HEAD><TITLE> EJ2-Direccion Red – Broadcast y Rango</TITLE></HEAD>

<BODY>

<?php

$ip="192.168.16.100/21";

//Obtengo la IP
$numip=substr($ip,0,strpos($ip,"/"))."<br/>"; 



//Nº total de bits
$totalbits="32";



//"Corto" la IP

 $ip1=substr($ip,0,strpos($ip,"."))."<br/>";

 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

 $ip2=substr($ip,0,strpos($ip,"."))."<br/>";

 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

 $ip3=substr($ip,0,strpos($ip,"."))."<br/>";

 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

 $ip4=substr($ip,0,strpos($ip,"/"))."<br/>";

 $ip=substr($ip,strpos($ip,"/")+1)."<br/>";

 

//Obtengo la mascara

 $mascara=$ip."<br/>"; 

 //Calculo el nº de bits para hosts

 $bitsforhosts=$totalbits-$mascara."<br/>"; 

 

 //Convierto $bitsforhosts de integer a string. Casting:

 $bitsfh=(string) $bitsforhosts;

 

 //Muestro la IP y Mascara

 echo $texto="IP: ".$numip;

 echo $texto="Mascara: ".$mascara;



//La IP en binario:

echo $bin=sprintf("%08b%08b%08b%08b",$ip1,$ip2,$ip3,$ip4);//he quitado puntos ... porque la longitud de $bin era 35 y deberia ser 32

echo $espacio=" "."<br/>";

//length o longitud del string $bin es 32

 //echo strlen($bin);

echo $espacio;



//Reemplazo los 1 por 0

echo $bin1=str_replace("1","0",substr($bin, -$bitsfh));

echo $espacio;

//echo strlen($bin1);

echo $bin=substr_replace($bin,$bin1,-$bitsfh); //3 11000000.10101000.00000000.00000000

echo $espacio;

//echo strlen($bin);



//"Corto" la IP que esta en binario

echo $dec1=substr($bin,0,8)."<br/>";

echo $dec=substr($bin,8)."<br/>";



echo $dec2=substr($dec,0,8)."<br/>";

echo $dec=substr($dec,8)."<br/>";



echo $dec3=substr($dec,0,8)."<br/>";

echo $dec=substr($dec,8)."<br/>";



echo $dec4=substr($dec,0)."<br/>";



//Obtengo la dirección de red

echo $texto="Direccion Red: ";

echo $red=bindec($dec1).".".bindec($dec2).".".bindec($dec3).".".bindec($dec4);

echo $espacio;



//Reemplazo los 0 por 1 para obtener la Direccion Broadcast

echo $bin2=str_replace("0","1",substr($bin, -$bitsfh))."<br/>";

echo $bin=substr_replace($bin,$bin2,-$bitsfh);



//"Corto" la IP que esta en binario

echo $dec1=substr($bin,0,8)."<br/>";

echo $dec=substr($bin,8)."<br/>";



echo $dec2=substr($dec,0,8)."<br/>";

echo $dec=substr($dec,8)."<br/>";



echo $dec3=substr($dec,0,8)."<br/>";

echo $dec=substr($dec,8)."<br/>";



echo $dec4=substr($dec,0)."<br/>";



//Obtengo la dirección de Broadcast

echo $text6="Direccion Broadcast: ";

echo $broad=bindec($dec1).".".bindec($dec2).".".bindec($dec3).".".bindec($dec4)."<br/>";

//----------------------------------------------------------------------

//"Corto" la IP

$red1=substr($red,0,strpos($red,"."));

$red=substr($red,strpos($red,".")+1);

$red2=substr($red,0,strpos($red,"."));

$red=substr($red,strpos($red,".")+1);

$red3=substr($red,0,strpos($red,"."));

$red=substr($red,strpos($red,".")+1);

//Sumo 1 al ultimo numero de la dirección red

 $red4=substr($red,0)+1; 

 
//Obtengo el primer rango 

echo $text="Rango: ";

echo $rango1=$red1.".".$red2.".".$red3.".".$red4." a ";

//"Corto" la IP

$broad1=substr($broad,0,strpos($broad,"."));

$broad=substr($broad,strpos($broad,".")+1);

$broad2=substr($broad,0,strpos($broad,"."));

$broad=substr($broad,strpos($broad,".")+1);

$broad3=substr($broad,0,strpos($broad,"."));

$broad=substr($broad,strpos($broad,".")+1);

//Resto 1 al ultimo numero de la dirección red

 $broad4=substr($broad,0)-1; 

//Obtengo el segundo rango 

echo $rango2= $broad1.".".$broad2.".".$broad3.".".$broad4;

?>

</BODY>

</HTML>
