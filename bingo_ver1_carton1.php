<!DOCTYPE html>
<html>
<body>

<?php
//-------------------------------Carton1----------------------------------------
$carton = array();$i=0;echo "Jugador 1. Carton1"."</BR>";echo "===========" . "</BR>";while($i < 15){
	
	$numCarton=rand(1,60);
	
	if(in_array($numCarton,$carton) === false){
		
		array_push($carton,$numCarton);
		
		$i++;
	}	
}
var_dump ($carton);
echo "</BR>";


//----------------------------------Bombo-----------------------------------
// Condicion, que no se repita
$bombo=array();

for($i=0;$i<60;$i++){
		
	$bombo[$i]=$i+1;
	
}// buscar numero en el array
// Condicion, buscar y tachar
shuffle($bombo);
$contador1=0;
$contador2=0;

$aciertos1=0;
$aciertos2=0;
while ($contador1 < 15 ){
	
	for($j = 0 ; $j < 60 ; $j++){
		
		echo "Sacamos el numero " . $bombo[$j] . "</BR>";
		if (in_array($bombo[$j],$carton) ){
			
			echo "Tachamos el numero " . $bombo[$j] . "</BR>";
			
			//$carton = array_replace($carton,"X");
			
			echo print_r ($carton);
            echo "</BR>";        
			$contador++;
			echo "----".$contador;
			
			
			
        }
		
		if (in_array($bombo[$j],$carton2) ){
			
			echo "Tachamos el numero " . $bombo[$j] . "</BR>";
			
			//$carton = array_replace($carton,"X");
			
			echo print_r ($carton);
            echo "</BR>";        
			$contador2++;
			echo "----".$contador;
			
			
			
        }
	    
		
		 }
		 
		
			echo "</BR>";

    
}

  if ($contador1=15){	
		        echo "Bingo Carton1";
         }
  if ($contador2=15){	
		        echo "Bingo Carton2";
         }		 

?>

</body>
</html>