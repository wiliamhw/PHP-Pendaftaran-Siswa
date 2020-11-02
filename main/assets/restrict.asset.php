<?php
if ($_SESSION["role"] == "user") {
    header("location: ../../401.php" . "?to=entry");
    exit;
}