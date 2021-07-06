
<?php
if(!isset($_SESSION["nome"])){
        header('Location: ?pg=login/formulario');
    }
    $sqlTimes = "SELECT * FROM time t";
    $resultTimes = $conn->query($sqlTimes, PDO::FETCH_ASSOC);

    if(!empty($_POST)){
        echo("adsuhfduahfdu");
        $nome = $_POST["nome"];
        $posicao = $_POST["posicao"];        
        $idade = $_POST["idade"];
        $time =  $_POST["time"];

        $extensao = strtolower(substr($_FILES["foto"]['name'], -4)); //pega a extensao do arquivo
        $pasta="arquivos/";
        $nome_arquivo = md5(time()) . $extensao; //define o nome do arquivo
        $pasta=dirname(__DIR__)."/".$pasta.$nome_arquivo;
        
        $caminho = "paginas/arquivos/".$nome_arquivo;
        move_uploaded_file($_FILES['foto']['tmp_name'], $pasta);        
        # Insert no banco de dados
        $stmt = $conn->prepare("INSERT INTO jogador (nome, posicao, idade, id_time, foto) VALUES (:nome, :posicao, :idade, :time, :foto)");

        $bind_param = ["nome" => $nome, "posicao" => $posicao, "idade" => $idade, "time" => $time, "foto" => $caminho];

        try {
            $conn->beginTransaction();
            $stmt->execute($bind_param);
            echo '<div class="alert alert-success" role="alert">
                    inserido com sucesso!
                </div>';
            $conn->commit();
        } catch(PDOExecption $e) {
            $conn->rollback();
            echo '<div class="alert alert-danger" role="alert">Erro ao inserir no banco: ' . $e->getMessage() . '</div>';
        }
                
        ?>
        <!-- <script>
            setTimeout(function() {
                window.location.href = "?pg=area_restrita";
            }, 1000);
        </script> -->
        <?php
        // header('Location: ?pg=cruds/listar');

    }


?>
<form method="POST" id="contactForm" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome Jogador:</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome Jogador...">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Idade:</label>
        <input type="" class="form-control" name="idade" placeholder="Idade do jogador...">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Posição que joga:</label>
        <input type="text" class="form-control" name="posicao" placeholder="Meio campo, Lateral....">
    </div>

    <select class="form-select" name="time">
        <label for="exampleFormControlInput1" class="form-label">time:</label>
        <option selected value="">Selecionar time</option>
        <?php
            while($linha = $resultTimes->fetch()){
        ?>
            <option value="<?= $linha["id"] ?>"><?= $linha["nome"] ?></option>
        <?php 
            } 
        ?>
    </select>

    <div class="mb-3">
        <label for="formFile" class="form-label">Imagem Jogador</label>
        <input class="form-control" name="foto" type="file" id="formFile">
    </div>

    <br>
    <button class="btn btn-dark btn-xl" id="submitButton" type="submit">Enviar</button>
</form>
