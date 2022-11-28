<h1>Listado de Empleados por Departamento </h1>
<?php

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnn";

//PDO PHP Database Object

if (!isset($_POST) || empty($_POST)) { 
try {
    //Establecimiento de conexion
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   
 
    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT id, cod_dpto, NOMBRE FROM dpto"); //A partir de VALUES tienen q estar en minusculas o mayus!! CASE SENSITIVE
   
    //$stmt->bindParam(':nombre', $nombre);
  
    // Ejecución de la sentencia
    $stmt->execute();
      
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $resultado=$stmt->fetchAll();
    var_dump($resultado);  //BIEN
    $departamentos = array();
  
    $departamentos[] = $resultado['NOMBRE'];
   
   
    var_dump($departamentos);
    
    echo '<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">';
    
    ?>
    <div>
	<label for="departamento">Departamentos:</label>
	<select name="departamento">
		<?php foreach($departamentos as $departamento) : ?>
			<option> <?php echo $departamento ?> </option>
		<?php endforeach; ?>
	</select>
	</div>
	</BR>

<?php 

echo '<div><input type="submit" value="Mostrar Departamentos"></div></form>';
    }

    catch(PDOException $error)
    {
    echo "Error: " . $error->getMessage();
    }
    //Cerrar la conexión
$conn = null;
}



?>