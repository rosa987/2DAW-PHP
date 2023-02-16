<?php
echo "Inicio modelo"."<br>";

// Modelo contiene la lógica de la aplicación: clases y métodos que se comunican
// con la Base de Datos


function loginCliente( $username, $password){  //devuelve true si hay un username que coincide
	global $conexion;
    $stmt = $conexion->prepare("SELECT customerNumber, contactLastName  FROM customers WHERE customerNumber=:username;");     

    $stmt -> bindParam(':username',$username);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $resultado=$stmt->fetchAll();
    
   // var_dump($resultado);
    if(empty($resultado)){ //Si la tabla/array esta vacia
       echo "Nombre de USUARIO erróneo. Vuelva a intentarlo por favor";
    }else{
       // var_dump($resultado);
     
        for($i = 0; $i < count($resultado); $i++) {
            // var_dump($resultado[$i]["nombre"]);
            $arrayClave[]= $resultado[$i]["contactLastName"];
         }
           //var_dump($arrayClave);
           if(in_array($password, $arrayClave, true)){
             return true; //el usuario coincide con su password. SI es un usuario registrado
           }else{
             return false; //NO coincide el usuario con su password correspondiente
           }    
    }     
}
echo "Fin modelo"."<br>";
?>