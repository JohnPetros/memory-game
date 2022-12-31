<?php
session_start();

if (!isset($_SESSION["isLogged"])) header("location: ./src/pages/login.php");

?>