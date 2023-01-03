<?php

session_start();
include '../../koneksi.php';

if ($_GET['aksi'] == 'ubah') {
    if ($_GET['info'] == 'deskripsi') {
        $deskripsi = $_POST['deskripsi'];

        $query = mysqli_query($koneksi, "UPDATE tbl_info_perusahaan SET isi='$deskripsi' WHERE nama='deskripsi'");

        if ($query) {
            $_SESSION['toast_type'] = 'success';
            $_SESSION['toast_message'] = 'Deskripsi perusahaan berhasil di ubah';
            header('location:../index.php?halaman=deskripsi-perusahaan');
        }
    }

    if ($_GET['info'] == 'info_layanan') {
        $deskripsi = $_POST['deskripsi'];

        $query = mysqli_query($koneksi, "UPDATE tbl_info_perusahaan SET isi='$deskripsi' WHERE nama='info_layanan'");

        if ($query) {
            $_SESSION['toast_type'] = 'success';
            $_SESSION['toast_message'] = 'Info layanan berhasil di ubah';
            header('location:../index.php?halaman=info-layanan');
        }
    }
}
