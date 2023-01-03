<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Evaluasi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold">Akumulasi Kritik & Saran Pada Jasa Pelayanan Perbaikan CV. Topliens Tekhnik</h6>
        <a href="index.php?halaman=tambah-pertanyaan" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aspek</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM tbl_aspek");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <?php
                            $sb = 0;
                            $total = 0;
                            $persentase = 0;
                            $query2 = mysqli_query($koneksi, "SELECT*FROM tbl_pertanyaan WHERE id_aspek='$data[id_aspek]'");
                            while ($data2 = mysqli_fetch_assoc($query2)) {
                                $query3 = mysqli_query($koneksi, "SELECT (SELECT COUNT(jawaban) FROM tbl_jawaban WHERE id_pertanyaan='$data2[id_pertanyaan]' AND jawaban='SB') as sb, COUNT(jawaban) as total FROM tbl_jawaban WHERE id_pertanyaan='$data2[id_pertanyaan]'");
                                $data3 = mysqli_fetch_assoc($query3);
                                $sb = $sb + $data3['sb'];
                                $total = $total + $data3['total'];
                                $persentase = round(($sb / $total) * 100, 2);
                            }
                            ?>
                            <td><?= $persentase ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <button type="button" class="btn btn-success">
            Lihat Rekomendasi Perbaikan Layanan Jasa Perbaikan
        </button>
    </div>
</div>