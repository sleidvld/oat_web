
<?php
if(!isset($_SESSION["nome"])){
        header('Location: ?pg=login/formulario');
    }
    $sql = "SELECT j.id, j.nome, j.idade, j.posicao, t.nome as nome_time, j.foto FROM jogador j INNER JOIN time t on t.id = j.id_time ";
    $result = $conn->query($sql, PDO::FETCH_ASSOC);

    $sqlTimes = "SELECT * FROM time t";
    $resultTimes = $conn->query($sqlTimes, PDO::FETCH_ASSOC);
    if(!empty($_POST)){
        $nome = $_POST["nome"];
        $posicao = $_POST["posicao"];        
        
        $time =  $_POST["time"];
        
        if($nome != "" or $posicao != "" or $time != ""){
            $sql = "SELECT j.id, j.nome, j.idade, j.posicao, t.nome as nome_time,j.foto FROM jogador j INNER JOIN time t on t.id = j.id_time  WHERE j.nome LIKE '%".$nome."%' OR j.posicao LIKE '".$posicao."' OR j.id_time = '".$time."'";
        }

        # Insert no banco de dados        
        $result = $conn->query($sql, PDO::FETCH_ASSOC);
        
        }              
?>
        
    <div>
    <form method="POST" id="contactForm">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome Jogador:</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome Jogador...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Posição que joga:</label>
            <input type="text" class="form-control" name="posicao" placeholder="Meio campo, Lateral....">
        </div>

        <select class="form-select" name="time">
            <option selected value="">Selecionar time</option>
            <?php
                while($linha = $resultTimes->fetch()){
            ?>
                <option value="<?= $linha["id"] ?>"><?= $linha["nome"] ?></option>
            <?php 
                } 
            ?>
        </select>
        <br>
        <button class="btn btn-dark btn-xl" id="submitButton" type="submit">Enviar</button>
    </form>
    </div>
    <div class=" row col-mb-12 col-lg-12 col-sm-12">
            <?php
                    while($linha = $result->fetch()){
                ?>                    
                    <div class="card col-mb-3 col-lg-3 col-sm-3" style="width: 18rem;">
                        <img src="<?=$linha["foto"]?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?=$linha["nome"]?> </h5>
                            <p class="card-text">Idade: <?=$linha["idade"]?><br> Posição:<?=$linha["posicao"]?></p>
                        </div>
                    </div>
                                            
                <?php
                    }
                ?>
            </tbody>
        </table> 
    
    </div>