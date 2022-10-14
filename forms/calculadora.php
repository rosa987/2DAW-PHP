<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CALCULADORA</title>
</head>
<body>
<h2>CALCULADORA</h2>
<p>Resultado operación: 
<?php
$op1 = test_input($_POST['op1']);
$op2 = test_input($_POST['op2']);
$operador = $_POST["operacion"];
/*echo $op1 , $op2, $operador; */
switch($operador)
{
    case "Suma":
    echo $op1, " + ", $op2," = ", $op1 + $op2;
    break; 
    case "Resta":
    echo $op1, " - ", $op2," = ", $op1 - $op2;
    break;
    case "Producto":
    echo $op1, " * ", $op2," = ", $op1 * $op2;
    break; 
    case "Division":
    echo $op1, " / ", $op2," = ", $op1 / $op2;
    break;
}

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