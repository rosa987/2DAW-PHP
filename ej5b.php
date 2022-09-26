<HTML>
<HEAD><TITLE> EJ5B – Tabla multiplicar con TD</TITLE></HEAD>
<BODY>

<?php
$num="2";
//Los bordes de la tabla colapsan en un solo borde
echo "<table border='1'; style='border-collapse:collapse'>"; //abrir tabla
//bucle for que va del 1 al 12
for ($i = 1; $i <= 12; $i++) {
$prod=$num * $i;
echo "<tr>";
echo "<td>&nbsp; $num x $i &nbsp;</td>";// non-breaking space es un espacio que no salta a otra linea, por lo que añade un espacio en blanco. 
       
   echo  "<td>&nbsp;   $prod &nbsp;</td>";
   echo "</tr>";
   
    }  
echo "</table>";     
?>
</table>
</BODY>
</HTML>