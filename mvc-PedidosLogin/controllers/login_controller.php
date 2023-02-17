<?php
echo "Inicio controller"."<br>";
//Llamada al modelo -- Intermediario entre vista y modelo !!!
include_once("models/login_model.php");

if (!(empty($_POST))) {

   if ($_SERVER["REQUEST_METHOD"]== "POST"){ 
       
       $username = $_POST["username"]; 
       $password = $_POST["password"];
      
       if(!empty($username) && !empty($password)){  //username y password no puede estar vacios
           
           if(loginCliente( $username, $password)==false){ //Login ERRÓNEO
                echo "[!]ERROR. El PASSWORD no coincide con el USUARIO. Vuelva a intentarlo";
               $conn = null;
           }else{//Login con exito.  El PASSWORD Si coincide con el USUARIO . CREAR COOKIE y redireccionar al menu
               $conn = null;
               $cookie_name = "customerNumber";
               $cookie_value = $username;
               setcookie($cookie_name, $cookie_value, time()+60*60*24*30);
               echo "<br>";
               header("Location: views/menu_view.php");
               exit();    
           }            
       }else{
          
           echo "<br>";
           echo "ERROR. USUARIO Y/O CLAVE no pueden estar vacios!!";
       }
   } 
}
//
include_once("views/login_view.php");
echo "FIN controller"."<br>";
?>