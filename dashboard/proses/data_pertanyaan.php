<?php
include '../../koneksi.php';

$temp = [];
$query = mysqli_query($koneksi, "SELECT*FROM tbl_pertanyaan WHERE id_pertanyaan='$_GET[id]'");
while ($data = mysqli_fetch_assoc($query)) {
    $temp = $data;
}

echo json_encode($temp);
