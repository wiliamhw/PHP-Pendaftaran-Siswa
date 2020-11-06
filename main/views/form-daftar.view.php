<?php
$title = "Insert data"; // define title addon
require_once "database/connection.php";
require "main/assets/notlogin.asset.php";
require "main/assets/restrict.asset.php";
require "main/assets/form-daftar.asset.php";
require "main/views/partials/head.php";
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Insert</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah siswa</li>
        </ol>

        <div id="form">
            <form action="daftar" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" rows="3" name="alamat" required></textarea>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin: </label>
                    <div id="row">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki" checked>
                            <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="form-control" name="agama">
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Katolik</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sekolah_asal">Sekolah Asal</label>
                    <input type="text" name="sekolah_asal" class="form-control" required>
                </div>

                <div class="button">
                    <button id="submitButton" class="btn btn-success" type="submit">Daftar</button>
                </div>

            </form>
        </div>
    </div>
</main>

<?php require "main/views/partials/footer.php"; ?>