<HTML>
<HEAD><TITLE>LISTADO EMPLEADOS</TITLE></HEAD>
<link rel="stylesheet" href="bootstrap.min.css">
<style>

</style>
<BODY>
<?php
    require("funciones.php");
?>

<h3>LISTADO DE EMPLEADOS </h3>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
DEPARTAMENTOS <select name="departamento">
        <?php
        $conn=conexion();
        $dpto= verDepartamento($conn);
        
        foreach($dpto as $row) {
            echo "<option value=".$row["id_dpto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Mostrar empleados" name="enviar" />
</form>

<br>
<a href="empleadosnn.php">Volver a Inicio</a>
<br>
<?php
if(empty($_POST)){}
else{
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
		$depart = $_POST["departamento"];
	}
    //var_dump($dpto);
    var_dump($depart); //los id_dpto
    $conn=conexion();
    $listaEmpleados=listarEmpleado($conn,$depart);
    var_dump($listaEmpleados);
	foreach($listaEmpleados as $row) {
        echo "Datos del Empleado/s: " . $row["dni"]. "-" . $row["nombre"]."-" . $row["salario"]."-" . $row["fecha_nac"]. "<br>";
    }
    $conn = null;
}
?>
</BODY>
</HTML>