<HTML>
<HEAD><TITLE>CAMBIO DE DEPARTAMENTO</TITLE></HEAD>
<style>

</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>
<h2>CAMBIO DE DEPARTAMENTO</h2>
<h1>Consultar Empleado</h1>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
SELECCIONA UN DNI DE EMPLEADO: <select name="dpto">
<?php
        $conn=conexion();
        $listarDni=listarDni($conn);
        foreach($listarDni as $row) {
            echo "<option value=".$row["dni"].">". $row["dni"]. "</option>";
        }
        $conn = null;
?>
</select>
<input type='submit' value='Ver dpto actual' name='VerDPTOactual' />


<?php
if(empty($_POST)){}
else if (isset($_POST["VerDPTOactual"])){
        $dni = $_POST["dpto"];
       
        var_dump($dni);
        $conn=conexion();
        $listaDepartamento=verempleadoConDni($conn,$dni);

        foreach($listaDepartamento as $row) {
            echo "<br>Lista de departamentos: ". $row["nombre"]. "<br>";
        }
    
         $conn = null;
    }
    ?> 
      

    <br>
    <h1>Modificar Departamento</h1>
    Departamentos: <select name='dpto2'>";
    <?php
            $conn=conexion();
            $dpto=verDepartamento($conn);
            foreach($dpto as $row) {
                   echo "<option value=".$row["id_dpto"].">". $row["nombre"]. "</option>";
            }
            $conn = null;
     ?>
       </select>
       


      
<br>
<br>
Fecha Actual <input type="text" name='fecha' placeholder='xxxx-xx-xx'> <br> <br>
        <input type='submit' value='Cambiar DPTO' name='CambiarDPTO' />
    </form>
<br>
<a href="empleadosnn.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
        else if (isset($_POST["CambiarDPTO"])){
        $dni=$_POST["dpto"];
        $dptoNuevo = $_POST["dpto2"];
        $fecha = $_POST["fecha"];

        if($fecha==""){
            echo "<br>";
            echo "Fecha introducida errónea";
        }else{
            $conn=conexion();
            modificarCambioDpto($conn,$dni,$fecha);
            finalizarCambioDpto($conn,$dptoNuevo,$dni,$fecha);
            $conn = null;
            
        }
    } 
?>
</BODY>
</HTML>