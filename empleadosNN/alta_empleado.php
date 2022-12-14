<HTML>
<HEAD><TITLE>ALTA DE EMPLEADO</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<h1>ALTA DE EMPLEADO</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    DNI <input type="text" name="dni"><br><br>
    Nombre <input type="text" name="nombre"><br><br>
    Salario <input type="text" name="salario"><br><br>
    Fecha Nacimiento <input type="text" name="fecha_nac"><br><br>
    Fecha Alta <input type="text" name="fecha_alta"><br><br>
    DEPARTAMENTOS <select name="dpto"> 
        <?php
        $conn=conexion();
        $dpto=verDepartamento($conn);
        foreach($dpto as $row) {
            echo "<option value=".$row["id_dpto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select> <br><br>
    <input type="submit" value="Dar alta EMPLE" name="enviar" />
</form>
<br>
<a href="empleadosnn.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $dni=$_POST["dni"];
    $nombre=$_POST["nombre"];
    $salario=$_POST["salario"];
    $fecha_nac=$_POST["fecha_nac"];
    $fecha_alta=$_POST["fecha_alta"];
    $id_dpto=$_POST["dpto"];
    if($dni=="" || $nombre=="" || $salario=="" || $fecha_nac=="" || $fecha_alta==""){
        echo "ERROR. Hay que rellenar todos los campos";
    }else{
        $conn=conexion();
        nuevoeEmpleado($conn,$dni,$nombre,$salario,$fecha_nac);
        nuevoEmpleadoFechaAlta($conn,$dni,$id_dpto,$fecha_alta);

        $conn=null;
    }
}
?>
</BODY>
</HTML>