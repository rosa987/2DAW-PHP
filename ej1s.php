<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ip="192.18.16.204";
$num=$ip;

 $ip1=substr($ip,0,strpos($ip,"."))."<br/>";
 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

 $ip2=substr($ip,0,strpos($ip,"."))."<br/>";
 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

 $ip3=substr($ip,0,strpos($ip,"."))."<br/>";
 $ip=substr($ip,strpos($ip,".")+1)."<br/>";

 //$ip4=substr($ip,0)."<br/>"; //lo ultimo que queda de la ip

printf("IP $num en binario es %08b",$ip1);
printf(".%08b",$ip2);
printf(".%08b",$ip3);
printf(".%08b",$ip);
?>
</BODY>
</HTML>
