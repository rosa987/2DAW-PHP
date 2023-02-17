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
         header("Location: views\login_view.php");//Ir a la pagina del login
         exit();  
    }  
//require_once("views\menu_view.php");    
?>