<?php
// Check if the user isn't logged in yet, if yes then redirect him to welcome page
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../../entry/index.php");
    exit;
} else if ($_SESSION["role"] == "user") {
    header("location: index.php");
    exit;
}

// Includue config file
require_once "../../config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Menu utama CRUD" />
    <meta name="author" content="WHW" />
    <title>Read data</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">My Project</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul id="navbar" class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../../entry/reset-password.php">Reset password</a>
                    <a class="dropdown-item" href="../../entry/register.php">Register admin</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../entry/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu utama</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Edit data</div>
                        <a class="nav-link" href="list-siswa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Daftar siswa
                        </a>
                        <a class="nav-link" href="form-daftar.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-database"></i></div>
                            Tambah siswa
                        </a>
                        <div class="sb-sidenav-menu-heading">Info</div>
                        <a class="nav-link" href="profil.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                            Profil sekolah
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= ucwords($_SESSION['username']) ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Daftar siswa</li>
                    </ol>
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
                                            <th>Edit</th>
                                            <th>Hapus</th>
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
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM calon_siswa";
                                        $stmt = $mysqli->query($query);
                                        $counter = 1;

                                        while ($siswa = $stmt->fetch_array()) : ?>
                                            <tr>

                                                <td><?= $counter++ ?></td>
                                                <td><?= $siswa['id'] ?></td>
                                                <td><?= $siswa['nama'] ?></td>
                                                <td><?= $siswa['alamat'] ?></td>
                                                <td><?= $siswa['jenis_kelamin'] ?></td>
                                                <td><?= $siswa['agama'] ?></td>
                                                <td><?= $siswa['sekolah_asal'] ?></td>

                                                <td>
                                                    <a href="form-edit.php?id=<?= $siswa['id'] ?>"><button id='edit' type='button' class='btn btn-info'>Edit</button></a>
                                                </td>
                                                <td>
                                                    <a href="../../hapus.php?id=<?= $siswa['id'] ?>" onclick="return confirm('Tetap ingin menghapus <?= $siswa['nama'] ?> (Id=<?= $siswa['id'] ?>)');">
                                                        <button id='hapus' type='button' class='btn btn-danger'>Hapus</button>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Acme 2020</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>