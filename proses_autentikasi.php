<?php

include './koneksi.php';
session_start();

if ($_GET['aksi'] == 'login') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if (!$username or !$password) {
        $_SESSION['toast_type'] = 'error';
        $_SESSION['toast_message'] = 'Username atau password tidak boleh kosong.';
        header('location:index.php');
        exit();
    }
    $query = mysqli_query($koneksi, "SELECT*FROM tbl_user WHERE username='$username' AND password='$password'");
    $check = mysqli_num_rows($query);

    if ($check > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['logged_in'] = true;
        $_SESSION['login_type'] = 'user';
        $_SESSION['username'] = $data['username'];
        $_SESSION['toast_type'] = 'success';
        $_SESSION['toast_message'] = 'Login berhasil.';
        header('location:dashboard');
    } else {
        $_SESSION['toast_type'] = 'error';
        $_SESSION['toast_message'] = 'Username atau password salah, silahkan coba kembali.';
        header('location:index.php');
        exit();
    }
}

if ($_GET['aksi'] == 'register') {
    $nama = $_POST['nama'];
    $no_bon = $_POST['no_bon'];
    $password = md5($_POST['password']);
    $no_handphone = $_POST['no_handphone'];

    if (!$nama || !$no_bon || !$password || $no_handphone) {
        $_SESSION['toast_type'] = 'error';
        $_SESSION['toast_message'] = 'Nama, no. bon, password, dan no. handphone tidak boleh kosong, silahkan isi!';
        header('location:daftar.php');
        exit();
    }

    $query = mysqli_query($koneksi, "SELECT*FROM tbl_user WHERE username='$no_bon'");
    $check = mysqli_num_rows($query);
    if ($check > 0) {
        $_SESSION['toast_type'] = 'error';
        $_SESSION['toast_message'] = 'Username telah ada, silahkan gunakan username yang lain.';
        header('location:daftar.php');
        exit();
    } else {
        echo mysqli_error($koneksi);
    }

    $query = mysqli_query($koneksi, "INSERT INTO tbl_user(nama, username, password, no_handphone) VALUES('$nama','$no_bon', '$password', '$no_handphone')");
    if ($query) {
        $_SESSION['toast_type'] = 'success';
        $_SESSION['toast_message'] = 'Proses daftar berhasil, silahkan login';
        header('location:index.php');
        exit();
    }
}

if ($_GET['aksi'] == 'logout') {
    unset($_SESSION['username']);
    header('location:index.php');
}
