<HTML>
<HEAD><TITLE>Aprovisionar Productos</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<h1>Aprovisionar Productos (comaprpro.php)</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   
    Nombres de los productos <select name="producto"> 
        <?php
        $conn=conexion();
        $prod=verProductos($conn);
        foreach($prod as $row) {
            echo "<option value=".$row["id_producto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select> <br><br>
    Nº de almacen <select name="numAlmacen"> 
        <?php
        $conn=conexion();
        $numAlmacen=verNumAlmacen($conn);
        foreach($numAlmacen as $row) {
            echo "<option value=".$row["num_almacen"].">". $row["num_almacen"]. "</option>";
        }
        $conn = null;
        ?>
    </select> <br><br>
    Cantidad <input type="text" name="cantidad"><br><br>
    <input type="submit" value="Asignar Cantidad" name="enviar" />
</form>
<br>

<a href="comprasWeb.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else if ($_SERVER["REQUEST_METHOD"]== "POST"){
   
    $id_producto=$_POST["producto"];
    $num_almacen=$_POST["numAlmacen"];
    $cantidad=$_POST["cantidad"];
    if(!empty($cantidad)){ //NO ME DEJA METER CANTIDAD 0
        $conn=conexion();
        $arrayProductExisteALMACENA=verSiProductoExisteEnALMACENA($conn, $num_almacen, $id_producto);
        var_dump($arrayProductExisteALMACENA);
        $conn = null;
        if(empty($arrayProductExisteALMACENA)==true){ //SI el producto no existe, se hace un INSERT INTO en ALMACENA
            $conn=conexion();
            asignarCantidad($conn, $num_almacen, $id_producto, $cantidad); //asignar cantidad
               $conn = null;
        }else{//update cantidad en Almacena.   SI el producto SI existe, se hace un UPDATE en ALMACENA
            $conn=conexion();
            actualizarCantidadDeProductoExistente($conn, $num_almacen, $id_producto, $cantidad); //actualizar cantidad en un determinado nº de almacen
               $conn = null;
        }
     
    }
}
?>
</BODY>
</HTML>