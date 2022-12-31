<?php
session_start();

include_once "../../db/connect.php";
include_once "../../helpers/clear.php";

$email = clear($_POST["email"]) ?? $email;
$password = clear($_POST["password"]) ?? $password;

$sql = "SELECT id, username, avatar FROM user WHERE email = ? AND password = sha1(?)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(1, $email);
$stmt->bindValue(2, $password);

$stmt->execute();

$result = $stmt->fetchObject();

if ($result) {
    $_SESSION["user"] = array(
        "id" => $result->id,
        "username" => $result->username,
        "avatar" => $result->avatar
    );
    $_SESSION["toast"] = array("type" => "success", "message" => "Bem-vindo " . $result->username);

    header("location: ../../pages/deck.php");
} else {
    $_SESSION["toast"] = array("type" => "error", "message" => "Usuário não encontrado");
    header("location: ../../pages/login.php");
}
