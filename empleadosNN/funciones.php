<?php

//Creamos conexión pasando parámetros de la base de datos y si hay error con el try se muestra el mensaje
function conexion(){
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "empleadosnn";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return $conn; 
}

//Pasando como parametro la conexión con éxito mediante una select contamos las lineas de nombre en departamento para restornar array asociativo con resultados
function numeroDeDepartamentos($conn){
    $stmt = $conn->prepare("SELECT count(nombre) FROM dpto");
    $stmt->execute();

    $arrayAso = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arrayAso = $stmt->fetchAll();
    return  $arrayAso;

   
}
//Por fallo al crear increamento en codigo departamento, creammos función que cuente el numero de departamentos y los almacene en array asociativo
function lineasDpto($conn){
    $stmt = $conn->prepare("SELECT count(nombre) FROM dpto");
    $stmt->execute();

    $arrayAso = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arrayAso = $stmt->fetchAll();
    return $arrayAso;
}

//Una b¡vez contados los departamentos con función contar_dpto() lo recorremos con foreach y añadimos nuevo codigo autoincreamentado con DOOX
function incremDpto($lineas){
    foreach($lineas as $row) {
        $numDpto = $row["count(nombre)"];
    }

        $numDpto++;
        $numDpto=str_pad($numDpto,3,"0",STR_PAD_LEFT);
        $codigoIncreDpto="D".$numDpto;
        return $codigoIncreDpto;

}

//Pasamos por parametro conexión conéxito, el codigo de departamenot y nombre para crear un nuevo departamenot en dpto
function crearNuevoDepartamento($conn, $dpto){
    $stmt = $conn->prepare("INSERT INTO DPTO (nombre) VALUES(:nombre);");     

    $stmt -> bindParam(':nombre',$dpto);

    $stmt->execute();
    echo "<br>";
    echo "Se ha creado el departamento $dpto";
}

//COMPARO NoMBRES DE DPTOs antiguos(array $resultado) con el nuevoNOMBRE(variable $dpto) introducido
function compararNombresDPTOs($conn, $dpto){  //devuelve true si hay un nombre igual
    $stmt = $conn->prepare("SELECT nombre  FROM DPTO");     

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $resultado=$stmt->fetchAll();
    
    //var_dump($resultado);
    for($i = 0; $i < count($resultado); $i++) {
       // var_dump($resultado[$i]["nombre"]);
       $arrayNombres[]= $resultado[$i]["nombre"];
    }
      var_dump($arrayNombres);
      //echo in_array($dpto, $arrayNombres, true);
      if(in_array($dpto, $arrayNombres, true)){
        return true; //hay un nombre repetido encontrado
      }else{
        return false;
      }
      
    
}

//Pasamos como atributo la conexión y mediante una select mostramos valores de codigo de departamento y nombre de la tabla departamento.
//Creamos array asociativo y guardandolo en la variable $arrayAso retornamos el resultado de la función
function verDepartamento($conn){
        $stmt = $conn->prepare("SELECT id_dpto, nombre FROM dpto");
        $stmt->execute();
    
        $arrayAso = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arrayAso = $stmt->fetchAll();

        return $arrayAso;
}

//Listar empleado en función del código de departamento pasado por parametro con la conexxión con exito
function listarEmpleado($conn,$dato){
    $stmt = $conn->prepare("SELECT emple.dni, emple.nombre, emple.salario, emple.fecha_nac
	FROM emple,dpto,emple_dpto WHERE emple_dpto.fecha_fin IS NULL 
    AND emple.dni = emple_dpto.dni_emple AND dpto.id_dpto=emple_dpto.id_dpto
    AND dpto.id_dpto=:idDPTO");
	
	$stmt -> bindParam(':idDPTO',$dato);
    $stmt->execute();

    $arrayAso = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arrayAso = $stmt->fetchAll(); 
    
    return  $arrayAso;
}

//mediante pasar por parámetro la conexión con éxito, mediante select mostramos el dni de empleados y creamos array asociativo con los resultados
function listarDni($conn){
    $stmt = $conn->prepare("SELECT dni FROM emple");
    
    $stmt->execute();

    $arrayAso = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arrayAso = $stmt->fetchAll();
    
    return  $arrayAso;
}

//mostramos salario mediante una vez pasado por parámetro a conexión con éxito y el nuevo dato como dni existente, creamos array asociativo y lo retornamos
function verSalario($conn,$dato){
    $stmt = $conn->prepare("SELECT dni,salario FROM emple WHERE dni=:dniEmp");
    
    $stmt -> bindParam(':dniEmp',$dato);
    $stmt->execute();

    $arrayAso = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arrayAso = $stmt->fetchAll();
    
    return $arrayAso;
}

//Mediante pasar como parámetro la conexión con éxito, el dni y salario mediante update actualizamos el salario en función de su dni
function cambiarSalario($conn,$dni,$salario){
    $stmt = $conn->prepare("UPDATE EMPLE SET salario=:salar WHERE dni=:dniEmp;");
        
    $stmt -> bindParam(':salar',$salario);
    $stmt -> bindParam(':dniEmp',$dni);
    $stmt->execute();
    echo "<br>";
    echo "Salario nuevo de $dni es $salario € ";
}

//Creamos nuevo empleado al pasar todos los parametros de los valores de la tabla EMPLE mediante insert into
function nuevoeEmpleado($conn,$dni,$nombre,$salario,$fecha){
    $stmt = $conn->prepare("INSERT INTO EMPLE (dni,nombre,salario,fecha_nac)
    VALUES(:dni,:nombre,:salario,:fecha_nac);");
    $stmt->bindParam(':dni',$dni);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':salario',$salario);
    $stmt->bindParam(':fecha_nac',$fecha);
    $stmt->execute();
}

//Mediante pasar la conexión y los parametros de la tabla emple_dpto creamos nuevo empleado en emple_dpto con insert into
function nuevoEmpleadoFechaAlta($conn,$dni,$id_dpto,$fecha_inicio){
    $stmt = $conn->prepare("INSERT INTO EMPLE_DPTO (dni_emple,id_dpto,fecha_inicio,fecha_fin)
    VALUES(:dni_emple,:id_dpto,:fecha_inicio, null);");
    $stmt->bindParam(':dni_emple',$dni);
    $stmt->bindParam(':id_dpto',$id_dpto);
    $stmt->bindParam(':fecha_inicio',$fecha_inicio);
    $stmt->execute();
    echo "<br>";
    echo "Empleado con dni $dni dado de alta con éxito en tabla de emple_dpto";
    
}




//mediante pasar como parametro la conexión con exito y el dni del empleado vemos en que departamento está y lo almacenamos en array asociativo que retornamos

function verempleadoConDni($conn,$dato){
    $stmt = $conn->prepare("SELECT dpto.nombre
	FROM emple, dpto,emple_dpto
	WHERE dpto.id_dpto=emple_dpto.id_dpto AND emple_dpto.dni_emple=emple.dni
	AND emple.dni=:dniEmp");

    $stmt -> bindParam(':dniEmp',$dato);   
    $stmt->execute();

    $arrayAso = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arrayAso = $stmt->fetchAll();

    return $arrayAso;
}

//Modificamos con argumentos pasados de conexión, dni y fecha con update en la tabla emple_dpto la fecha fin para modificar otro departamento nuevo

function modificarCambioDpto($conn,$dni,$fecha){
    
    $stmt = $conn->prepare("UPDATE EMPLE_DPTO SET FECHA_FIN = :fecha
    WHERE DNI_EMPLE = :dni;");
    
    $stmt -> bindParam(':dni',$dni);
    $stmt -> bindParam(':fecha',$fecha);
    $stmt->execute();

}

//Terminamos de actualizar el cambio de departamento añadiendo una fecha de inicio y nuevo empleado con dni y su codigo de departamento nuevo
function finalizarCambioDpto($conn,$codigoDpto,$dni,$fechaInicio){
    $stmt = $conn->prepare("INSERT INTO EMPLE_DPTO (ID_DPTO,DNI_EMPLE,FECHA_INICIO,FECHA_FIN)
    VALUES (:id_dpto,:dni_emple,:fecha,NULL);");
        
    $stmt -> bindParam(':id_dpto',$codigoDpto);
    $stmt -> bindParam(':dni_emple',$dni);
    $stmt -> bindParam(':fecha',$fechaInicio);
    $stmt->execute();

    echo "<br>";
    echo "Actualizado departamento de empleado con DNI: $dni a ID $codigoDpto de departamento";
    echo "<br>";
}
?>