<?php
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["login"])) {
    echo "<script>alert('Você deve estar logado para abrir esta página');</script>";
    header("refresh:0;url=/devWeb2021_03/visao/curso/buscarCurso.php");
}
?>
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
                <h4>Editar Curso</h4>
                <form method="POST" action="/devWeb2021_03/repositorio/curso/editarCurso.php">
                    <?php
                    try {
                        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                    } catch (PDOException $e) {
                        die("Não foi possível conectar. " . $e->getMessage());
                    }
                    try {
                        if ($_POST) {
                            if (!empty($_POST['idCurso'])) {
                                $sql = "SELECT * FROM curso where \"idCurso\" = '" . $_POST['idCurso'] . "'";
                            }
                        } else {
                            echo "<script>alert('Não foi possível encontrar o Curso!');</script>";
                            header("refresh:0;url=/devWeb2021_03/visao/curso/buscarCurso.php");
                        }
                        $resultado = $pdo->query($sql);
                        $row = $resultado->fetch();
                    ?>

                        <input type="hidden" name="idCurso" value="<?php echo $row['idCurso']; ?>" />
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nomeCursoID">Nome</label>
                                <input type="text" value="<?php echo $row['nomeCurso']; ?>" class="form-control" name="nomeCurso" id="nomeCursoID" placeholder="Análise e Desenvolvimento de Sistemas">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dataInicioNaIES">Data Criação</label>
                                <input type="date" value="<?php echo $row['dataInicioNaIES']; ?>" class="form-control" name="dataInicioNaIES" id="dataInicioNaIESID">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="conceitoENADEID">Conceito ENADE</label>
                                <input type="number" value="<?php echo $row['conceitoEnade']; ?>" class="form-control" name="conceitoENADE" id="conceitoENADEID">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="areaID">Área</label>
                                <select name="area" id="areaID" class="form-control">
                                    <?php
                                    try {
                                        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                                    } catch (PDOException $e) {
                                        die("Não foi possível conectar. " . $e->getMessage());
                                    }
                                    try {
                                        $resultado = $pdo->query("SELECT * FROM area");
                                        if ($resultado->rowCount() > 0) {
                                            while ($rowArea = $resultado->fetch()) {
                                                if ($rowArea['idArea'] == $row['idArea']) {
                                                    echo "<option selected value=\"" . $rowArea['idArea'] . "\">" . $rowArea['nomeArea'] . "</option>";
                                                } else {
                                                    echo "<option value=\"" . $rowArea['idArea'] . "\">" . $rowArea['nomeArea'] . "</option>";
                                                }
                                            }
                                        } else {
                                            echo "<option value=\"0\">Nada Encontrado</option>";
                                        }
                                        unset($resultado);
                                    } catch (PDOException $e) {
                                        die("Não foi possível executar o sql. " . $e->getMessage());
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descricaoID">Descrição</label>
                                <textarea class="form-control" name="descricao" id="descricaoID" rows="3"> <?php echo $row['descricaoCurso']; ?></textarea>
                            </div>
                        </div>



                        <input class="btn btn-primary" type="submit" value="Salvar" />
                    <?php
                    } catch (PDOException $e) {
                        echo "<script>alert('Não foi possível encontrar o Curso!');</script>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>