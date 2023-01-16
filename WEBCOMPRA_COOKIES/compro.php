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
                    comprarUnProducto($conn, $nif, $id_producto, $fecha_compra, $unidades);  //
                    $numAlmacenesEnQueSeEncuentraProducto=contarAlmacenesEnALMACENA($conn, $id_producto);
                    actualizarTablaAlmacenaTrasCompra($conn, $id_producto, $unidades);
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