<?php
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["login"])) {
    echo "<script>alert('Você deve estar logado para abrir esta página');</script>";
    header("refresh:0;url=/devWeb2021_03/visao/sala/buscarSala.php");
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
                <h4>Editar Sala </h4>
                <form method = "POST" action="/devWeb2021_03/repositorio/sala/editarSala.php">
                    <?php
                    try {
                        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
                    } catch (PDOException $e) {
                        die("Não foi possível conectar. " . $e->getMessage());
                    }
                    try {
                        if ($_POST) {
                            if (!empty($_POST['idSala'])) {
                                $sql = "SELECT * FROM sala where \"idSala\" = '" . $_POST['idSala'] . "'";
                            }
                        } else {
                            echo "<script>alert('Não foi possível encontrar a Sala!');</script>";
                            header("refresh:0;url=/devWeb2021_03/visao/sala/buscarSala.php");
                        }
                        $resultado = $pdo->query($sql);
                        $row = $resultado->fetch();
                    ?>
                        <input type="hidden" name="idSala" value="<?php echo $row['idSala']; ?>" />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="capacidadeID"> <b> Capacidade </b> </label>
                                <input type="number" value="<?php echo $row['capacidade']; ?>" id="capacidadeID" class="form-control" name="capacidade" placeholder="capacidade">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="recursosMultimidiaID"><b>Recursos Multimidia</b></label>
                                <input type="text" value="<?php echo $row['recursosMultimidia']; ?>" id="recursosMultimidiaID" class="form-control" name="recursosMultimidia">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="descricaoID"> <b>Descrição: </b></label>
                                <select name="descricao" id="descricaoID" class="form-control" > 
                                    <option selected >Escolher...</option>
                                    <option> Pequena </option>
                                    <option> Média </option>
                                    <option> Grande </option>
                                </select>
                            </div>
                        </div>
                        <br>
                        
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    <?php
                    } catch (PDOException $e) {
                        echo "<script>alert('Não foi possível encontrar a Sala!');</script>";
                    }
                    ?>
                </form>
            </div>
</body>

</html>