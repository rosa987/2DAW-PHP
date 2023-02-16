<?php
echo "Inicio controller"."<br>";
//Llamada al modelo -- Intermediario entre vista y modelo !!!
require_once("models/peliculas_model.php");

if (!isset($_COOKIE["customerNumber"])){
        header("Location: pe_login.php");
                    exit();
    }
?>
<?php
if (isset($_POST["logout"])){
    //BORRAR COOKIE carrito 
    if (isset($_COOKIE['carrito'])) { 
       unset($_COOKIE['carrito']); 
       setcookie('carrito', '', time() - 3600); 
     }
     //BORRAR COOKIE customerNumber 
     if(isset($_COOKIE["customerNumber"])){			
       setcookie('customerNumber', '', time() - 3600); 
     }
     header("Location: pe_login.php");//Ir a la pagina del login
     exit();  
}
?>
