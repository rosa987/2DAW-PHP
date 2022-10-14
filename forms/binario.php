<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CONVERSOR BINARIO</title>
</head>
<body>
<h2>CONVERSOR BINARIO</h2>
<p>Resultado operación: 

<?php
$decimal =  test_input($_POST['decimal']);
function DecimalAbinario($decimal)
{
    return $binario=decbin($decimal);
}

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
<form>

 <label for="decimal">Numero Decimal:</label>
 
  <input type="text" id="decimal" name="decimal" value="<?php echo htmlspecialchars($decimal); ?>" ><br>
  <br>
  <label for="binario">Numero Binario:</label>
  <input type="text" id="binario" name="binario" value="<?php echo htmlspecialchars(DecimalAbinario($decimal)); ?>" ><br>
  <br>
</form>
</p> 
</body>
</html>