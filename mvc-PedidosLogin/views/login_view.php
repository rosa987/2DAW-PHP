<!DOCTYPE html>
<HTML>
<HEAD><TITLE>LOGIN DE CLIENTES</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<br>
<h1>LOGIN DE CLIENTES (pe_login.php)</h1>
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    USUARIO <input type="text" name="username"><br><br>
    PASSWORD <input type="text" name="password"><br><br>
    
    <input type="submit" value="LOGIN" /> 
</form>
</BODY>
</HTML>