<HTML>
<HEAD><TITLE>ALTA DE DEPARTAMENTO</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");  //fichero independiente con funciones
?>

<br>
<h1>ALTA DE DEPARTAMENTO</h1>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nombre del departamento:  <input type="text" name="nuevoDepartamento"><br><br>
    
    <input type="submit" value="Crear DPTO" /> 
</form>

<a href="empleadosnn.php">Volver a Inicio</a>
<?php
 if (!(empty($_POST))) {

    if ($_SERVER["REQUEST_METHOD"]== "POST"){  //SI QUITO ESTO AUN FUNCIONA... O-O
        $conn=conexion();
        $dpto = $_POST["nuevoDepartamento"];
        if(!empty($dpto)){  //Asi no crea departamentos con nombres vacios
            if(compararNombresDPTOs($conn, $dpto)==true){ //si ya existe el nombre, no se da de alta
                echo "ERROR: El nombre ya se encuentra dado de alta. Vuelva a intentarlo por favor";   
                $conn = null;
            }else{
                crearNuevoDepartamento($conn,$dpto);
                $conn = null;
            } 
        }
    } //SI QUITO ESTO AUN FUNCIONA...O-O ASK
}
?>
</BODY>
</HTML