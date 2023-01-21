<html>

<head>
    <title>Dev Web 2</title>

    <link rel="stylesheet" href="/devWeb2021_03/recursos/bootstrap-4.1/css/bootstrap.min.css">
    <script src="/devWeb2021_03/recursos/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="/devWeb2021_03/recursos/bootstrap-4.1/js/popper.min.js"></script>
    <script src="/devWeb2021_03/recursos/bootstrap-4.1/js/bootstrap.min.js"></script>
    <script src="/devWeb2021_03/recursos/jquery/jquery.min.js"></script>
</head>

<body onload="buscarEstados()">
    <?php include("../layout/menu.php") ?>
    <div class="container">
        <h1>Criar Login</h1>
        <form method="POST" action="/devWeb2021_03/repositorio/login/criarLogin.php">
            <input type="hidden" name="idPessoa" value="<?php echo $_POST['idPessoa'] ?>" />
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="loginID">login</label>
                    <input type="text" class="form-control" name="login" id="loginID">
                </div>
                <div class="form-group col-md-3">
                    <label for="senhaID">senha</label>
                    <input type="password" class="form-control" name="senha" id="senhaID">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</body>

</html>