<?php

// If Id not found
if (!isset($_GET['id'])) {
    header('Location: ../siswa/list');
    exit();
}

// Get Id from query string
$id = $_GET['id'];

// Query to get data from databse
$query = "SELECT * FROM calon_siswa WHERE id=$id";
$stmt = $mysqli->query($query);
$siswa = $stmt->fetch_assoc();

// If data not found
if ($stmt->num_rows < 1) {
    // Data tidak ditemukan
    header("location: errors/500.php" . "?err=1");
    exit();
}