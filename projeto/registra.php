<?php
session_start();
include("conexao.php");

//tratamento de erros
if(empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['rsenha'])){
    $_SESSION['branco'] = true;
    header("LOCATION: registro.php");
    exit; 
}

if(strlen($_POST['senha'])<6){
    $_SESSION['menor'] = true;
    header("LOCATION: registro.php");
    exit; 
}

if($_POST['rsenha'] != $_POST['senha']){
    $_SESSION['senha_diferente'] = true;
    header("LOCATION: registro.php");
    exit;
}

//inserção no banco de dados
$nome = mysqli_real_escape_string($conexao,trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao,trim(md5($_POST['senha'])));
$rsenha = mysqli_real_escape_string($conexao,trim(md5($_POST['rsenha'])));



$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao,$sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('location:registro.php');
    exit;
}
$sql = "INSERT INTO usuario (usuario,senha,nome,horario) VALUES ('$usuario','$senha','$nome',NOW())";

if($conexao->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;
}
$conexao->close();

header('location: registro.php');
exit;
?>