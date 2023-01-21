<?php
    try {
        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../../modelo/curso.php");
        $curso = new curso();

        $idCurso = $_POST['idCurso'];
        $curso->setNomeCurso($_POST['nomeCurso']);
        $curso->setDescricaoCurso($_POST['descricao']);
        $curso->setConceitoEnade($_POST['conceitoENADE']);
        $curso->setDataInicioNaIES($_POST['dataInicioNaIES']);
        $curso->setIdArea($_POST['area']);
    

        $sql = "update curso set \"nomeCurso\"='" . $curso->getNomeCurso() . "',
        \"descricaoCurso\"='" . $curso->getDescricaoCurso() . "',
        \"conceitoEnade\"='" . $curso->getConceitoEnade() . "',
        \"dataInicioNaIES\"='" . $curso->getDataInicioNaIES() . "',
        \"idArea\"='" . $curso->getIdArea() . "'
         where \"idCurso\" = ". $idCurso;

        $pdo->exec($sql);
        echo "<script>alert('Alterado com sucesso !!');</script>";
    } catch(PDOException $e) {
       echo "Erro ao alterar." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/devWeb2021_03/visao/curso/buscarCurso.php");
?>