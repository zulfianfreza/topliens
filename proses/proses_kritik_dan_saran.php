<?php

date_default_timezone_set('Asia/Jakarta');

session_start();
include '../koneksi.php';

if ($_GET['aksi'] == 'tambah') {
    $kritik = $_POST['kritik'];
    $saran = $_POST['saran'];
    $sekarang = date("Y-m-d H:i:s");

    $query = mysqli_query($koneksi, "INSERT INTO tbl_kritik_dan_saran (username, tanggal, kritik, saran) VALUES('$_SESSION[username]', '$sekarang', '$kritik', '$saran')");
    $_SESSION['toast_type'] = 'sw2_success';
    $_SESSION['toast_message'] = 'Terima Kasih atas partisipasi anda untuk memberikan penilaian dalam upaya perbaikan kualitas pelayanan jasa perbaikan.';
    header('location:../index.php?halaman=kritik-dan-saran');
}
