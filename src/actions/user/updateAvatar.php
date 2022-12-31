<?php
session_start();

include "../../db/connect.php";

$id = $_SESSION["user"]["id"];
$avatar = $_POST["avatar"];

$sql = "UPDATE user SET avatar = ? WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $avatar);
$stmt->bindValue(2, $id);

if ($stmt->execute()) {
    $_SESSION["user"]["avatar"] = $avatar;
    $_SESSION["toast"] = array("type" => "success", "message" => "Avatar alterado com successo");
    header("location: ../../pages/profile.php");
} else {
    $_SESSION["toast"] = array("type" => "error", "message" => "Erro ao alterar avatar");
    header("location: ../../pages/profile.php");
}
