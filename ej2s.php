<HTML>
<HEAD><TITLE> EJ2-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

$ip="192.18.16.204";
$num=$ip;

//echo strpos($ip,".")."<br/>";

 $ip1=substr($ip,0,strpos($ip,"."))."<br/>";
 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

 $ip2=substr($ip,0,strpos($ip,"."))."<br/>";
 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

 $ip3=substr($ip,0,strpos($ip,"."))."<br/>";
 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

echo $text="IP $num en binario es ";

echo decbin($ip1).".".decbin($ip2).".".decbin($ip3).".".decbin($ip);

?>
</BODY>
</HTML>


