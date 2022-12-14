<HTML>
<HEAD><TITLE>MODIFICAR SALARIO</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>
<h1>MODIFICAR SALARIO</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Seleccionar un DNI: <select name="emple">
    <?php
        $conn=conexion();
        $listarDni=listarDni($conn);
        foreach($listarDni as $row) {
            echo "<option value=".$row["dni"].">". $row["dni"]. "</option>";
        }
        $conn = null;
    ?>
</select>
<input type="submit" value="Ver salario Actual" name="VerSalarioActual" /><br><br>



<?php
if(empty($_POST)){}
else if (isset($_POST["VerSalarioActual"])){
        $dni = $_POST["emple"];

    var_dump($dni);
    $conn=conexion();
    $salario = verSalario($conn,$dni);

    foreach($salario as $row) {
        echo "<br>Salario Actual de $dni es: ". $row["salario"]. " €<br>";
    }
    $conn = null;
}
?>




Nuevo Salario <input type="text" name='nuevoSalario'>
<input type='submit' value='Modificar Salario' name='VerSalarioNuevo' />
</form>
<br>
<a href="empleadosnn.php">Volver a Inicio</a>
<br>


<?php
if(empty($_POST)){}
else if(isset($_POST["VerSalarioNuevo"])){
        $dni=$_POST["emple"];
        $salario = $_POST["nuevoSalario"];

    if($salario==""){
        echo "ERROR. No has introducido todos los datos";
    }else{
        $conn=conexion();
        cambiarSalario($conn,$dni,$salario);
    
        $conn = null;
    }   
}

?>
</BODY>
</HTML>