<?php

include "../db/connect.php";

$id = $_SESSION["user"]["id"];

$sql = "SELECT * FROM card WHERE id_user = (?)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $id);

$stmt->execute();
$cards = $stmt->fetchAll();

?>
