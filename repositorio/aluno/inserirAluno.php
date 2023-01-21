<?php
    try {
        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../../modelo/aluno.php");
        $aluno = new aluno();

        $aluno->setNome($_POST['nome']);
        $aluno->setSexo($_POST['sexo']);
        $aluno->setRA($_POST['ra']);
        $aluno->setTurma($_POST['turma']);
        $aluno->setCPF($_POST['cpf']);
        $aluno->setCEP($_POST['cep']);
        $aluno->setCidadeorigem($_POST['cidadeorigem']);
        $aluno->setEstadoorigem($_POST['estadoorigem']);

        $pdo->beginTransaction();

        $sqlTabelaPessoa = "INSERT INTO pessoa (\"nome\", \"sexo\", \"cpf\", \"cep\", \"cidadeOrigem\", \"estadoOrigem\",\"login\",\"senha\")
        VALUES ('" . $aluno->getNome() ."','" . $aluno->getSexo() . "', 
        '" . $aluno->getCPF() ."', '" . $aluno->getCEP() ."', 
        '" . $aluno->getCidadeorigem() . "', '" . $aluno->getEstadoorigem() . "', '', '');";
        $pdo->exec($sqlTabelaPessoa);
        $idPessoa = $pdo->lastInsertId();
        //echo $sqlTabelaPessoa;
        $sqlTabelaAluno = "INSERT INTO aluno (\"idPessoa\", \"turma\", \"ra\")
        VALUES ('" . $idPessoa ."', '" . $aluno->getTurma() ."', '" . $aluno->getRA() ."');";
        $pdo->exec($sqlTabelaAluno);
        //echo $sqlTabelaAluno;
        
        $pdo->commit();
        echo "<script>alert('Inserido com sucesso !!');</script>";
    } catch(PDOException $e) {
        $pdo->rollBack();
        echo "Erro ao inserir." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/devWeb2021_03/visao/aluno/cadastrarAluno.php");
?>