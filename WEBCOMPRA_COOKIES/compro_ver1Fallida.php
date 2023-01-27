<HTML>
<HEAD><TITLE>Compra de Productos</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<h1>Compra de Productos (compro.php)</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    NIF de cliente <input type="text" name='nif'> <br> <br>

    Nombres de los productos <select name="producto"> 
        <?php
        $conn=conexion();
        $prod=verProductosDisponibles($conn); //Solo muestra productos que estan en stock. si hay cantidad 0, ya no los muestra
        foreach($prod as $row) {
            echo "<option value=".$row["id_producto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select> <br><br>
   
    Nº Unidades del producto <input type="text" name='unidades'> <br> <br>
    <input type="submit" value="COMPRAR" name="enviar" />
</form>
<br>

<a href="comprasWeb.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else if ($_SERVER["REQUEST_METHOD"]== "POST"){
   
    $nif=$_POST["nif"];
    $unidades=$_POST["unidades"];
    $id_producto=$_POST["producto"];
    $fecha_compra = date('Y/m/d'); //fecha actual 
    //$unidades= 1; //siempre solo 1 unidad MAL
    if(!empty($nif)){
        $conn=conexion();
        if(nifDadoDeAlta($conn, $nif)==false){
            echo "ERROR. No se ha dado de alta como cliente";
            $conn = null;
        }else{
            if($unidades>0){
                $arrayProductAcomprar=comprobarStockporProductoAntesdeCompra($conn, $id_producto); //ver si se puede comprar la cantidad deseada del producto
                var_dump($arrayProductAcomprar);
                $sumCantiTotal= array_sum(array_column($arrayProductAcomprar,"cantidad")) ;
                var_dump($sumCantiTotal);
                if($sumCantiTotal< $unidades){
                    echo "ERROR. Lo sentimos, las unidades a comprar son mayores a la cantidad disponible del producto($id_producto). A continuación el stock disponible para comprar:". "<br>";
                    foreach($arrayProductAcomprar as $row) {
                        echo "Nombre del producto: " . $row["nombre"]. "  || Nº almacen: " . $row["num_almacen"]."  || id: " . $row["id_producto"]."  || Cantidad disponible: " . $row["cantidad"]. "<br>";
                    }
                    echo "En total la cantidad disponible para comprar es $sumCantiTotal";
                }else{
                    //comprarUnProducto($conn, $nif, $id_producto, $fecha_compra, $unidades);  //DESCOMENTAR LUEGO IMPORTANT!!!!!!!!!!!!!!


                   // $numAlmacenesEnQueSeEncuentraProducto=contarAlmacenesEnALMACENA($conn, $id_producto);//NO LO USO

                    //actualizarTablaAlmacenaTrasCompra($conn, $id_producto, $unidades);
                    $arrayAsoIDs=arrayConIDs_PRODUCTO($conn, $id_producto);
                    var_dump($arrayAsoIDs);
                    for($i = 0; $i < count($arrayAsoIDs); $i++) {
                        $arrayTodosIDsProductos[]= $arrayAsoIDs[$i]["id_producto"];
                    }
                    var_dump($arrayTodosIDsProductos); //array indexado con los id_producto 


                    //Paso1
                    $arrayID_PRODUCTOselect=actualizarTablaAlmacenaTrasCompra1($conn, $id_producto); //array asociativo con toda la info de un producto en ALMACENA
                    var_dump($arrayID_PRODUCTOselect);

                      // foreach($arrayID_PRODUCTOselect as $row) {
                        for($i = 0; $i < count($arrayID_PRODUCTOselect); $i++) {
                            //$arrayCantidades[]= $arrayID_PRODUCTOselect[$i]["cantidad"];
                             
                        
                       // var_dump($arrayCantidades);
                        $quitar= min($arrayID_PRODUCTOselect[$i]["cantidad"], $unidades); //cantidad a quitar (not more then what queda)
                        var_dump($quitar); //BIEN

                        $cantidadQueQueda= $unidades - $quitar; //6-4= 2    6-5= 1
                        var_dump($cantidadQueQueda);
                        $arrayCantiQuedaPorComprar[]=$cantidadQueQueda; // array(2 ,1)
                         //  }

                        $arrayNum_almacenes[]= $arrayID_PRODUCTOselect[$i]["num_almacen"];
                          }
                          var_dump($arrayNum_almacenes); //array indexado

                          var_dump($arrayCantiQuedaPorComprar); //array indexado

                          while($unidades > 0 && !empty($arrayTodosIDsProductos)){//$unidades > 0 
                            //$primerId_producto=array_shift($arrayTodosIDsProductos);
                            $primerId_producto=$arrayTodosIDsProductos;

                            var_dump($primerId_producto);
                        

                              //Paso2
                              var_dump($unidades);

                              for($i = 0; $i < count($arrayNum_almacenes); $i++) {
                                for($j = 0; $j < count($primerId_producto); $j++) {
                                    for($z = 0; $z < count($arrayCantiQuedaPorComprar); $z++) {
                                
                              $unidades=actualizarTablaAlmacenaTrasCompra2($conn,$arrayNum_almacenes[$i], $primerId_producto[$j],  $unidades, $arrayCantiQuedaPorComprar[$z], $quitar);
                              var_dump(actualizarTablaAlmacenaTrasCompra2($conn,$arrayNum_almacenes[$i], $primerId_producto[$i],  $unidades, $arrayCantiQuedaPorComprar[$z], $quitar));
                              var_dump($unidades);
                                 }
                                }
                            }

                            var_dump($unidades);
                          }
                   
                }
                /*
                foreach($arrayProductAcomprar as $row) {
                    $sum=$row["cantidad"];
                    if($sum=$row["cantidad"] < $unidades){ // || OR (o mejor otro else if ???) suma de cantidades por id de producto (Cuando estan en almacen diferente) < $unidades
                        echo "ERROR. Lo sentimos, las unidades a comprar son mayores a la cantidad disponible del producto($id_producto). A continuación el stock disponible para la compra:". "<br>";
                        echo "Nombre del producto: " . $row["nombre"]. "  || Nº almacen: " . $row["num_almacen"]."  || id: " . $row["id_producto"]."  || Cantidad disponible: " . $row["cantidad"]. "<br>";
                    }else{
                        comprarUnProducto($conn, $nif, $id_producto, $fecha_compra, $unidades);  //comprar un producto. NO se puede comprar 2 o mas productos diferentes
            
                        actualizarTablaAlmacenaTrasCompra($conn, $id_producto, $unidades);
                        
                    }
                   
                }
                */
                $conn = null;
                
            } 
            }
            
        
    }
}
?>
</BODY>
</HTML>