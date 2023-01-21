<?php
    try {
        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");

    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../../modelo/area.php");
        $area = new area();

        $idArea = $_POST['idArea'];
        $area->setNomeArea($_POST['nomeArea']);

        $sql = "update area set \"nomeArea\"='" . $area->getNomeArea() . "' where \"idArea\" = ". $idArea;
        $pdo->exec($sql);
        echo "<script>alert('Alterado com sucesso !!');</script>";
    } catch(PDOException $e) {
       echo "Erro ao alterar." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/devWeb2021_03/visao/area/buscarArea.php");
?>