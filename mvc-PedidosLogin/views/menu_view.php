<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE>MENU</TITLE>
</HEAD>
<link rel="stylesheet" href="bootstrap.min.css">
<style>
</style>

<BODY>
    <br>
    <h2>WEB DE PEDIDOS</h2>

    <h3>MENU (pe_inicio.php)</h3>
    <a href="pe_altaped.php">2) Realizar Pedidos </a><br>
    <a href="pe_consped.php">3) Consultar Pedidos Realizados </a><br>
    <a href="pe_consprodstock.php">4) Consultar Stock de un Producto </a><br>
    <a href="pe_constock.php">5) Consultar Stock de una Linea de Producto </a><br>
    <a href="pe_topprod.php">6) Unidades Totales por Producto </a><br>
    <a href="pe_conspago.php">7) Mostrar Pagos </a><br>
    <br>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" value="LOGOUT" name="logout" />
    </form>
</BODY>
</HTML>