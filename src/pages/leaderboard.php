<?php
session_start();
include "../actions/user/auth.php";
include "../actions/user/getGameStatus.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/leaderboard.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/modal.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?<?= time() ?>">
    <script defer src="../js/modal.js?<?= time() ?>"></script>
    <script defer src="https://kit.fontawesome.com/583fd2bd34.js" crossorigin="anonymous"></script>
    <title>LeaderBoard</title>
</head>

<body>
    <?php include "../partials/header.php" ?>

    <main class="leaderboard">
        <h2 class="title"><i class="fa-solid fa-trophy trophy"></i>LeaderBoard</h2>
        <ul class="users">
            <?php $position = 0 ?>
            <?php foreach ($users as $user) : ?>
                <?php if (!$user["time"]) {
                    continue;
                }
                $position++;
                ?>
                <li class="user">
                    <img class="avatar" src="../assets/avatars/<?= $user["avatar"] ?>.png" alt="Avatar">
                    <strong class="username">
                        <?= $position . " - " . $user["username"] ?>
                    </strong>
                    <div class="status">
                        <div class="time">
                            <i class="fa-solid fa-stopwatch"></i>
                            Tempo recorde:
                            <span id="time-count">
                                <?= substr($user["time"], 3) ?>
                            </span>
                        </div>
                        <div class="moves">
                            <i class="fa-solid fa-arrow-pointer"></i>
                            Movimentos:
                            <span id="moves-count">
                                <?= $user["moves"] < 10 ? "0" . $user["moves"] : $user["moves"] ?>
                            </span>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </main>

    <?php include "../partials/modal.php" ?>

</body>

</html>