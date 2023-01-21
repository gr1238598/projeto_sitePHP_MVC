<?php
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["login"])) {
    echo "<script> window.onload = function() { ocultarDeslogar(); }; </script>";
} else {
    echo "<script> window.onload = function() { ocultarLogar('" . $_SESSION["nome"] . "'); }; </script>";
}

?>
<script>
    function ocultarDeslogar() {
        document.getElementById('linkDeslogar').style.display = 'none';
        document.getElementById('linkLogar').style.display = 'inline';
        document.getElementById('nomeUsuario').innerHTML = "";
    }

    function ocultarLogar(nomeLogado) {
        document.getElementById('linkDeslogar').style.display = 'inline';
        document.getElementById('linkLogar').style.display = 'none';
        document.getElementById('nomeUsuario').innerHTML = "Olá " + nomeLogado + ", bem-vindo!";
    }
</script>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h6 class="my-0 mr-md-auto font-weight-normal">IFMS/Corumbá - Tecnologia em Análise e Desenvolvimento de Sistemas</h6>
    <nav class="navbar navbar-light" style="background-color: #E6E6FA;">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="/devWeb2021_03/visao/index.php">Principal</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Aluno</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/devWeb2021_03/visao/aluno/cadastrarAluno.php">Cadastrar</a>
                    <a class="dropdown-item" href="/devWeb2021_03/visao/aluno/buscarAluno.php">Buscar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Área</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/devWeb2021_03/visao/area/cadastrarArea.php">Cadastrar</a>
                    <a class="dropdown-item" href="/devWeb2021_03/visao/area/buscarArea.php">Buscar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Curso</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/devWeb2021_03/visao/curso/cadastrarCurso.php">Cadastrar</a>
                    <a class="dropdown-item" href="/devWeb2021_03/visao/curso/buscarCurso.php">Buscar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Turma</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/devWeb2021_03/visao/turma/cadastrarTurma.php">Cadastrar</a>
                    <a class="dropdown-item" href="/devWeb2021_03/visao/turma/buscarTurma.php">Buscar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Instituição de Ensino</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/devWeb2021_03/visao/instituicaodeEnsino/cadastrarInstituicaodeEnsino.php">Cadastrar</a>
                    <a class="dropdown-item" href="/devWeb2021_03/visao/instituicaodeEnsino/buscarInstituicaodeEnsino.php">Buscar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Sala </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/devWeb2021_03/visao/sala/cadastrarSala.php">Cadastrar</a>
                    <a class="dropdown-item" href="/devWeb2021_03/visao/sala/buscarSala.php">Buscar</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="nomeUsuario" href="#"></a>
            </li>
        </ul>
        <a class="btn btn-outline-primary" id="linkDeslogar" href="/devWeb2021_03/repositorio/login/deslogar.php">Deslogar</a>
        <a class="btn btn-outline-primary" id="linkLogar" href="/devWeb2021_03/visao/login.php">Logar</a>
    </nav>
</div>