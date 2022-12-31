<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/toast.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/deck.css?<?= time() ?>">
    <link rel="stylesheet" href="../css/modal.css?<?= time() ?>">
    <script defer src="../js/modal.js?<?= time() ?>"></script>
    <script defer src="../js/toast.js?<?= time() ?>"></script>
    <script defer src="../js/deck.js?<?= time() ?>"></script>
    <script defer src="https://kit.fontawesome.com/583fd2bd34.js" crossorigin="anonymous"></script>
    <title>Memory Game</title>
</head>

<body>
    <?php include "../partials/toast.php" ?>

    <?php include "../partials/header.php" ?>

    <div class="heading">
        <h2>
            Cartas no seu baralho:
            <strong class="cards-count"></strong>
        </h2>
        <button id="<?= $_SESSION["user"]["id"] ?>" class="delete-all <?= sizeof($cards) < 1 ? "hidden" : "" ?>">Deletar Tudo</button>
    </div>

    <main class="deck">
        <?php
        foreach ($cards as $card) :
            $url = "../actions/card/" . $card["path"];
        ?>
            <div class="card" style="background-image: url('<?= $url ?>');">
                <button class="delete"><i id="<?= $card["id"] ?>" class="fa-solid fa-trash"></i></button>
            </div>
        <?php endforeach ?>


        <div>
            <form id="template-card" class="<?php if (sizeof($cards) >= 6) echo "hide" ?>" action="../actions/card/create.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="files[]" id="submit-files" multiple>
                <input type="hidden" name="cards_count" value="<?= sizeof($cards) ?>">
                <label for="submit-files"><i class="fa-regular fa-square-plus"></i></label>
            </form>
        </div>
    </main>

    <?php include "../partials/modal.php" ?>

</body>

</html>