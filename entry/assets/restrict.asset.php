<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to main page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: main/dashboard");
    exit;
}