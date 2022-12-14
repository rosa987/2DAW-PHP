<HTML>
<HEAD><TITLE>ALTA DE ALMACENES</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");  //fichero independiente con funciones
?>

<br>
<h1>Alta de Almacenes (comaltaalm.php)</h1>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nombre de la localidad:  <input type="text" name="nuevaLocalidad"><br><br>
    
    <input type="submit" value="Dar alta ALMACEN" /> 
</form>

<a href="comprasWeb.php">Volver a Inicio</a>
<?php
 if (!(empty($_POST))) {

    if ($_SERVER["REQUEST_METHOD"]== "POST"){  //SI QUITO ESTO AUN FUNCIONA... O-O
        $conn=conexion();
        $new_localidad = $_POST["nuevaLocalidad"]; //nombre de categoria
        if(!empty($new_localidad)){  //Asi no crea localidades con nombres vacios
                nuevo_Almacen($conn, $new_localidad); //crear new ALMACEN
                $conn = null;
           
        }
    } //SI QUITO ESTO AUN FUNCIONA...O-O ASK
}
?>
</BODY>
</HTML>