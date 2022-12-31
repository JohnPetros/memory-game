<?php

include "../db/connect.php";

$id = $_SESSION["user"]["id"];

$sql = "SELECT * FROM user WHERE id = (?)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $id);

$stmt->execute();
$user = $stmt->fetchObject();

?>
