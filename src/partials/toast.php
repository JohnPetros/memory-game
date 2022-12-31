<?php
if (isset($_SESSION["toast"])) {
    $type = $_SESSION["toast"]["type"];
    $message = $_SESSION["toast"]["message"];
    $icon = $type == "success" ? "check" : "x";
    echo '
    <div class="toast ' . $type . '">
        <div class="toast-content">
            <i class="fas fa-solid fa-' . $icon . ' icon"></i>
            <strong class="message">' . $message . '</strong>
            <i class="fa-solid fa-x fa-lg close"></i>
            <div class="progress"></div>
        </div>
    </div>
    ';
}

unset($_SESSION['toast']);
?>
