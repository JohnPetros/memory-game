<?php

include "../db/connect.php";

$sql = "SELECT avatar, username, moves, time FROM user ORDER BY time ASC;";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

