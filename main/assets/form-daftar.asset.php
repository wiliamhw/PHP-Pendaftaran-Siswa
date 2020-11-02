<?php

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Make query
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare(($sql))) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssss", $param_nama, $param_alamat, $param_jk, $param_agama, $param_sekolah);

        // Set parameters
        $param_nama = $_POST['nama'];
        $param_alamat = $_POST['alamat'];
        $param_jk = $_POST['jenis_kelamin'];
        $param_agama = $_POST['agama'];
        $param_sekolah = $_POST['sekolah_asal'];

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            header("location: " . $mainAddress . "?status=sukses");
        } else {
            header("location: " .  $mainAddress . "?status=gagal");
        }
    }
}
