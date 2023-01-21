<html>

<head>
    <meta charset="utf-8">
    <title>Login - DevWeb2</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/devWeb2021_03/recursos/bootstrap-4.1/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="/devWeb2021_03/recursos/outros/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <form class="form-signin" method="POST" action="/devWeb2021_03/repositorio/login/logar.php">
        <img class="mb-4" src="/devWeb2021_03/recursos/imagens/bootstrap-solid.svg" alt="" width="72" height="72">
        <img class="mb-4" src="/devWeb2021_03/recursos/imagens/marcaifms.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="login" class="sr-only">Email address</label>
        <input type="text" id="login" name="login" class="form-control" placeholder="login" required="" autofocus="">
        <label for="senha" class="sr-only">Password</label>
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Password" required="">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">©getbootstrap.com - sign-in - Template</p>
    </form>
</body>
</html>