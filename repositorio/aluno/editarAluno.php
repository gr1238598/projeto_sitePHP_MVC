<?php
    try {
        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../../modelo/aluno.php");
        $aluno = new aluno();

        $idPessoa = $_POST['idPessoa'];
        
        $aluno->setNome($_POST['nome']);
        $aluno->setSexo($_POST['sexo']);
        $aluno->setRA($_POST['ra']);//////////////////////////////////////////
        $aluno->setTurma($_POST['turma']);
        $aluno->setCPF($_POST['cpf']);
        $aluno->setCEP($_POST['cep']);
        $aluno->setCidadeorigem($_POST['cidadeorigem']);
        $aluno->setEstadoorigem($_POST['estadoorigem']);
    

        $sql = "update pessoa set \"nome\"='" . $aluno->getNome() . "',
        \"sexo\"='" . $aluno->getSexo() . "',
        \"cpf\"='" . $aluno->getCPF() . "',
        \"cep\"='" . $aluno->getCEP() . "',
        
        \"cidadeOrigem\"='" . $aluno->getCidadeorigem() . "',
        \"estadoOrigem\"='" . $aluno->getEstadoorigem() . "' where
        \"idPessoa\" = " . $idPessoa;  
            
        echo $sql;
        $pdo->exec($sql);  
        
        $sql = "update aluno set \"turma\"='" . $aluno->getTurma() . "',
        \"ra\"='" . $aluno->getRa() . "' where
        \"idPessoa\" = " . $idPessoa;
        
        $pdo->exec($sql);  
       
        
        echo "<script>alert('Alterado com sucesso !!');</script>";
    } catch(PDOException $e) {
       echo "Erro ao alterar." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/devWeb2021_03/visao/aluno/buscarAluno.php");
    ?>
