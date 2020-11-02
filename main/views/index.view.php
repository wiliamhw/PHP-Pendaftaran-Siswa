<?php
require "../assets/core.asset.php";
require "partials/head.php";
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Overview siswa</li>
        </ol>
        <?php if (isset($_GET['status'])) : ?>
            <?php if ($_GET['status'] == 'sukses') : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pendaftaran siswa baru sukses
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php else : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Pendaftaran siswa baru gagal
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Jenis Kelamin
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Agama
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Siswa
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Sekolah Asal</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Sekolah Asal</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM calon_siswa";
                            $stmt = $mysqli->query($query);
                            $counter = 1;

                            while ($siswa = $stmt->fetch_array()) {
                                echo "<tr>";

                                echo "<td>" . $counter++ . "</td>";
                                echo "<td>" . $siswa['id'] . "</td>";
                                echo "<td>" . $siswa['nama'] . "</td>";
                                echo "<td>" . $siswa['alamat'] . "</td>";
                                echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
                                echo "<td>" . $siswa['agama'] . "</td>";
                                echo "<td>" . $siswa['sekolah_asal'] . "</td>";

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require "../assets/index.asset.php" ?>;
<?php require "partials/footer.php" ?>l