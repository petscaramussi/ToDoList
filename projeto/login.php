<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();    
}
//login authentication
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select idUsuario, usuario, nome from usuario where usuario = '{$usuario}' and senha = md5('{$senha}');";

$result = mysqli_query($conexao, $query);

while($consulta = mysqli_fetch_array($result))
{
    $id = $consulta['idUsuario'];
    $_SESSION['ID'] = $id;
    $nome = $consulta['nome'];
    $_SESSION['nome'] = $nome;
}

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
    exit();
} else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}

