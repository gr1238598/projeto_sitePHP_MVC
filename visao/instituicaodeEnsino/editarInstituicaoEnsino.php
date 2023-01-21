<?php
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["login"])) {
    echo "<script>alert('Você deve estar logado para abrir esta página');</script>";
    header("refresh:0;url=/devWeb2021_03/visao/instituicaodeEnsino/buscarInstituicaodeEnsino.php");
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
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4>Editar Instituição de Ensino </h4>
                <form method="POST" action="/devWeb2021_03/repositorio/instituicaodeEnsino/editarInstituicaoEnsino.php">
                    <?php
                    try {
                        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                    } catch (PDOException $e) {
                        die("Não foi possível conectar. " . $e->getMessage());
                    }
                    try {
                        if ($_POST) {
                            if (!empty($_POST['idInstituicaoEnsino'])) {
                                $sql = "SELECT * FROM \"instituicaoEnsino\" where \"idInstituicaoEnsino\" = '" . $_POST['idInstituicaoEnsino'] . "'";
                            }
                        } else {
                            echo "<script>alert('Não foi possível encontrar a Instituição de Ensino!');</script>";
                            header("refresh:0;url=/devWeb2021_03/visao/instituicaodeEnsino/buscarInstituicaodeEnsino.php");
                        }
                        $resultado = $pdo->query($sql);
                        $row = $resultado->fetch();
                    ?>
                        <input type="hidden" name="idInstituicaoEnsino" value="<?php echo $row['idInstituicaoEnsino']; ?>" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomeInstituicaoEnsinoID"> Nome </label>
                                <input type="text" value="<?php echo $row['nome']; ?>" id="nomeInstituicaoEnsinoID" class="form-control" name="nomeInstituicaoEnsino" placeholder="Nome">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cnpjID"> CNPJ </label>
                                <input type="number" value="<?php echo $row['cnpj']; ?>" id="cnpjID" class="form-control" name="cnpj" placeholder="CNPJ">
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    <?php
                    } catch (PDOException $e) {
                        echo "<script>alert('Não foi possível encontrar a Instituição de Ensino!');</script>";
                    }
                    ?>
                </form>
            </div>
</body>

</html>