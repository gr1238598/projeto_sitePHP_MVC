<?php
try {
    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try {
    include("../../modelo/sala.php");
    $sala = new sala();

    $idSala = $_POST['idSala'];
    $sala->setCapacidade($_POST['capacidade']);
    $sala->setRecursosMultimidia($_POST['recursosMultimidia']);
    $sala->setDescricao($_POST['descricao']);


    $sql = "update sala set \"capacidade\"='" . $sala->getCapacidade() . "',
        \"recursosMultimidia\"='" . $sala->getRecursosMultimidia() . "',
        \"descricao\"='" . $sala->getDescricao() . "',
        \"idSala\" = " . $idSala;

    $pdo->exec($sql);
    echo $sql;
    echo "<script>alert('Alterado com sucesso !!');</script>";
} catch (PDOException $e) {
    echo "Erro ao alterar." . $sql . " --------- " . $e->getMessage();
}
header("refresh:0;url=/devWeb2021_03/visao/sala/buscarSala.php");
?>
