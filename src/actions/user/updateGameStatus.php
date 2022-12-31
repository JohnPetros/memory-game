<?php
session_start();
include "../../db/connect.php";
if (isset($_POST["moves"]) && isset($_POST["time"]) && isset($_POST["page"])) {
    $moves = $_POST["moves"];
    $time = $_POST["time"];
    $page = $_POST["page"];
    $id =  $_SESSION["user"]["id"];

    $sql = "SELECT * FROM user WHERE id = (?)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $id);

    $stmt->execute();
    $user = $stmt->fetchObject();

    if (!$user->time || $time < $user->time) {
        $sql = "UPDATE user SET moves = ?, time = ? WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $moves);
        $stmt->bindValue(2, $time);
        $stmt->bindValue(3, $id);

        $stmt->execute();
    }
    header("location: ../../pages/$page.php");
}
