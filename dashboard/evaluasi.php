<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Pertanyaan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold">Data Pertanyaan</h6>
        <a href="index.php?halaman=tambah-evaluasi" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>VAR</th>
                        <th>Pertanyaan</th>
                        <th>Evaluasi</th>
                        <th width="60px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM tbl_evaluasi te JOIN tbl_pertanyaan tp ON te.id_pertanyaan = tp.id_pertanyaan ORDER BY te.id_pertanyaan");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['id_pertanyaan'] ?></td>
                            <td><?= $data['pertanyaan'] ?></td>
                            <td><?= $data['evaluasi'] ?></td>
                            <td>
                                <a href="index.php?halaman=ubah-evaluasi&id=<?= $data['id_evaluasi'] ?>">
                                    <button class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i></button>
                                </a>
                                <a href="./proses/proses_evaluasi.php?aksi=hapus&id=<?= $data['id_evaluasi'] ?>">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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