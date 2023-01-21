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
        <h1>Cadastrar Área</h1>
        <form method="post" action="../../repositorio/area/inserirArea.php">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nomeAreaID">Nome</label>
                    <input type="text" class="form-control" name="nomeArea" id="nomeAreaID" placeholder="Exatas">
                </div>
            </div>
            <input type="reset" class="btn btn-dark" value="Limpar" />          
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>
