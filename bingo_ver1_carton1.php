<!DOCTYPE html>

<html>
<body>
<?php

//-------------------------------Carton1----------------------------------------

echo "======================Jugador1 con 1 Carton =================="."</BR>";

$carton = array();

$i=0;

//echo "===========" . "</BR>";



while($i < 15){

	

	$numCarton=rand(1,60);

	

	if(in_array($numCarton,$carton) === false){

		

		array_push($carton,$numCarton);

		

		$i++;

	}	

}

//var_dump ($carton);

for($i = 0 ; $i < count($carton); $i++){

   echo $carton[$i]." | ";

}

echo "</BR>";

echo "============================================================================" . "</BR>";

//----------------------------------Bombo-----------------------------------

// Condicion, que no se repita

$bombo=array();



for($i=0;$i<60;$i++){

		

	$bombo[$i]=$i+1;

	

}

shuffle($bombo);

//-------------------------------Buscar numero en el array-------------------------------------

// Condicion, buscar y tachar



$contador1=0;



while ($contador1 < 15 ){

	

	for($j = 0 ; $j < 60 ; $j++){

		

		echo "Sacamos el numero " . $bombo[$j] . "</BR>";

        

		if (in_array($bombo[$j],$carton) ){

			

			echo "Tachamos el numero " . $bombo[$j] . "</BR>";

			

			//echo print_r ($carton);

            echo "</BR>";        

			$contador1++;

			echo "***".$contador1."***";	

        }



		 }



			echo "</BR>";  

}



//-------------------------------Declaro Ganador------------------------------------- 

 if ($contador1=15){	

		        echo "BINGO! Carton1 ha ganado";

         }

?>
</body>

</html>
