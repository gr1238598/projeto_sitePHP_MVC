<?php

try {

    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");

    include("../../modelo/area.php");
    $area = new area();
    $area->setNomeArea($_POST['nomeArea']);

    $sql = "INSERT INTO area (\"nomeArea\") VALUES ('" . $area->getNomeArea() ."')";
    $resultado = $pdo->exec($sql);
    
    if ($resultado){
        echo "</br><script>alert('Inserido com sucesso !!');</script>";
    }else{
        echo "</br><script>alert('Erro ao inserir !!');</script>";
    }
    
} catch (PDOException $e) {
    echo "</br><script>alert('". $e->getMessage() ."');</script>";
}

header("refresh:0;url=/devWeb2021_03/visao/area/cadastrarArea.php");
?>