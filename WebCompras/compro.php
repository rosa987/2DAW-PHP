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
        $prod=verProductosDisponibles($conn);
        foreach($prod as $row) {
            echo "<option value=".$row["id_producto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select> <br><br>
   
    
    <input type="submit" value="COMPRAR" name="enviar" />
</form>
<br>

<a href="comprasWeb.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else if ($_SERVER["REQUEST_METHOD"]== "POST"){
   
    $nif=$_POST["nif"];
    $id_producto=$_POST["producto"];
    $fecha_compra = date('Y/m/d'); //fecha actual 
    $unidades= 1; //siempre solo 1 unidad
    if(!empty($nif)){
        $conn=conexion();
        if(nifDadoDeAlta($conn, $nif)==false){
            echo "ERROR. No se ha dado de alta como cliente";
            $conn = null;
        }else{
            comprarUnProducto($conn, $nif, $id_producto, $fecha_compra, $unidades);
            
            actualizarTablaAlmacenaTrasCompra($conn, $id_producto, $unidades);
            $conn = null;
        }
        
    }
}
?>
</BODY>
</HTML>