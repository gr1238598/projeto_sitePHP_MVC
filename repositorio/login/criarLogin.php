<?php
    try {
        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../../modelo/pessoa.php");
        $pessoa = new pessoa();

        $idPessoa = $_POST['idPessoa'];
        $pessoa->setLogin($_POST['login']);
        $pessoa->setSenha($_POST['senha']);

        $sql = "update pessoa set \"login\" ='" . $pessoa->getLogin() . "',  
        senha='" . $pessoa->getSenha() . "' where \"idPessoa\" = ". $idPessoa;
        
        $pdo->exec($sql);
        echo "<script>alert('Alterado com sucesso !!');</script>";
    } catch(PDOException $e) {
       echo "Erro ao alterar." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/devWeb2021_03/visao/aluno/buscarAluno.php");
?>