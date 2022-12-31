<?php
session_start();

unset($_SESSION["user"]);
unset($_SESSION["toast"]);

header("location: ../../../index.php");
