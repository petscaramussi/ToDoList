<?php
define('HOST','127.0.0.1');
define('USUARIO','root');
define('SENHA','');
define('DB','to_do_list');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('não foi posisvel conectar ao banco');