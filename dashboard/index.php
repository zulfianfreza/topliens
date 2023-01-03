<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['toast_type'] = 'error';
    $_SESSION['toast_message'] = 'Silahkan login terlebih dahulu';
    header('location:../index.php');
    exit();
}
include '../koneksi.php';
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
$query = mysqli_query($koneksi, "SELECT*FROM tbl_user where username='$_SESSION[username]'");
$user = mysqli_fetch_assoc($query);
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CV. Topliens Tekhnik</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">

    <?php
    if (isset($_SESSION['toast_type'])) {
        if ($_SESSION['toast_type'] == 'error') {

    ?>
            <script>
                toastr.error('<?= $_SESSION['toast_message'] ?>');
            </script>
        <?php
        } else if ($_SESSION['toast_type'] == 'success') {

        ?>
            <script>
                toastr.success('<?= $_SESSION['toast_message'] ?>');
            </script>
        <?php
        } else if ($_SESSION['toast_type'] == 'sw2_success') {
        ?>
            <script>
                Swal.fire(
                    'Terimakasih!',
                    '<?= $_SESSION['toast_message'] ?>',
                    'success'
                )
            </script>
    <?php
        }
    }
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">
                    CV. Topliens Tekhnik
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $halaman == '' ? 'active' : '' ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>


            <li class="nav-item <?= $halaman == 'deskripsi-perusahaan' || $halaman == 'tambah-deskripsi-perusahaan' || $halaman == 'ubah-deskripsi-perusahaan' ? 'active' : '' ?>">
                <a class="nav-link" href="index.php?halaman=deskripsi-perusahaan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Deskripsi Perusahaan</span>
                </a>
            </li>

            <li class="nav-item <?= $halaman == 'info-layanan' || $halaman == 'tambah-info-layanan' || $halaman == 'ubah-info-layanan' ? 'active' : '' ?>">
                <a class="nav-link" href="index.php?halaman=info-layanan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Info Layanan</span>
                </a>
            </li>

            <?php
            if ($user['role'] == 'admin') {
            ?>

                <li class="nav-item <?= $halaman == 'pertanyaan' || $halaman == 'tambah-pertanyaan' || $halaman == 'ubah-pertanyaan' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?halaman=pertanyaan">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Pertanyaan</span>
                    </a>
                </li>

                <li class="nav-item <?= $halaman == 'akumulasi' || $halaman == 'tambah-akumulasi' || $halaman == 'ubah-akumulasi' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?halaman=akumulasi">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Akumulasi Kritik & Saran</span>
                    </a>
                </li>

                <li class="nav-item <?= $halaman == 'evaluasi' || $halaman == 'tambah-evaluasi' || $halaman == 'ubah-evaluasi' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?halaman=evaluasi">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Evaluasi</span>
                    </a>
                </li>

            <?php
            }
            ?>

            <?php
            if ($user['role'] == 'customer') {


            ?>
                <li class="nav-item <?= $halaman == 'kritik-dan-saran' || $halaman == 'tambah-kritik-dan-saran' || $halaman == 'ubah-kritik-dan-saran' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?halaman=kritik-dan-saran">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Kritik & Saran</span>
                    </a>
                </li>
            <?php
            }
            ?>



            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a href="../proses_autentikasi.php?aksi=logout" class="nav-link">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['login_type'] == 'user' ?  $user['nama']  : $user['nama_pegawai'] ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php
                    if ($halaman == '') {
                        include './home.php';
                    } else if ($halaman == 'pertanyaan') {
                        include './pertanyaan.php';
                    } else if ($halaman == 'tambah-pertanyaan') {
                        include './tambah_pertanyaan.php';
                    } else if ($halaman == 'ubah-pertanyaan') {
                        include './ubah_pertanyaan.php';
                    } else if ($halaman == 'deskripsi-perusahaan') {
                        include './deskripsi_perusahaan.php';
                    } else if ($halaman == 'ubah-deskripsi-perusahaan') {
                        include './ubah_deskripsi_perusahaan.php';
                    } else if ($halaman == 'info-layanan') {
                        include './info_layanan.php';
                    } else if ($halaman == 'ubah-info-layanan') {
                        include './ubah_info_layanan.php';
                    } else if ($halaman == 'kritik-dan-saran') {
                        include './kritik_dan_saran.php';
                    } else if ($halaman == 'akumulasi') {
                        include './akumulasi.php';
                    } else if ($halaman == 'evaluasi') {
                        include './evaluasi.php';
                    }
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CV. Topliens Tekhnik 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php
    if (isset($_SESSION['toast_type'])) {
        unset($_SESSION['toast_type']);
        unset($_SESSION['toast_message']);
    }
    ?>


    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>

</body>

</html>