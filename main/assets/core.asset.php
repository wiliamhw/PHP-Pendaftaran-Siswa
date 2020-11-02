<?php

// Includue config file
require_once "../../config.php";

// Check if the user isn't logged in yet, if yes then redirect him to welcome page
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: " . $entryAdress);
    exit;
}