<?php
try {
    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try{
    include("../../modelo/turma.php");
    $turma = new turma();

    $turma->setNumero($_POST['numero']);
    $turma->setDataInicio($_POST['dataInicio']);
    $turma->setListadeAlunos($_POST['listadeAlunos']);
    $turma->setIdCurso($_POST['curso']);

    $sql = "INSERT INTO turma (\"numero\",\"dataInicio\",\"listaAlunos\",\"idCurso\")
    VALUES ('" . $turma->getNumero() . "','" . $turma->getDataInicio() . "'
    ,'" . $turma->getListadeAlunos() . "','" . $turma->getIdCurso() . "')";
    
    $resultado = $pdo->exec($sql);
    //echo $sql;
    if ($resultado) {
        echo "</br><script>alert('Inserido com sucesso !!');</script>";
    } else {
        echo "</br><script>alert('Erro ao inserir !!');</script>";
    }
} catch (PDOException $e) {
    echo "</br><script>alert('" . $e->getMessage() . "');</script>";
}
header("refresh:0;url=/devWeb2021_03/visao/turma/cadastrarTurma.php");
?>
