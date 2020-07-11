<?php
session_start();
include('verifica_login.php');
?>

<h2>Ola, <?php echo $_SESSION['nome']; ?> </h2>
<h2><a href="logout.php">Sair</a></h2>
<p>ID do usuario:  <?php echo $_SESSION['ID']; ?> </p> 