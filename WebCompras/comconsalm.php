<HTML>
<HEAD><TITLE>Consulta de Almacenes</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<h1>Consulta de Almacenes (comconsalm.php)</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
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

    <input type="submit" value="Mostrar productos" name="enviar" />
</form>
<br>

<a href="comprasWeb.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else if ($_SERVER["REQUEST_METHOD"]== "POST"){
   
    $num_almacen=$_POST["numAlmacen"];

        $conn=conexion();
        $arrayProductosEnAlmacen=verProductosEnAlmacen($conn, $num_almacen); //asignar cantidad
        foreach($arrayProductosEnAlmacen as $row) {
            echo "Nombre del producto: " . $row["nombre"]. " || precio: " . $row["precio"]. " € || id_categoria: " . $row["id_categoria"]. "  || Nº almacen: " . $row["num_almacen"]."  || id producto: " . $row["id_producto"]."  || Cantidad disponible: " . $row["cantidad"]. "<br>";
        }    
        $conn = null;
}
?>
</BODY>
</HTML>