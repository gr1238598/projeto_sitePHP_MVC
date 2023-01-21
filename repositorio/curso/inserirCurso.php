<?php
try {
    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");

    include("../../modelo/curso.php");
    $curso = new curso();

    $curso->setNomeCurso($_POST['nomeCurso']);
    $curso->setDescricaoCurso($_POST['descricao']);
    $curso->setConceitoEnade($_POST['conceitoENADE']);
    $curso->setDataInicioNaIES($_POST['dataInicioNaIES']);
    $curso->setIdArea($_POST['area']);
    $curso->setIdinstituicao($_POST['instituicao']);

    $sql = "INSERT INTO curso (\"nomeCurso\",\"descricaoCurso\",\"conceitoEnade\",\"dataInicioNaIES\",\"idArea\",\"idInstituicaoEnsino\")
        VALUES ('" . $curso->getNomeCurso() . "'
        ,'" . $curso->getDescricaoCurso() . "'
        ,'" . $curso->getConceitoEnade() . "'
        ,'" . $curso->getDataInicioNaIES() . "'
        , '" . $curso->getIdArea() . "'
        , '" . $curso->getIdInstituicao() . "');";

    echo $sql;
    $resultado = $pdo->exec($sql);

    if ($resultado) {
        echo "</br><script>alert('Inserido com sucesso !!');</script>";
    } else {
        echo "</br><script>alert('Erro ao inserir !!');</script>";
    }
} catch (PDOException $e) {
    echo "</br><script>alert('" . $e->getMessage() . "');</script>";
}

header("refresh:0;url=/devWeb2021_03/visao/curso/cadastrarCurso.php");