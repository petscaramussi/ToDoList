<?php
if(isset($_POST['title'])){

	require '../db_conn.php';
	
    $title = $_POST['title'];
	$id = $_POST['id_usuario'];
	
    if(empty($title)){
        header("Location: ../painel.php?mess=error");
    }else {
    $stmt = $conn->prepare("INSERT INTO todos(title,idUsuario) VALUES('{$title}',{$id})");
	$res = $stmt->execute();
        if($res){
            header("Location: ../painel.php?mess=success"); 
        }else {
            header("Location: ../painel.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../painel.php?mess=error");
}
