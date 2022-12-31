<?php
include "../actions/user/auth.php";
include_once "../actions/card/read.php";
?>
<header>
    <h1>🧠 Memory Game</h1>
        <nav class="navbar">
            <ul class="nav-items">
                <li><a class="item" href="deck.php">Baralho</a></li>
                <li><a class="item" href="leaderboard.php">LeaderBoard</a></li>
                <li><a class="item" href="profile.php">Perfil</a></li>
                <li><a class="item play <?= sizeof($cards) < 6 ? "disabled" : "" ?>" href="game.php">Jogar <i class="fa-solid fa-gamepad"></i></a></li>
            </ul>
        </nav>
    <button for="menu-hamburguer-trigger" id="button-mobile" class="button-mobile">
        <span class="menu-hamburguer"></span>
    </button>
    <div id="user-nav" class="user">
        <input id="id" type="hidden" name="id" value="<?= $_SESSION["user"]["id"] ?>">
        <img id="avatar" class="avatar" src="../assets/avatars/<?= $_SESSION["user"]["avatar"] ?>.png" alt="Avatar">
        <strong id="username" class="username"><?= $_SESSION["user"]["username"] ?></strong>
        <button id="button-logout" class="button-logout">Sair</button>
    </div>
    <script src="../js/header.js?<?= time() ?>"></script>
</header>