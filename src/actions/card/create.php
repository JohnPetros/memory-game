<?php
session_start();

include "../../db/connect.php";
include "../../helpers/validateFile.php";

$files = $_FILES["files"];
$id = $_SESSION["user"]["id"];
$cards_count = $_POST["cards_count"];

if ($cards_count + sizeof($files["size"]) > 6) {
    $_SESSION["toast"] = array("type" => "error", "message" => "Você só pode ter 6 cartas no baralho");
    header("location: ../../pages/deck.php");
} elseif (strpos($files["type"][0], "image") === false) {
    $_SESSION["toast"] = array("type" => "error", "message" => "Você só pode adicionar imagem");
    header("location: ../../pages/deck.php");
} else {
    foreach ($files["name"] as $index => $file) {

        $name = $files["name"][$index];
        $size = $files["size"][$index];
        $tmp_name = $files["tmp_name"][$index];
        $error = $files["error"][$index];
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        validateFile($size, $extension);

        $dirname = "files/";
        $filename = uniqid();

        $path = $dirname . $filename . "." . $extension;

        if (!move_uploaded_file($tmp_name, $path)) {
            $_SESSION["toast"] = array("type" => "error", "message" => "Erro ao salvar o arquivo");
            header("location: ../../pages/deck.php");
        }

        $sql = "INSERT INTO card (path, id_user) VALUES (?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $path);
        $stmt->bindValue(2, $id);

        if ($stmt->execute()) {
            $_SESSION["toast"] = array("type" => "success", "message" => "Adição de carta(s) bem-sucedida");
            header("location: ../../pages/deck.php");
        }
    }
}
