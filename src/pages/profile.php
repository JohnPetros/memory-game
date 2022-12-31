<?php
session_start();
include "../actions/user/read.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/toast.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/profile.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/modal.css?<?= time() ?>">
    <script defer src="../js/toast.js?<?= time() ?>"></script>
    <script defer src="../js/modal.js?<?= time() ?>"></script>
    <script defer src="../js/profile.js?<?= time() ?>"></script>
    <script defer src="https://kit.fontawesome.com/583fd2bd34.js" crossorigin="anonymous"></script>
    <title>Perfil</title>
</head>

<body>
    <?php include "../partials/toast.php" ?>

    <?php include "../partials/header.php" ?>

    <main class="profile">

        <div class="avatar" action="" method="POST">
            <img src="../assets/avatars/<?= $_SESSION["user"]["avatar"] ?>.png" alt="Avatar">
            <button id="update-avatar" class="button update-avatar" for="avatar">Alterar avatar</button>
        </div>

        <div class="info">
            <strong>Nome de usuário: </strong>
            <?= $user->username ?>
        </div>
        <div class="info">
            <strong>Tempo recorde: </strong>
            <?= substr($user->time, 3) ?>
        </div>
        <div class="info">
            <strong>Movimentos: </strong>
            <?= $user->moves ?>
        </div>
        <div class="buttons">
            <button id="update-username" class="update-username button" href="../actions/user/updateUsername.php?id=<?= $_SESSION["user"]["id"] ?>">Alterar nome de usuário</button>
            <button id="delete-user" class="delete-user button" href="../actions/user/delete.php?id=<?= $_SESSION["user"]["id"] ?>">Deletar conta</button>
        </div>
    </main>

    <?php include "../partials/modal.php" ?>

</body>

</html>