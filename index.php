<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include './koneksi.php';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$query = mysqli_query($koneksi, "SELECT*FROM tbl_user WHERE username='$username'");
$check_user = mysqli_num_rows($query);
$user = mysqli_fetch_assoc($query);
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV. Topliens Tekhnik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./assets/css/style.css">

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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

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

    <div class="min-vh-100 d-flex flex-column bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="./assets/img/logo.png" alt="" class="d-inline-block align-text-top" height="50px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= $halaman == '' ? 'active' : '' ?>" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link <?= $halaman == 'kuisioner' ? 'active' : '' ?>" href="index.php?halaman=kuisioner">Kuisioner</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link <?= $halaman == 'kritik-dan-saran' ? 'active' : '' ?>" href="index.php?halaman=kritik-dan-saran">Kritik & Saran</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-x-2">
                        <?php
                        if ($check_user > 0) {
                        ?>
                            <div class="dropdown">
                                <a class="dropdown-toggle text-decoration-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $user['nama'] ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="./proses/proses_autentikasi.php?aksi=logout">Logout</a></li>
                                </ul>
                            </div>
                        <?php
                        } else {
                        ?>
                            <a href="./login.php" class="btn btn-outline-primary me-2 ms-2" type="submit">Masuk</a>
                            <a href="./daftar.php" class="btn btn-primary" type="submit">Daftar</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
        if ($halaman == '') {
            include './home.php';
        } else if ($halaman == 'kuisioner') {
            include './kuisioner.php';
        } else if ($halaman == 'kritik-dan-saran') {
            include './kritik_dan_saran.php';
        }
        ?>

        <div class="w-100 bg-dark text-white pt-5 pb-4 mt-auto">
            <div class="container">
                <p>Copyright &copy; CV. Topliens Tekhnik 2022</p>
            </div>
        </div>

    </div>

    <?php
    if (isset($_SESSION['toast_type'])) {
        unset($_SESSION['toast_type']);
        unset($_SESSION['toast_message']);
    }
    ?>

</body>

</html>