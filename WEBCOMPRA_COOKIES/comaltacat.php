<HTML>
<HEAD><TITLE>ALTA DE CATEGORIAS</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");  //fichero independiente con funciones
?>

<br>
<h1>ALTA DE CATEGORIA</h1>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nombre del categoria:  <input type="text" name="nuevaCategoria"><br><br>
    
    <input type="submit" value="Dar alta CATEGORIA" /> 
</form>

<a href="comprasWeb.php">Volver a Inicio</a>
<?php
 if (!(empty($_POST))) {

    if ($_SERVER["REQUEST_METHOD"]== "POST"){  //SI QUITO ESTO AUN FUNCIONA... O-O
        $conn=conexion();
        $contarCategorias= contarNombresCategoria($conn);
        var_dump($contarCategorias);
        $incre=incremCategoria($contarCategorias); //el incremento del ID
        var_dump($incre);
        $new_categoria = $_POST["nuevaCategoria"]; //nombre de categoria
        if(!empty($new_categoria)){  //Asi no crea categorias con nombres vacios
            if(compararNombresCATEGORIAS($conn, $new_categoria)==true){ //si ya existe el nombre, no se da de alta
                echo "ERROR: El nombre ya se encuentra dado de alta. Vuelva a intentarlo por favor";   
                $conn = null;
           }else{
                nueva_Categoria($conn, $incre, $new_categoria); //crear new Categoria
                $conn = null;
           } 
        }
    } //SI QUITO ESTO AUN FUNCIONA...O-O ASK
}
?>
</BODY>
</HTML>