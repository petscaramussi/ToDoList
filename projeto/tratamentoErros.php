<?php

//tratamento para usuario ou senha invalido
if(isset($_SESSION['nao_autenticado'])):
        echo"<p style='color:red'> Erro, usuario ou senha invalido</p>";
    endif;
    unset($_SESSION['nao_autenticado']);

//tratamento para senhas curtas
if(isset($_SESSION['menor'])):
    echo"<p style='color:red'> A senha deve conter pelo menos 6 caracteres.</p>";
endif;
unset($_SESSION['menor']);

//tratamento para campos em brancos
if(isset($_SESSION['branco'])):
    echo"<p style='color:red'> Não é permitido deixar nenhum campo em branco</p>";
endif;
unset($_SESSION['branco']);

//tratamento para senhas diferentes
if(isset($_SESSION['senha_diferente'])):
    echo"<p style='color:red'> As senhas não coincidem.</p>";
endif;
unset($_SESSION['senha_diferente']);

//tratamento para usuario já existente
if(isset($_SESSION['usuario_existe'])):
    echo"<p style='color:red'> Erro, o usuario já existe.</p>";
endif;
unset($_SESSION['usuario_existe']);

//mensagem de sucesso
if(isset($_SESSION['status_cadastro'])):
    echo"<p style='color:green;'>cadastrado com sucesso</p>
    <a href='index.php'>ir para login</a>";
endif;
unset($_SESSION['status_cadastro']);

?>