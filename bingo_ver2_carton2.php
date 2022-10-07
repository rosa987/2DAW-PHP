<!DOCTYPE html>

<html>

<body>

<?php

//-------------------------------Carton1----------------------------------------

echo "======================Jugador1 con Carton 1 =================="."</BR>";

$carton1 = array();

$i=0;



while($i < 15){	

	$numCarton=rand(1,60);

	

	if(in_array($numCarton,$carton1) === false){

		

		array_push($carton1,$numCarton);

		

		$i++;

	}	

}

//var_dump ($carton1);

for($i = 0 ; $i < count($carton1); $i++){

   echo $carton1[$i]." | ";

}

echo "</BR>";

echo "============================================================================" . "</BR>";



//-------------------------------Carton2----------------------------------------

echo "======================Jugador1 con Carton 2 =================="."</BR>";

$carton2 = array();

$i=0;



while($i < 15){	

	$numCarton=rand(1,60);

	

	if(in_array($numCarton,$carton2) === false){

		

		array_push($carton2,$numCarton);

		

		$i++;

	}	

}

//var_dump ($carton1);

for($i = 0 ; $i < count($carton2); $i++){

   echo $carton2[$i]." | ";

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

//-------------------------Buscar numero(bola del bombo) en el array-------------------------------------

// Condicion, buscar y tachar

$contador1=0;

$contador2=0;



while (($contador1 < 15) || ($contador2 < 15)){

	

	for($j = 0 ; $j < count($bombo) ; $j++){

		

		echo "BOMBO.Sacamos el numero " . $bombo[$j] . "</BR>";

        

		     if (in_array($bombo[$j],$carton1) ){

			

			echo "CARTON1.Tachamos el numero " . $bombo[$j] . "</BR>";

			

			//echo print_r ($carton1);

            //echo "</BR>";        

			$contador1++;

			echo "**Cont1=".$contador1."</BR>";	

            

             }

             

      echo "</BR>"; 

      

           if (in_array($bombo[$j],$carton2) ){

			

			echo "CARTON2.Tachamos el numero " . $bombo[$j] . "</BR>";

			

			//echo print_r ($carton2);

            echo "</BR>";        

			$contador2++;

			echo "**Cont2=".$contador2."</BR>";    

             }

     }

			echo "</BR>";  

}



//-------------------------------Declaro Ganador------------------------------------- 

//Quiero que gane el primer carton en tachar todos los numeros

 if ($contador1<$contador2){	

		        echo "BINGO! Carton1 ha ganado";

         }

 else{	

		        echo "BINGO! Carton2 ha ganado";

         }

         

   /*

   

    if ($contador1==15){	

		        echo "BINGO! Carton1 ha ganado";

         }

 if($contador2==15){	

		        echo "BINGO! Carton2 ha ganado";

         }

   */

?>



</body>

</html>