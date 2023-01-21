<html>

<head>
    <link rel="stylesheet" href="/devWeb2021_03/recursos/bootstrap-4.1/css/bootstrap.min.css">
    <script src="/devWeb2021_03/recursos/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="/devWeb2021_03/recursos/bootstrap-4.1/js/popper.min.js"></script>
    <script src="/devWeb2021_03/recursos/bootstrap-4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include("../layout/menu.php") ?>
    <div class="container">
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4>Buscar Instituicao de Ensino</h4>
                <form class="form-inline" method="POST" action="buscarInstituicaodeEnsino.php">
                    <div class="form-group mb-2 col-md-1">
                        <label for="lblNome" class="sr-only">lblNome</label>
                        <input type="text" readonly class="form-control-plaintext" id="lblNome" value="Nome:">
                    </div>
                    <div class="form-group mb-2 col-md-3">
                        <label for="nomeInstituicaoEnsino" class="sr-only">Nome</label>
                        <input type="text" class="form-control" id="nomeInstituicaoEnsino" name="nomeInstituicaoEnsino">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </form>
                <?php
                try {
                    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                } catch (PDOException $e) {
                    die("Não foi possível conectar. " . $e->getMessage());
                }

                try {
                    $sql = "SELECT * FROM \"instituicaoEnsino\"";
                    if ($_POST) {
                        if (!empty($_POST['nomeInstituicaoEnsino'])) {
                            $sql = "SELECT * FROM \"instituicaoEnsino\" where \"nomeInstituicaoEnsino\" like '%" . $_POST['nomeInstituicaoEnsino'] . "%'";
                        }
                    }
                    $resultado = $pdo->query($sql);
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultado != null && $resultado->rowCount() > 0) {
                                while ($row = $resultado->fetch()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['idInstituicaoEnsino'] . "</td>";
                                    echo "<td>" . $row['nome'] . "</td>";
                            ?>
                                    <td>
                                        <form method="POST" action="editarInstituicaoEnsino.php">
                                            <input type="hidden" name="idInstituicaoEnsino" value="<?php echo $row['idInstituicaoEnsino']; ?>" />
                                            <button type="submit" class="btn btn-secondary">Editar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="/devWeb2021_03/repositorio/instituicaodeEnsino/excluirInstituicaoEnsino.php">
                                            <input type="hidden" name="idInstituicaoEnsino" value="<?php echo $row['idInstituicaoEnsino']; ?>" />
                                            <button type="submit" onclick="return confirm('Deseja realmente excluir o registro?')" class="btn btn-danger">Remover</button>
                                        </form>
                                    </td>
                            <?php
                                    echo "</tr>";
                                }
                                unset($resultado);
                            } else {
                                echo "Nenhum registro encontrado.";
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } catch (PDOException $e) {
                    die("Não foi possível executar o script: $sql. " . $e->getMessage());
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>