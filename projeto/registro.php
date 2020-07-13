<?php
session_start();
include("tratamentoErros.php");
?>
<html>
<body>
<head>
    <link rel="stylesheet" type="text/css" href="css/registroStyle.css" media="screen" />      
    <title>Registro</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<form action="registra.php" method="POST" class="login-form">
        <h1>Registro</h1>

        <div class="txtb">
          <input name="nome" type="text">
          <span data-placeholder="Nome"></span>
        </div>

        <div class="txtb">
          <input name="usuario" type="text">
          <span data-placeholder="Username"></span>
        </div>

        <div class="txtb">
          <input name="senha" type="password">
          <span data-placeholder="Senha"></span>
        </div>

        <div class="txtb">
          <input name="rsenha" type="password">
          <span data-placeholder="Repetir senha"></span>
        </div>

        <input type="submit" class="logbtn" value="Registrar">


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

<!--<form action="registra.php" method="POST">
    <input name="nome" type="text" placeholder="Nome"><br>
    <input name="usuario" type="text" placeholder="Usuario"><br>
    <input name="senha" type="password" placeholder="senha"><br>
    <input name="rsenha" type="password" placeholder="repetir senha"><br>
    <input type="submit">
</form>
-->
</body>
</html>