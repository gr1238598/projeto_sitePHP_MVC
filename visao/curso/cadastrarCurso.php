<?php
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["login"])) {
    echo "<script>alert('Você deve estar logado para abrir esta página');</script>";
    header("refresh:0;url=/devWeb2021_03/visao/index.php");
}
?>
<html>

<head>
    <title>Dev Web 2</title>
    <link rel="stylesheet" href="/devWeb2021_03/recursos/bootstrap-4.1/css/bootstrap.min.css">
    <script src="/devWeb2021_03/recursos/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="/devWeb2021_03/recursos/bootstrap-4.1/js/popper.min.js"></script>
    <script src="/devWeb2021_03/recursos/bootstrap-4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include("../layout/menu.php") ?>
    <div class="container">
        <h1>Cadastrar Curso</h1>
        <form method="POST" action="../../repositorio/curso/inserirCurso.php">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nomeCursoID">Nome</label>
                    <input type="text" class="form-control" name="nomeCurso" id="nomeCursoID" placeholder="Análise e Desenvolvimento de Sistemas">
                </div>
            </div>
            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="dataInicioNaIES">Data Criação</label>
                        <input type="date" class="form-control" name="dataInicioNaIES" id="dataInicioNaIESID">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="conceitoENADEID">Conceito ENADE</label>
                        <input type="number" class="form-control" name="conceitoENADE" id="conceitoENADEID">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="areaID">Área</label>
                        <select name="area" id="areaID" class="form-control">
                            <?php
                            try {
                                $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                           
                                $resultado = $pdo->query("SELECT * FROM area");
                                if ($resultado->rowCount() > 0) {
                                    while ($row = $resultado->fetch()) {
                                        echo "<option value=\"" . $row['idArea'] . "\">" . $row['nomeArea'] . "</option>";
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
                    <div class="form-group col-md-12">
                        <label for="descricaoID">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricaoID" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="listaInstituicaoID"> Lista de Instituição</label>
                    <select name="instituicao" id="listaInstituicaoID" class="form-control">
                    <?php
                            try {
                                $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                           
                                $resultado = $pdo->query("SELECT * FROM \"instituicaoEnsino\" ");
                                if ($resultado->rowCount() > 0) {
                                    while ($row = $resultado->fetch()) {
                                        echo "<option value=\"" . $row['idInstituicaoEnsino'] . "\">" . $row['nome'] . "</option>";
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
                <input type="reset" class="btn btn-dark" value="Limpar" />
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>
</body>

</html>