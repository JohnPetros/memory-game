<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/form.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/toast.css?<?= time() ?>">
    <script defer src="../js/toast.js?<?= time() ?>"></script>
    <script defer src="../js/form.js"></script>
    <script defer src="https://kit.fontawesome.com/583fd2bd34.js" crossorigin="anonymous"></script>
    <title>Cadastro</title>
</head>

<body>
    <?php include "../partials/toast.php" ?>

    <main class="container">
        <form action="../actions/user/create.php" method="POST">
            <header>
                <h2>Criar uma conta</h2>
            </header>
            <label for="username" class="form-group">
                <strong>Nome de usuário</strong>
                <input type="text" name="username" placeholder="Digite seu nome de usuário" required />
                <i class="fas fa-exclamation-circle"></i>
                <i class="fas fa-check-circle"></i>
                <small>Mensagem de erro</small>
            </label>
            <label for="email" class="form-group">
                <strong>E-mail</strong>
                <input type="email" name="email" placeholder="Digite e-mail" required />
                <i class="fas fa-exclamation-circle"></i>
                <i class="fas fa-check-circle"></i>
                <small>Mensagem de erro</small>
            </label>
            <label for="password" class="form-group">
                <strong>Senha</strong>
                <input type="password" name="password" placeholder="Digite sua senha" required />
                <i class="fas fa-exclamation-circle"></i>
                <i class="fas fa-check-circle"></i>
                <small>Mensagem de erro</small>
            </label>
            <label for="confirm-password" class="form-group">
                <strong>Confirmar senha</strong>
                <input type="password" name="confirm-password" placeholder="Confirme sua senha" required />
                <i class="fas fa-exclamation-circle"></i>
                <i class="fas fa-check-circle"></i>
                <small>Mensagem de erro</small>
            </label>
            <button type="submit">Cadastrar</button>
            <a href="login.php">Já tem uma conta? Então faça seu login 😀</a>
        </form>
    </main>
</body>

</html>