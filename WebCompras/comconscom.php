<HTML>
<HEAD><TITLE>Consulta de Compras</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<h1>Consulta de Compras (comconscom.php)</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   
    NIFs de clientes <select name="nif"> 
        <?php
        $conn=conexion();
        $prod=verNifs($conn);
        foreach($prod as $row) {
            echo "<option value=".$row["nif"].">". $row["nif"]. "</option>";
        }
        $conn = null;
        ?>
    </select> <br><br>
   
    Fecha Desde <input type="text" name='fechadesde' placeholder='xxxx-xx-xx'> <br> <br>
    Fecha Hasta <input type="text" name='fechahasta' placeholder='xxxx-xx-xx'> <br> <br>

    <input type="submit" value="Mostrar informacion de las compras realizadas" name="enviar" />
</form>
<br>

<a href="comprasWeb.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else if ($_SERVER["REQUEST_METHOD"]== "POST"){
   
    $nif=$_POST["nif"];
    $fechaDesde=$_POST["fechadesde"];
    $fechaHasta=$_POST["fechahasta"];
        $conn=conexion();
        $arrayinfoCompras=infoComprasIntervalo($conn, $nif, $fechaDesde, $fechaHasta); //array con info de las compras de un cliente
        //var_dump($arrayinfoCompras);
        if(count( $arrayinfoCompras)==0){
            echo "No ha habido compras del cliente con nif $nif en el periodo $fechaDesde a $fechaHasta";
            $conn = null;
        }else{
            echo "Las compras del cliente con nif $nif realizadas en el perido de $fechaDesde a $fechaHasta son: ". "<br><br>";
            foreach($arrayinfoCompras as $row) {
                echo "id producto: " . $row["id_producto"]. "  || Nombre del producto: " . $row["nombre"]. "  || Precio producto: " . $row["precio"]. "  || Fecha compra: ". $row["fecha_compra"]. "  || Nº Unidades: ". $row["unidades"]. "<br>"; ///meter unidades??
            }
    
            $arraymontoTotalCompras=montoTotalComprasIntervalo($conn, $nif, $fechaDesde, $fechaHasta);
            var_dump($arraymontoTotalCompras); 
            foreach($arraymontoTotalCompras as $row) {
                echo "Monto total: " . $row["SUM(compra.unidades * producto.precio)"]. " €<br>";
            }
            $conn = null;
        }
        
}
?>
</BODY>
</HTML>