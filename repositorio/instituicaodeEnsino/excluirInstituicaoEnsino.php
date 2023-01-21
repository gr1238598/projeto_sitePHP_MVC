<?php
    //Iniciando a sessão:
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    
    if (!isset($_SESSION["login"])){
        echo "<script>alert('Você deve estar logado para abrir esta página');</script>";
        header("refresh:0;url=/devWeb2021_03/visao/instituicaodeEnsino/buscarInstituicaodeEnsino.php");
    }else{
        try {
            $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
        } catch (PDOException $e) {
            die("Não foi possível conectar. " . $e->getMessage());
        }
        
        try {
            $idInstituicaoEnsino = $_POST['idInstituicaoEnsino'];
        
            $sql = "delete from \"instituicaoEnsino\" where \"idInstituicaoEnsino\" = " . $idInstituicaoEnsino;
            $pdo->exec($sql);
            
            echo "<script>alert('Removido com sucesso !!');</script>";
        } catch (PDOException $e) {
            echo "!Erro ao remover instituicaoEnsino." . $sql. " --------- " . $e->getMessage();
        }
        header("refresh:0;url=/devWeb2021_03/visao/instituicaodeEnsino/buscarInstituicaodeEnsino.php");
    }
?>