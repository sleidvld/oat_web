<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require("bd/conexao.php");

?>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Futebol Sereno</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand"  href="#">Futebol Sereno</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?pg=inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?pg=contato/formulario">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?pg=sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?pg=cruds/listar_jogador">Listar Jogadores</a>
                    </li>
                    <?php 
                        if(!isset($_SESSION["nome"])){
                    ?>
                        <a href="?pg=login/formulario" class="nav-link"><li class="nav-item">Login</li></a>
                    <?php
                        }
                        else{
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="?pg=cruds/cadastrar_jogador" >Cadastrar Jogador</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Sair</a>
                        </li>
                    <?php
                        }
                    ?>
                    
                    

                </ul>
                
            </div>
        </div>
    </nav>

        <div class="container">
                
            <header>
                <h1>Futebol Para todos</h1>
            </header>


            <main>
                <?php
                    /* Operador ternário para verificar se o pg está setado no GET e não está vazio
                        Caso verdadeiro: usa o valor do GET["pg"]
                        Caso falso: usa o valor "inicio"
                    */
                    $pg = (isset($_GET["pg"]) && !empty($_GET["pg"])) ? $_GET["pg"] : "inicio";
                    
                    $id = (isset($_GET["id"]) && !empty($_GET["id"]));

                    if(isset($id)){
                        include("paginas/".$pg.".php");
                    }
                    else{                        
                        include("paginas/".$pg.".php?id=".$id);
                    }
                    

                ?>

            </main>

            <footer>
            <br>
            <br>
                <h4>@ Projeto Web, Luiz Henrique, Site para Montar times de futebol. 2021</h4>
            </footer>

        </div>

    </body>
    
</html>