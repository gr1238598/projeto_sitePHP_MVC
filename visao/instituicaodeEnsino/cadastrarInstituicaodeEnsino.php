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
        <h1>Cadastrar Instituição de Ensino </h1><br>
        <form method="POST" action="../../repositorio/instituicaodeEnsino/inseririnstituicaoEnsino.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomeInstituicaoEnsinoID"> Nome </label>
                    <input type="text" id="nomeInstituicaoEnsinoID" class="form-control" name="nomeInstituicaoEnsino" placeholder="Nome">
                </div>
                <div class="form-group col-md-3">
                    <label for="cnpjID"> CNPJ </label>
                    <input type="number" id="cnpjID" class="form-control" name="cnpj" placeholder="CNPJ">
                </div>
            </div>
            <input type="reset" class="btn btn-dark" value="Limpar" />
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>