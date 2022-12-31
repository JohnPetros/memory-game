<?php
session_start();

include_once "../../db/connect.php";
include_once "../../helpers/clear.php";

$username = clear($_POST["username"]);
$id = $_SESSION["user"]["id"];

$sql = "UPDATE user SET username = ? WHERE id = ?";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(1, $username);
$stmt->bindValue(2, $id);

if (!$stmt->execute()) {
    $error = $stmt->errorInfo()[2];
    if (strpos($error, "Duplicate") !== false) {
        $_SESSION["toast"] = array("type" => "error", "message" => "Nome de usuário já em uso");
    }
}

$_SESSION["user"]["username"] = $username;
$_SESSION["toast"] = array("type" => "success", "message" => "Nome de usuário alterado com sucesso");
header("location: ../../pages/profile.php");
