<HTML>
<HEAD><TITLE>Alta de Productos</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<h1>Alta de Productos (comaltapro.php)</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nombre <input type="text" name="nombre"><br><br>
    Precio <input type="text" name="precio"><br><br>
    CATEGORIAS <select name="categoria"> 
        <?php
        $conn=conexion();
        $dpto=verCategorias($conn);
        foreach($dpto as $row) {
            echo "<option value=".$row["id_categoria"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select> <br><br>
    <input type="submit" value="Dar alta PRODUCTO" name="enviar" />
</form>
<br>
<a href="comprasWeb.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $id_categoria=$_POST["categoria"];
    if($nombre=="" || $precio=="" ){
        echo "ERROR. Hay que rellenar todos los campos";
    }else{
        $conn=conexion();
        $contarProductos= contarNombresProducto($conn);
        $incre=incremProducto($contarProductos); //el incremento del ID

        if(compararNombresPRODUCTS($conn, $nombre)==true){ //si ya existe el nombre, no se da de alta
            echo "ERROR: El nombre ya se encuentra dado de alta. Vuelva a intentarlo por favor";   
            $conn = null;
        }else{
            nuevo_Producto($conn, $incre, $nombre, $precio, $id_categoria); //crear new product
            $conn = null;
        } 

        $conn=null;
    }
}
?>
</BODY>
</HTML>