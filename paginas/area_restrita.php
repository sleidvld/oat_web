<?php

if(!isset($_SESSION["nome"])){
    header('Location: ?pg=login/formulario');
}

?>

<h1>Área restrita</h1>

<p>Bem-vindo(a), <?= $_SESSION["nome"] ?>!</p>

<div id="btn-limpar-sessao">
    <a href="?pg=cruds/cadastrar_jogador">Listar usuários</a>
</div>

<div id="btn-limpar-sessao">
    <a href="?pg=login/limpar_sessao">Sair</a>
</div>