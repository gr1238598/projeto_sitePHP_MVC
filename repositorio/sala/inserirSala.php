<?php
try {
    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
    
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try {
    include("../../modelo/sala.php");
    $sala = new sala();

    $sala->setCapacidade($_POST['capacidade']);
    $sala->setRecursosMultimidia($_POST['recursosMultimidia']);
    $sala->setDescricao($_POST['descricao']);
   

    $sql = "INSERT INTO sala (\"capacidade\",\"recursosMultimidia\",\"descricao\")
    VALUES ('" . $sala->getCapacidade() . "','" . $sala->getRecursosMultimidia() . "'
    ,'" . $sala->getDescricao() . "')";

$resultado = $pdo->exec($sql);

if ($resultado) {
    echo "</br><script>alert('Inserido com sucesso !!');</script>";
} else {
    echo "</br><script>alert('Erro ao inserir !!');</script>";
}
} catch (PDOException $e) {
echo "</br><script>alert('" . $e->getMessage() . "');</script>";
}
header("refresh:0;url=/devWeb2021_03/visao/sala/cadastrarSala.php");
?>
