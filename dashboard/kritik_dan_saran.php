<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kritik & Saran</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold">Data Kritik & Saran</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. BON</th>
                        <th>Nama</th>
                        <th>Tanggal Pengisian</th>
                        <th width="60px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM tbl_kritik_dan_saran tkds JOIN tbl_user tu ON tkds.username = tu.username");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td>
                                <a href="index.php?halaman=detail-kritik-dan-saran&id=<?= $data['id_kritik_dan_saran'] ?>">
                                    <button class="btn btn-info btn-sm">Detail</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>