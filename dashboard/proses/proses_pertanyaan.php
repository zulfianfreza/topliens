<?php

session_start();
include '../../koneksi.php';

if ($_GET['aksi'] == 'tambah') {
    $pertanyaan = $_POST['pertanyaan'];
    $id_pertanyaan = $_POST['id_pertanyaan'];
    $aspek = $_POST['aspek'];

    if ($pertanyaan == '' or $aspek == '' or $id_pertanyaan == '') {
        $_SESSION['toast_type'] = 'error';
        $_SESSION['toast_message'] = 'Silahkan lengkapi semua data.';
        header('location:../index.php?halaman=tambah-pertanyaan');
        exit();
    }

    $query = mysqli_query($koneksi, "INSERT INTO tbl_pertanyaan (id_pertanyaan, pertanyaan, id_aspek) VALUES('$id_pertanyaan', '$pertanyaan', '$aspek')");
    if ($query) {
        $_SESSION['toast_type'] = 'success';
        $_SESSION['toast_message'] = 'Tambah data pertanyaan berhasil.';
        header('location:../index.php?halaman=pertanyaan');
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

    $query = mysqli_query($koneksi, "DELETE FROM tbl_pertanyaan WHERE id_pertanyaan='$id'");

    if ($query) {
        $_SESSION['toast_type'] = 'success';
        $_SESSION['toast_message'] = 'Hapus data pertanyaan berhasil';
        header('location:../index.php?halaman=pertanyaan');
    }
}
