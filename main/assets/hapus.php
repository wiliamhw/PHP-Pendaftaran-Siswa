<?php
// Check if the user isn't logged in yet, if yes then redirect him to welcome page
session_start();

require_once "../../database/connection.php";
require "notlogin.asset.php";

if (isset($_GET['id'])) {

    // Get id from query string
    $id = $_GET['id'];

    // Make delete query
    $query = "DELETE FROM calon_siswa WHERE id=$id";
    if ($stmt = $mysqli->prepare($query)) {

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to list-siswa
            header("Location: ../siswa/list");
        } else {
            // Gagal menghapus
            header("location: ../views/errors/500.php" . "?err=2");
        }
    }
}
?>