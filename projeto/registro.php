<?php
session_start();
include("tratamentoErros.php");
?>
<html>
<body>
<head>  
    <title>Registro</title>
<form action="registra.php" method="POST">
<input name="nome" type="text" placeholder="Nome"><br>
<input name="usuario" type="text" placeholder="Usuario"><br>
<input name="senha" type="password" placeholder="senha"><br>
<input name="rsenha" type="password" placeholder="repetir senha"><br>
<input type="submit">
</form>

</body>
</html>