<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/global.css?v=<?= time() ?>">
  <link rel="stylesheet" href="../css/form.css?v=<?= time() ?>">
  <link rel="stylesheet" href="../css/toast.css?<?= time() ?>">
  <script defer src="../js/toast.js?<?= time() ?>"></script>
  <script defer src="https://kit.fontawesome.com/583fd2bd34.js" crossorigin="anonymous"></script>
  <title>Login</title>
</head>

<body>
  <?php include "../partials/toast.php" ?>

  <main class="container">
    <header>
      <h1>🧠 Memory Game</h1>
    </header>
    <form action="../actions/user/login.php" method="POST">
      <header>
        <h2>Entre com suas credenciais</h2>
      </header>
      <label class="form-group" for="email">
        <input type="email" name="email" placeholder="E-mail" required />
      </label>
      <label class="form-group" for="password">
        <input type="password" name="password" placeholder="Senha" required />
      </label>
      <button>LogIn</button>
      <a href="register.php">Ainda não tem uma conta? Então registre-se 😀</a>
    </form>
  </main>
</body>

</html>