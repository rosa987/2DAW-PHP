<h1>ALTA DPTO </h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

<div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header"><B>Formulario PHP y BASE de DATOS</B> </div>
		<div class="card-body">
 <!--<B>Código departamento: </B><input type='text' name='cod_dpto' value='' size=25><br><br> -->
<B>Nombre departamento: </B><input type='text' name='nom_dpto' value='' size=25><br><br> 

<B>Pulsa para Enviar formulario: 

<div>
	<input type="submit" value="Enviar" name="enviar" class="btn btn-warning disabled">
</div>	

</FORM>


<?php

if (!(empty($_POST))) { 
//Recogida parametros
   //$cod_dpto = $_POST["cod_dpto"];
    $nombre = $_POST["nom_dpto"];
/*Inserción en tabla Prepared Statement- mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnn";

//PDO PHP Database Object
try {
    //Establecimiento de conexion
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO dpto (nombre) VALUES (:nombre)");
   
    $stmt->bindParam(':nombre', $nombre);
  
    // Ejecución de la sentencia
    $stmt->execute();
       echo "Alta departamento ". $nombre . " con codigo Correcto";

    
    }
catch(PDOException $error)
    {
    echo "Error: " . $error->getMessage();
    }
    //Cerrar la conexión
$conn = null;
}
?>
