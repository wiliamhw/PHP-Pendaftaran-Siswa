<?php
// Check if the user isn't logged in yet, if yes then redirect him to welcome page
session_start();

require "core.asset.php";

if (isset($_GET['id'])) {

    // Get id from query string
    $id = $_GET['id'];

    // Make delete query
    $query = "DELETE FROM calon_siswa WHERE id=$id";
    if ($stmt = $mysqli->prepare($query)) {

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to list-siswa
            header("Location: ../views/list-siswa.view.php");
        } else {
            // Gagal menghapus
            header("location: ../views/500.php" . "?err=2");
        }
    }
}
?>