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
        <h1>Cadastrar Sala </h1><br>
        <form method="POST" action="../../repositorio/sala/inserirsala.php">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="capacidadeID"> <b>Capacidade:</b> </label>
                    <input type="number" id="capacidadeID" class="form-control" name="capacidade" placeholder="capacidade">
                </div>
                <div class="form-group col-md-8">
                    <label for="recursosMultimidiaID"><b>Recursos Multimidia</b></label>
                    <input type="text" id="recursosMultimidiaID" class="form-control" name="recursosMultimidia">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="descricaoID"> <b>Descrição: </b></label>
                    <select name="descricao" id="descricaoID" class="form-control">
                        <option selected>Escolher...</option>
                        <option> Pequena </option>
                        <option> Média </option>
                        <option> Grande </option>
                    </select>
                </div>
            </div>
            <br>
            <input type="reset" class="btn btn-dark" value="Limpar" />
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>