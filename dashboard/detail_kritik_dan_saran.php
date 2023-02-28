<?php
$query = mysqli_query($koneksi, "SELECT*FROM tbl_kritik_dan_saran tkds JOIN tbl_user tu ON tkds.username = tu.username WHERE tkds.id_kritik_dan_saran = '$_GET[id]'");
$res = mysqli_fetch_assoc($query);
?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kritik & Saran</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold">Detail Kritik & Saran</h6>
    </div>
    <form action="./proses/proses_kritik_dan_saran.php?aksi=tambah" method="POST">
        <div class="card-body">
            <div class="row">
                <table class="table table-borderless">
                    <tr>
                        <td width="200">No. BON</td>
                        <td>: <?= $res['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: <?= $res['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengisian</td>
                        <td>: <?= $res['tanggal'] ?></td>
                    </tr>
                    <tr>
                        <td>Kritik</td>
                        <td>: <?= $res['kritik'] ?></td>
                    </tr>
                    <tr>
                        <td>Saran</td>
                        <td>: <?= $res['saran'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>