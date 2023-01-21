<?php
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["login"])) {
    echo "<script>alert('Você deve estar logado para abrir esta página');</script>";
    header("refresh:0;url=/devWeb2021_03/visao/area/buscarArea.php");
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
                <h4>Editar de Área</h4>
                <form method="POST" action="/devWeb2021_03/repositorio/area/editarArea.php">
                    <?php
                    try {
                        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                    } catch (PDOException $e) {
                        die("Não foi possível conectar. " . $e->getMessage());
                    }
                    try {
                        if ($_POST) {
                            if (!empty($_POST['idArea'])) {
                                $sql = "SELECT * FROM area where \"idArea\" = '" . $_POST['idArea'] . "'";
                            }
                        } else {
                            echo "<script>alert('Não foi possível encontrar a Área!');</script>";
                            header("refresh:0;url=/devWeb2021_03/visao/area/buscarArea.php");
                        }
                        $resultado = $pdo->query($sql);
                        $row = $resultado->fetch();
                    ?>
                        <div class="form-row">
                            <input type="hidden" name="idArea" value="<?php echo $row['idArea']; ?>" />
                            <div class="form-group col-md-9">
                                <label for="nomeAreaID">Nome</label>
                                <input requerid name="nomeArea" id="nomeAreaID" value="<?php echo $row['nomeArea']; ?>" class="form-control" type="text" />
                            </div>

                        </div>
                        <input class="btn btn-primary" type="submit" value="Salvar" />
                    <?php
                    } catch (PDOException $e) {
                        echo "<script>alert('Não foi possível encontrar a Área!');</script>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>