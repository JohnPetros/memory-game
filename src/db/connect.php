<?php

$dbhost = "";
$dbuser = "";
$dbpassword = "";
$dbname = "";

$dsn = "mysql:host=$dbhost;dbname=$dbname;";
$pdo = new PDO($dsn, $dbuser, $dbpassword);
