<?php

date_default_timezone_set('Asia/Jakarta');

session_start();
include '../koneksi.php';

if ($_GET['aksi'] == 'tambah') {
    $id_pertanyaan = $_POST['id_pertanyaan'];
    $jawaban = $_POST['jawaban'];
    $sekarang = date("Y-m-d H:i:s");

    $query = mysqli_query($koneksi, "INSERT INTO tbl_kuisioner (username, tanggal) VALUES('$_SESSION[username]', '$sekarang')");
    if ($query) {
        $id =  mysqli_insert_id($koneksi);

        for ($i = 0; $i < count($jawaban); $i++) {
            $query = mysqli_query($koneksi, "INSERT INTO tbl_jawaban (id_kuisioner, id_pertanyaan, jawaban) VALUES ('$id', '$id_pertanyaan[$i]', '$jawaban[$i]')");

            if (!$query) {
                echo mysqli_error($koneksi);
            }
        }
        $_SESSION['toast_type'] = 'sw2_success';
        $_SESSION['toast_message'] = 'Terima Kasih atas partisipasi anda untuk memberikan penilaian dalam upaya perbaikan kualitas pelayanan jasa perbaikan.';
        header('location:../index.php?halaman=kuisioner');
    }
}
