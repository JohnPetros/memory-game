<?php
session_start();

include_once "../../db/connect.php";
include_once "../../helpers/clear.php";

$random_number = rand(1, 6);

$username = clear($_POST["username"]);
$email = clear($_POST["email"]);
$password = clear($_POST["password"]);
$avatar = "avatar-$random_number";

$sql = "INSERT INTO user (username, email, password, avatar) VALUES (?, ?, sha1(?), ?)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(1, $username);
$stmt->bindValue(2, $email);
$stmt->bindValue(3, $password);
$stmt->bindValue(4, $avatar);

if ($stmt->execute()) {
    include "login.php";
} else {

    $error = $stmt->errorInfo()[2];
    if (strpos($error, "Duplicate") !== false) {

        if (strpos($error, "username") !== false) {
            $_SESSION["toast"] = array("type" => "error", "message" => "Nome de usuário já em uso");
        }

        if (strpos($error, "email") !== false) {
            $_SESSION["toast"] = array("type" => "error", "message" => "E-mail já em uso");
        }
        header("location: ../../pages/register.php");
    }
}
