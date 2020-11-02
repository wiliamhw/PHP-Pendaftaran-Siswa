<?php
// Check if the user isn't logged in yet, if yes then redirect him to welcome page
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../../entry/index.php");
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
    <title>Dashboard - <?= ucwords($_SESSION['role']); ?> </title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../chartjs/dist/Chart.js"></script>
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
                    <a class="dropdown-item" href="../../entry/views/reset-pass.view.php">Reset password</a>
                    <?php if ($_SESSION["role"] == "admin") : ?>
                        <a class="dropdown-item" href="../../entry/views/admin-reg.view.php">Register admin</a>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../entry/assets/logout.asset.php">Logout</a>
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
                        <?php if ($_SESSION["role"] == "admin") : ?>
                            <div class="sb-sidenav-menu-heading">Edit data</div>
                            <a class="nav-link" href="list-siswa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Daftar siswa
                            </a>
                            <a class="nav-link" href="form-daftar.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-database"></i></div>
                                Tambah siswa
                            </a>
                        <?php endif; ?>
                        <div class="sb-sidenav-menu-heading">Info</div>
                        <a class="nav-link" href="profil.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                            Profil sekolah
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= ucwords($_SESSION['role']) ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
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
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Acme 2020</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Bar Chart
        var ctx = document.getElementById("myBarChart");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Laki-laki", "Perempuan"],
                datasets: [{
                    label: "Jenis Kelamin",
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)'

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    data: [
                        <?php
                        $jumlah_laki = mysqli_query($mysqli, "select * from calon_siswa where jenis_kelamin='Laki-laki'");
                        echo mysqli_num_rows($jumlah_laki);
                        ?>,
                        <?php
                        $jumlah_perempuan = mysqli_query($mysqli, "select * from calon_siswa where jenis_kelamin='Perempuan'");
                        echo mysqli_num_rows($jumlah_perempuan);
                        ?>,
                    ],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'gender'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: <?php
                                    $jumlah_data = mysqli_query($mysqli, "select * from calon_siswa");
                                    echo mysqli_num_rows($jumlah_data);
                                    ?>,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });
    </script>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Islam", "Kristen", "Katolik", "Hindu", "Budha"],
                datasets: [{
                    data: [
                        <?php
                        $jumlah_islam = mysqli_query($mysqli, "select * from calon_siswa where agama='Islam'");
                        echo mysqli_num_rows($jumlah_islam);
                        ?>,
                        <?php
                        $jumlah_kristen = mysqli_query($mysqli, "select * from calon_siswa where agama='Kristen'");
                        echo mysqli_num_rows($jumlah_kristen);
                        ?>,
                        <?php
                        $jumlah_katolik = mysqli_query($mysqli, "select * from calon_siswa where agama='Katolik'");
                        echo mysqli_num_rows($jumlah_katolik);
                        ?>,
                        <?php
                        $jumlah_hindu = mysqli_query($mysqli, "select * from calon_siswa where agama='Hindu'");
                        echo mysqli_num_rows($jumlah_hindu);
                        ?>,
                        <?php
                        $jumlah_buddha = mysqli_query($mysqli, "select * from calon_siswa where agama='Budha'");
                        echo mysqli_num_rows($jumlah_buddha);
                        ?>,
                    ],
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#800080'],
                }],
            },
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>