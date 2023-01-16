<HTML>
<HEAD><TITLE>REGISTRO DE CLIENTES</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");  //fichero independiente con funciones
?>

<br>
<h1>REGISTRO DE CLIENTES (comregcli.php)</h1>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    NIF <input type="text" name="nif"><br><br>
    Nombre <input type="text" name="nombre"><br><br>
    Apellido <input type="text" name="apellido"><br><br>
    CP <input type="text" name="cp"><br><br>
    Direccion <input type="text" name="direccion"><br><br>
    Ciudad  <input type="text" name="ciudad"><br><br>
    
    <input type="submit" value="REGISTRAR a CLIENTE" /> 
</form>

<a href="comprasWeb.php">Volver a Inicio</a>
<?php
 if (!(empty($_POST))) {

    if ($_SERVER["REQUEST_METHOD"]== "POST"){  //SI QUITO ESTO AUN FUNCIONA... O-O
        $conn=conexion();
        
        $nif = $_POST["nif"]; 
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cp = $_POST["cp"];
        $direccion = $_POST["direccion"];
        $ciudad = $_POST["ciudad"];
        if(!empty($nif) && !empty($nombre) && !empty($apellido)){  //nif, nombre, apellido no puede estar vacio
            if(compararNIFs($conn, $nif)==true){ //si ya existe el nombre, no se da de alta
                echo "ERROR: El NIF ya se encuentra dado de alta. Vuelva a intentarlo por favor";   
                $conn = null;
            }elseif(validarNIF($nif)==false){//si el NIF es invalido
                echo "ERROR: El NIF es invalido. Vuelva a intentarlo por favor";   
                $conn = null;

            }else{
                registrar_cliente($conn, $nif, $nombre, $apellido, $cp, $direccion, $ciudad);
                $conn = null;
                //nuevo_Cliente($conn, $nif, $nombre, $apellido, $cp, $direccion, $ciudad); //crear nuevo Cliente
                //registrar_Usuario($conn,$nombre, $apellido);//asignar un nombre de usuario y clave a un Cliente
                //insertar_UsuarioEnCLIENTE($conn, $nombre, $nif);
                
            } 
        }else{
            echo "<br>";
            echo "ERROR. NIF, NOMBRE Y APELLIDO no pueden estar vacios!!";
        }
    } //SI QUITO ESTO AUN FUNCIONA...O-O ASK

}

?>
</BODY>
</HTML>