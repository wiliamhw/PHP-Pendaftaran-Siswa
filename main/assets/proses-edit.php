<?php
require_once "../../database/connection.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // Make query
    $query = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
    
    if ($stmt = $mysqli->prepare(($query))) {

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to list-siswa page
            header("location: ../siswa/list");
            exit();
        } else {
            // Gagal menyimpan perubahan...
            header("location: ../views/500.php" . "?err=3");
            exit();
        }
    }
}