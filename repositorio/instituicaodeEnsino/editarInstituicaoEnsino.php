<?php
try {
    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try {
    include("../../modelo/instituicaoEnsino.php");
    $instituicaoEnsino = new instituicaoEnsino();

    $idInstituicaoEnsino = $_POST['idInstituicaoEnsino'];
    $instituicaoEnsino->setNomeInstituicaoEnsino($_POST['nomeInstituicaoEnsino']);
    $instituicaoEnsino->setCnpj($_POST['cnpj']);
    


    $sql = "update \"instituicaoEnsino\" set \"nome\"='" . $instituicaoEnsino->getNomeInstituicaoEnsino() . "',
        \"cnpj\"='" . $instituicaoEnsino->getCnpj() . "' where
        \"idInstituicaoEnsino\" = " . $idInstituicaoEnsino;
    echo $sql;
    $pdo->exec($sql);
    echo "<script>alert('Alterado com sucesso !!');</script>";
} catch (PDOException $e) {
    echo "Erro ao alterar." . $sql . " --------- " . $e->getMessage();
}
header("refresh:0;url=/devWeb2021_03/visao/instituicaodeEnsino/buscarInstituicaodeEnsino.php");
?>
