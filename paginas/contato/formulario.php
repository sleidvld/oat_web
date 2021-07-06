
<div id="div-form">
    
    <h1>Formulário de Contato</h1>

    <form method="POST" action="?pg=contato/processar_formulario">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome Jogador:</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome Jogador...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome Jogador:</label>
            <input type="email" class="form-control" name="email" placeholder="Nome Jogador...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mensagem</label>
            <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Enviar</button>
    </form>
    
<div>