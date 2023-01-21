<?php
try {
    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try {
    include("../../modelo/turma.php");
    $turma = new turma();

    $idTurma = $_POST['idTurma'];
    $turma->setNumero($_POST['numero']);
    $turma->setDataInicio($_POST['dataInicio']);
    $turma->setListadeAlunos($_POST['listaAlunos']);
    $turma->setIdCurso($_POST['curso']);


    $sql = "update turma set \"numero\"='" . $turma->getNumero() . "',
        \"dataInicio\"='" . $turma->getDataInicio() . "',
        \"listaAlunos\"='" . $turma->getListadeAlunos() . "',
        \"idCurso\"='" . $turma->getIdCurso() . "'
         where \"idTurma\" = " . $idTurma;
         


echo $sql;
    $pdo->exec($sql);
    
    echo "<script>alert('Alterado com sucesso !!');</script>";
} catch (PDOException $e) {
    echo "Erro ao alterar." . $sql . " --------- " . $e->getMessage();
}
//header("refresh:0;url=/devWeb2021_03/visao/turma/buscarTurma.php");
?>
