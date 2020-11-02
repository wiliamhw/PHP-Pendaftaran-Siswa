<?php
if ($_SESSION["role"] == "user") {
    header("location: ../../entry/views/index.view.php");
    exit;
}