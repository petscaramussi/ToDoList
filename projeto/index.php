<?php
session_start();
include("tratamentoErros.php");
if(isset($_SESSION['usuario'])){
    header('location: painel.php');
    exit();
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/loginStyle.scss" media="screen" />
    <title>Project</title>
</head>
<body>
    <form class="box" action="login.php" method="POST" autocomplete="off">
        <h3>LOGIN</h3>
        <input name="usuario" type="text" placeholder="Usuario">
        <input name="senha" type="password" placeholder="******">
        <input type="submit" value="Login"> 
    </form>
    <a href="registro.php">Registrar</a>
</body>
</html>