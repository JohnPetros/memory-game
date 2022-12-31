<?php
session_start();

include "../../db/connect.php";

include "../card/deleteAll.php";

$sql = "DELETE FROM user WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $id);

if ($stmt->execute()) {
    unset($_SESSION["user"]);
    unset($_SESSION["toast"]);
    header("location: ../../pages/login.php");
} else {
    $_SESSION["toast"] = array("type" => "error", "message" => "Erro ao deletar a conta");
    header("location: ../../pages/profile.php");
}
