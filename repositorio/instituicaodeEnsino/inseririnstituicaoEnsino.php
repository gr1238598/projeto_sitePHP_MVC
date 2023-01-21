<?php
try {
    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");


    include("../../modelo/instituicaoEnsino.php");
    $instituicaoEnsino = new instituicaoEnsino();

    $instituicaoEnsino->setNomeInstituicaoEnsino($_POST['nomeInstituicaoEnsino']);
    $instituicaoEnsino->setCnpj($_POST['cnpj']);
    
    

$sql = "INSERT INTO \"instituicaoEnsino\" (\"nome\", \"cnpj\") 
VALUES ('" . $instituicaoEnsino->getNomeInstituicaoEnsino() ."','" . $instituicaoEnsino->getCnpj() . "');";

    echo $sql;
    $resultado = $pdo->exec($sql);
    echo $resultado;

if ($resultado) {
    echo "</br><script>alert('Inserido com sucesso !!');</script>";
} else {
    echo "</br><script>alert('Erro ao inserir !!');</script>";
}
} catch (PDOException $e) {
echo "</br><script>alert('" . $e->getMessage() . "');</script>";
}
header("refresh:0;url=/devWeb2021_03/visao/instituicaodeEnsino/cadastrarInstituicaodeEnsino.php");
?>
