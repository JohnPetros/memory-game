<?php
session_start();

include "../actions/card/read.php";

$files = array();
foreach ($cards as $card) array_push($files, $card["path"]);

if (sizeof($cards) < 6) header("location: ./deck.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/modal.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/game.css?<?= time() ?>">
    <script defer src="../js/modal.js?<?= time() ?>"></script>
    <script defer src="../js/game.js?<?= time() ?>"></script>
    <script defer src="https://kit.fontawesome.com/583fd2bd34.js" crossorigin="anonymous"></script>
    <title>Game</title>
</head>

<body>
    <?php include "../partials/header.php" ?>

    <?php include "../actions/card/read.php"; ?>



    <input id="files" type="hidden" name="deck" value="<?= join(",", $files) ?>">

    <div class="game-board">
        <div class="moves">movimentos: <span id="moves-count">0</span> ✨✨✨</div>

        <div class="time">tempo: <strong id="time-count">00:00</strong></div>
        <a href="game.php" class="restart"><i class="fa-solid fa-rotate-right"></i> Recomeçar</a>
    </div>
    <main id="game" class="game">
        <!-- <div class="card">
            <div class="face front"></div>
            <div class="face back">🧠 Memory card</div>
        </div> -->
    </main>

    <?php include "../partials/modal.php" ?>

</body>

</html>