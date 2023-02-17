<?php
echo "Inicio index"."<br>";
// Llamada al fichero que inicia la conexión a la Base de Datos
require_once("db/db.php");

// Llamada al controlador
require_once("controllers/login_controller.php");

//require_once("controllers/menu_controller.php");
echo "Fin index"."<br>";
?>