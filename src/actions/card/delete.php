<?php
session_start();

include "../../db/connect.php";

$id = $_GET["id"];

$sql = "SELECT path FROM card WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $id);

$stmt->execute();

$card = $stmt->fetchObject();

if (unlink($card->path)) {

    $sql = "DELETE FROM card WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $id);

    if ($stmt->execute()) {
        $_SESSION["toast"] = array("type" => "success", "message" => "Carta deletada com sucesso");
        echo "ok";
        header("location: ../../pages/deck.php");
    }
}
