<?php
try {
    $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $logado = true;
    $sql = "select * from pessoa where \"login\" = '" . $login . "'";
    $resultado = $pdo->query($sql);
    if ($resultado->rowCount() > 0) {
        $pessoa = $resultado->fetch();
        if ($pessoa['senha'] == $senha) {
            session_start();
            $_SESSION["login"] = $login;
            $_SESSION["nome"] = $pessoa['nome'];
        } else {
            $logado = false;
            echo "<script>alert('Senha incorreta!');</script>";
        }
    } else {
        $logado = false;
        echo "<script>alert('Login não encontrado!');</script>";
    }
} catch (PDOException $e) {
    echo "Inserido com sucesso." . $sql . " --------- " . $e->getMessage();
}

if($logado){
    header("refresh:0;url=/devWeb2021_03/visao/index.php");
}else{
    header("refresh:0;url=/devWeb2021_03/visao/login.php");
}
