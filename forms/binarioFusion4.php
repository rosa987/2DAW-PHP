<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CONVERSOR BINARIO</title>
</head>
<body>

<h2>CONVERSOR BINARIO</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <label for="decimal">Numero Decimal:</label>
  <input type="number" id="decimal" name="decimal" value=""><br>
  <br>
  
  <input type="submit" value="enviar">
   <input type="reset" value="borrar">
</form> 

</body>
</html>


<?php
//Defino variable decimal
$decimal = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $decimal = test_input($_POST["decimal"]);
  }
function DecimalAbinario($decimal)
{
    return $binario=decbin($decimal);
}
echo "<br>";
//Llamo a la funcion
echo "El numero decimal ". $decimal." en binario es: ";
echo DecimalAbinario($decimal);


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
