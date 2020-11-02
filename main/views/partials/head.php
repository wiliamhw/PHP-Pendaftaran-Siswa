<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Menu utama CRUD" />
    <meta name="author" content="WHW" />
    <title><?= $title ?> - <?= ucwords($_SESSION['role']); ?> </title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="../css/form.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../chartjs/dist/Chart.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.view.php">My Project</a>
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
                        <a class="nav-link" href="index.view.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php if ($_SESSION["role"] == "admin") : ?>
                            <div class="sb-sidenav-menu-heading">Edit data</div>
                            <a class="nav-link" href="list-siswa.view.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Daftar siswa
                            </a>
                            <a class="nav-link" href="form-daftar.view.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-database"></i></div>
                                Tambah siswa
                            </a>
                        <?php endif; ?>
                        <div class="sb-sidenav-menu-heading">Info</div>
                        <a class="nav-link" href="profile.view.php">
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