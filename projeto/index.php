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
    <link rel="stylesheet" type="text/css" href="css/loginStyle.css" media="screen" />
    <title>Project</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
<form action="login.php" method="POST" class="login-form">
        <h1>Login</h1>

        <div class="txtb">
          <input name="usuario" type="text">
          <span data-placeholder="Username"></span>
        </div>

        <div class="txtb">
          <input name="senha" type="password">
          <span data-placeholder="Password"></span>
        </div>

        <input type="submit" class="logbtn" value="Login">

        <div class="bottom-text">
          Ainda não tem uma conta? <a href="registro.php">Registrar</a>
        </div>

      </form>

      <script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>

    
</body>
</html>