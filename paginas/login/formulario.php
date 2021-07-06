<?php

if(isset($_SESSION["nome"])){
    header("Location: ?pg=area_restrita");
}

?>


    
    <h1>Login</h1>

    <form method="POST" action="?pg=login/processar_formulario">        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="usuario" id="exampleFormControlInput1"  required placeholder="Digite seu usuário...">
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input class="form-control" type="password" name="senha" required placeholder="Digite sua senha..." />
        </div>
        <button type="submit">Enviar</button>
    </form>
    
