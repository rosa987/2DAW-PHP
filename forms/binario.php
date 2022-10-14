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
$binario= $_POST['binario'];

function DecimalAbinario($decimal)
{
    return $binario=decbin($decimal);
}

//Llamo a la funcion
echo DecimalAbinario($decimal);

/*
<form>
  <label for=$decimal>Numero Decimal:</label>
  <input type="number" id="decimal" name="decimal" value="" readonly><br>
  <br>
  <label for=$binario>Numero Binario:</label>
  <input type="number" id="decimal" name="decimal" value="" readonly><br>
  <br>
  
  
</form> 
*/
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</p> 
</body>
</html>