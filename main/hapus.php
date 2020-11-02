<?php
// Check if the user isn't logged in yet, if yes then redirect him to welcome page
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] == "user") {
    header("location: ../../entry/index.php");
    exit;
}

// Includue config file
require_once "config.php";

if (isset($_GET['id'])) {

    // Get id from query string
    $id = $_GET['id'];

    // Make delete query
    $query = "DELETE FROM calon_siswa WHERE id=$id";
    if ($stmt = $mysqli->prepare($query)) {

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to home page
            header("Location: welcome/dist/list-siswa.php");
        } else {
            die("Gagal menghapus...");
        }
    }
}
?>