<HTML>

<HEAD>
    <TITLE>REVISAR CREO Q NO ESTA BIEN multid 6ffff</TITLE>
</HEAD>

<BODY>
    <?php  
$matriz=[];

 // 3 filas y 3 columnas
for ($i = 0; $i< 3; $i++) {
   for ($j = 0; $j < 3; $j++) {
    //relleno la matriz con numeros aleatorios entre 1 y 10
    echo $matriz[$i][$j]=rand(1,10); 
    echo " ";
   }
  echo "<br>";
}
print_r($matriz);     
   
//-----------fila Maximos y media----------------------------------------------------

    $arrayMax=[];
    $arrayMedia=[];
    for ($i=0;$i<3;$i++){
        $mayorvalorFila=0;//un integer
        $sumaFila=0;////un integer
        for ($j=0;$j<3;$j++){   
            if ($matriz[$i][$j]>$mayorvalorFila){
                 $mayorvalorFila=$matriz[$i][$j]; //max valor de cada fila del array
            }
             $sumaFila+=$matriz[$i][$j];//Acumular la suma por cada fila
        }
        $arrayMax[]=  $mayorvalorFila;
        $arrayMedia[]= $sumaFila/3; //Promedio por cada fila
    } 
echo "<br>";
echo "<br>";
    echo "Valores maximos= ";
    print_r($arrayMax);
    echo "<br>";
    echo "Promedios= ";
    print_r($arrayMedia);

    ?>

</BODY>

</HTML>