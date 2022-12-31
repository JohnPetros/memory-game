<?php
session_start();

include "../../db/connect.php";

$id = $_SESSION["user"]["id"];

$sql = "SELECT path FROM card WHERE id_user = ?";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $id);

$stmt->execute();

$cards = $stmt->fetchAll();

foreach ($cards as $card) {
    unlink($card["path"]);
}

$sql = "DELETE FROM card WHERE id_user = ?";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $id);

if ($stmt->execute()) {
    $_SESSION["toast"] = array("type" => "success", "message" => "Todas as cartas deletadas com sucesso");
    header("location: ../../pages/deck.php");
} else {
    $_SESSION["toast"] = array("type" => "error", "message" => "Erro ao deletar as cartas");
    header("location: ../../pages/deck.php");
}
