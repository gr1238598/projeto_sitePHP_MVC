<?php
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["login"])) {
    echo "<script>alert('Você deve estar logado para abrir esta página');</script>";
    header("refresh:0;url=/devWeb2021_03/visao/aluno/buscarAluno.php");
}
?>

<html>

<head>
    <title>Dev Web 2</title>

    <link rel="stylesheet" href="/devWeb2021_03/recursos/bootstrap-4.1/css/bootstrap.min.css">
    <script src="/devWeb2021_03/recursos/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="/devWeb2021_03/recursos/bootstrap-4.1/js/popper.min.js"></script>
    <script src="/devWeb2021_03/recursos/bootstrap-4.1/js/bootstrap.min.js"></script>
    <script src="/devWeb2021_03/recursos/jquery/jquery.min.js"></script>

    <script>
        function povoarCidade() {
            let nome = document.getElementById("estadoorigem").value;
            $.ajax({
                url: "/devWeb2021_03/repositorio/cidade/buscarCidades.php",
                data: "estado=" + nome,
                type: "POST",
                dataType: "html"
            }).done(function(resposta) {
                $('#cidadeorigem').html(resposta);
            }).fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            }).always(function() {
                console.log("completou");
            });
        }
    </script>
</head>
</head>

<body>
    <?php include("../layout/menu.php") ?>

    <div class="container">
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4>Editar Aluno</h4>
                <form method="POST" action="/devWeb2021_03/repositorio/aluno/editarAluno.php">
                    <?php
                    try {
                        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                    } catch (PDOException $e) {
                        die("Não foi possível conectar. " . $e->getMessage());
                    }
                    try {
                        if ($_POST) {
                            if (!empty($_POST['idPessoa'])) {
                                $sql = "SELECT * FROM pessoa where \"idPessoa\" = '" . $_POST['idPessoa'] . "'";
                            }
                        } else {
                            echo "<script>alert('Não foi possível encontrar o Aluno!');</script>";
                            header("refresh:0;url=/devWeb2021_03/visao/aluno/buscarAluno.php");
                        }
                        $resultado = $pdo->query($sql);
                        $row = $resultado->fetch();
                    ?>
                        <input type="hidden" name="idPessoa" value="<?php echo $row['idPessoa']; ?>" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomeID">Nome</label>
                                <input type="text" value="<?php echo $row['nome']; ?>" class="form-control" onclick="mudarCorInput()" name="nome" id="nomeID" placeholder="Fulano de tal">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cpf">CPF</label>
                                <input type="number" value="<?php echo $row['cpf']; ?>" class="form-control" name="cpf" id="inputPassword4">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sexoID">Sexo</label>
                                <select name="sexo" value="<?php echo $row['sexo']; ?>" id="sexoID" class="form-control">
                                    <option value="m" selected>Masculino</option>
                                    <option value="f">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                           

                        <div class="form-group col-md-4">
                                <label for="raID">RA</label>
                                <input type="number" value='<?php echo $row['ra']; ?>' class="form-control" name="ra" id="raID">
                                
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cepID">CEP</label>
                                <input type="number" value="<?php echo $row['cep']; ?>" class="form-control" name="cep" id="cepID">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="turmaID">Turma</label>
                                <select name="turma" id="turmaID" class="form-control">
                                    <?php
                                    try {
                                        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");

                                        $resultado = $pdo->query("SELECT * FROM turma");
                                        if ($resultado->rowCount() > 0) {
                                            while ($row = $resultado->fetch()) {
                                                echo "<option value=\"" . $row['idTurma'] . "\">" . $row['numero'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=\"0\">Nada Encontrado</option>";
                                        }
                                        unset($resultado);
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="estadoorigem">Estado</label>
                                <select class="form-control" id="estadoorigem" onchange="povoarCidade()" name="estadoorigem">
                                    <?php
                                    try {
                                        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                                        //Primeiro Select -------------------------------------------
                                        $sql = "SELECT * FROM \"estados\"";
                                        $resultado = $pdo->query($sql);
                                        if ($resultado->rowCount() > 0) {
                                            echo "<option value=\"0\">Escolha</option>";
                                            while ($row = $resultado->fetch()) {
                                                echo "<option value=\"" . $row['id'] . "\">" . $row['nome'] . "</option>";
                                            }
                                            unset($resultado);
                                        } else {
                                            echo "<option value=\"0\">Sem Registros</option>";
                                        }
                                        //Fim do Primeiro Select -------------------------------------
                                    } catch (PDOException $e) {
                                        die("Não foi possível executar o script: $sql. " . $e->getMessage());
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cidadeorigem">Cidade</label>
                                <select class="form-control" id="cidadeorigem" name="cidadeorigem">
                                </select>
                                <a href="" name="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    <?php
                    } catch (PDOException $e) {
                        echo "<script>alert('Não foi possível encontrar o Aluno!');</script>";
                    }
                    ?>
                </form>
            </div>
</body>

</html>