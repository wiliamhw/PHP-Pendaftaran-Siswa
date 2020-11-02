<?php
$title = "Update data"; // define title addon
require "../assets/core.asset.php";
require "../assets/restrict.asset.php";
require "../assets/form-edit.asset.php";
require "partials/head.php";
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.view.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="list-siswa.view.php">Daftar siswa</a></li>
            <li class="breadcrumb-item active">Edit siswa</li>
        </ol>

        <div id="form">
            <form action="../assets/proses-edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $siswa['nama'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" rows="3" name="alamat" required><?php echo $siswa['alamat'] ?></textarea>
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
                    <?php $agama = $siswa['agama']; ?>
                    <select class="form-control" name="agama">
                        <option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                        <option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                        <option <?php echo ($agama == 'Katolik') ? "selected" : "" ?>>Katolik</option>
                        <option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                        <option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sekolah_asal">Sekolah Asal</label>
                    <input type="text" name="sekolah_asal" class="form-control" value="<?php echo $siswa['sekolah_asal'] ?>" required>
                </div>

                <div class="button">
                    <button id="submitButton" class="btn btn-success" type="submit">Edit</button>
                </div>

            </form>
        </div>
    </div>
</main>

<?php require "partials/footer.php"; ?>