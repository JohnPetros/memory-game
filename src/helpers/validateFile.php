<?php

function validateFile($size, $extension)
{

    if ($size > 2097152) {
        $_SESSION["toast"] = array("type" => "error", "message" => "Arquivo muito grande! Max: 2MB");
        echo "muito grande";
        header("location: ../../pages/dashboard.php");
    }

    if ($extension != "png" && $extension != "jpg") {
        $_SESSION["toast"] = array("type" => "error", "message" => "Envie apenas arquivos png ou jpg");
        header("location: ../../pages/dashboard.php");
    }
}
