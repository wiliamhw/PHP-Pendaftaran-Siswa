<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] == "user") {
    header("location: ../../main/views/errors/401.php" . "?to=dashboard");
    exit;
}