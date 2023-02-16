<?php

session_start();
include '../../koneksi.php';

if ($_GET['aksi'] == 'tambah') {
    $id_pertanyaan = $_POST['id_pertanyaan'];
    $evaluasi = $_POST['evaluasi'];

    if ($evaluasi == '') {
        $_SESSION['toast_type'] = 'error';
        $_SESSION['toast_message'] = 'Silahkan lengkapi semua data.';
        header('location:../index.php?halaman=tambah-evaluasi');
        exit();
    }

    $query = mysqli_query($koneksi, "INSERT INTO tbl_evaluasi (id_pertanyaan, evaluasi) VALUES('$id_pertanyaan', '$evaluasi')");
    if ($query) {
        $_SESSION['toast_type'] = 'success';
        $_SESSION['toast_message'] = 'Tambah data evaluasi berhasil.';
        header('location:../index.php?halaman=evaluasi');
    } else {
        echo mysqli_error($koneksi);
    }
}

if ($_GET['aksi'] == 'ubah') {
    $id = $_GET['id'];
    $pertanyaan = $_POST['pertanyaan'];
    $aspek = $_POST['aspek'];

    $query = mysqli_query($koneksi, "UPDATE tbl_pertanyaan set pertanyaan='$pertanyaan', id_aspek='$aspek' WHERE id_pertanyaan='$id'");

    if ($query) {
        $_SESSION['toast_type'] = 'success';
        $_SESSION['toast_message'] = 'Ubah data pertanyaan berhasil.';
        header('location:../index.php?halaman=pertanyaan');
    } else {
        echo mysqli_error($koneksi);
    }
}

if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "DELETE FROM tbl_evaluasi WHERE id_evaluasi='$id'");

    if ($query) {
        $_SESSION['toast_type'] = 'success';
        $_SESSION['toast_message'] = 'Hapus data evaluasi berhasil';
        header('location:../index.php?halaman=evaluasi');
    }
}
