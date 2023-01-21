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
        <h1>Cadastrar Turma </h1><br>
        <form method="POST" action="../../repositorio/turma/inserirTurma.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cursoID"> Curso </label>
                    <select name="curso" id="cursoID" class="form-control">
                        <?php
                        try {
                            $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                            $resultado = $pdo->query("SELECT * FROM curso");
                            if ($resultado->rowCount() > 0) {
                                while ($row = $resultado->fetch()) {
                                    echo "<option value=\"" . $row['idCurso'] . "\">" . $row['nomeCurso'] . "</option>";
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
                <div class="form-group col-md-3">
                    <label for="numeroID"> Número </label>
                    <input type="text" id="NumeroID" class="form-control" name="numero" placeholder="Número">
                </div>
                <div class="form-group col-md-3">
                    <label for="dataInicioID"> Data Início </label>
                    <input type="date" id="dataInicioID" class="form-control" name="dataInicio" placeholder="Data Início">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="listadeAlunosID"> Lista de Alunos </label>
                    <select name="listadeAlunos" id="listadeAlunosID" class="form-control">
                        <option value="Lista 1"> Lista 1 </option>
                        <option value="Lista 2"> Lista 2 </option>
                        <option value="Lista 3"> Lista 3 </option>
                        <option value="Lista 4" selected> Lista 4 </option>
                    </select>
                </div>
            </div>
            <input type="reset" class="btn btn-dark" value="Limpar" />
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>