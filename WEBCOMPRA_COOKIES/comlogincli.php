<HTML>
<HEAD><TITLE>LOGIN DE CLIENTES</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");  //fichero independiente con funciones
?>

<br>
<h1>LOGIN DE CLIENTES (comlogincli.php)</h1>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    USUARIO <input type="text" name="username"><br><br>
    CLAVE <input type="text" name="password"><br><br>
    
    <input type="submit" value="LOGIN" /> 
</form>

<a href="comprasWeb.php">Volver a Inicio</a>
<?php

 if (!(empty($_POST))) {

    if ($_SERVER["REQUEST_METHOD"]== "POST"){  //SI QUITO ESTO AUN FUNCIONA... O-O
        $conn=conexion();
        
        $username = $_POST["username"]; 
        $password = $_POST["password"];
       
        if(!empty($username) && !empty($password)){  //username y password no puede estar vacios
            
            if(loginCliente($conn, $username, $password)==false){ //Login fallido
                 echo "ERROR. La CLAVE no coincide con el USUARIO. Vuelva a intentarlo";
                $conn = null;
            }else{//Login con exito.  La CLAVE Si coincide con el USUARIO . CREAR COOKIE
                $cookie_name = "nif";
                $cookie_value = extraerNIF($conn, $username);
                setcookie($cookie_name, $cookie_value, time()+60*60*24*30, "/");

                echo "<br>";
                echo '<a href="comprocli.php">COMPRA DE PRODUCTOS</a><br>';
                echo '<a href="comconscli.php">CONSULTA DE COMPRAS</a>';
            }
            
        }else{
            echo "<br>";
            echo "ERROR. USUARIO Y/O CLAVE no pueden estar vacios!!";
        }
    } //SI QUITO ESTO AUN FUNCIONA...O-O ASK

}

?>
</BODY>
</HTML>