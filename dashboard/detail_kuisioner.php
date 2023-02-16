<?php
$query = mysqli_query($koneksi, "SELECT*FROM tbl_kuisioner tk JOIN tbl_user tu ON tk.username = tu.username WHERE tk.id_kuisioner = '$_GET[id]'");
$res = mysqli_fetch_assoc($query);
?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kuisioner</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold">Detail Kuisioner</h6>
    </div>
    <form action="./proses/proses_kritik_dan_saran.php?aksi=tambah" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <p>No. BON</p>
                    <p>Nama</p>
                    <p>Tanggal Pengisian</p>
                </div>
                <div class="col-sm-4">
                    <p>: <?= $res['username'] ?></p>
                    <p>: <?= $res['nama'] ?></p>
                    <p>: <?= $res['tanggal'] ?></p>
                </div>
            </div>
            <br>
            <p><b>Kuisioner</b></p>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM tbl_pertanyaan");
            while ($data = mysqli_fetch_assoc($query)) {
                $query_jawaban = mysqli_query($koneksi, "SELECT*FROM tbl_jawaban tj JOIN tbl_pertanyaan tp ON tj.id_pertanyaan = tp.id_pertanyaan WHERE tj.id_kuisioner='$_GET[id]' AND tj.id_pertanyaan='$data[id_pertanyaan]' ");
                $data_jawaban = mysqli_fetch_assoc($query_jawaban);
            ?>
                <div class="form-group">
                    <label for="" class="form-label"><?= $no . '. ' . $data['pertanyaan'] ?></label>
                    <input type="hidden" name="id_pertanyaan[]" value="<?= $data['id_pertanyaan'] ?>">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $no - 1 ?>]" id="jawaban_kb<?= $no ?>" value="KB" required <?= $data_jawaban['jawaban'] == 'KB' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="jawaban_kb<?= $no ?>">
                            Kurang Baik
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $no - 1 ?>]" id="jawaban_sb<?= $no ?>" value="SB" required <?= $data_jawaban['jawaban'] == 'SB' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="jawaban_sb<?= $no ?>">
                            Sangat Baik
                        </label>
                    </div>
                </div>

            <?php
                $no++;
            }
            ?>
        </div>
    </form>
</div>