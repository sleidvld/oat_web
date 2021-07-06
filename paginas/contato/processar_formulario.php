<?php

if(!empty($_POST)){
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];    
    $mensagem = $_POST["mensagem"];

    # Insert no banco de dados
    $stmt = $conn->prepare("INSERT INTO contato (nome,  email, mensagem) VALUES (:nome,  :email, :mensagem)");

    $bind_param = ["nome" => $nome,  "email" => $email, "mensagem" => $mensagem];

    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro ' . $conn->lastInsertId() . ' inserido no banco!</div>';
        $conn->commit();
    } catch(PDOExecption $e) {
        $conn->rollback();
        echo '<div class="msg-cadastro-contato msg-cadastro-erro">Erro ao inserir registro no banco: ' . $e->getMessage() . '</div>';
    }

}

$sql = "SELECT co.id, co.nome, co.telefone, co.email, co.mensagem, uf.sigla AS estado, ci.nome AS cidade, DATE_FORMAT(co.data_hora, '%d/%m/%Y %H:%i:%S') AS data_hora
        FROM contatos co 
        INNER JOIN cidades ci ON ci.id = co.cidade_id 
        INNER JOIN estados uf ON uf.id = ci.estado_id
        ORDER BY co.id DESC";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Mensagem</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Data/Hora</th>
    </tr>
    <?php
        while($linha = $result->fetch()){
    ?>
        <tr>
            <?php 
                foreach($linha as $chave => $valor){
            ?>
                <td><?= $valor ?></td>
            <?php
                }
            ?>
        </tr>
    <?php
        }
    ?>
</table>

<div id="btn-limpar-sessao">
    <a href="?pg=contato/formulario">Voltar</a>
</div>