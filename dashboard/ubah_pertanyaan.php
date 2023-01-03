<?php
$query = mysqli_query($koneksi, "SELECT*FROM tbl_pertanyaan WHERE id_pertanyaan='$_GET[id]'");
$res = mysqli_fetch_assoc($query);
?>
<h1 class="h3 mb-4 text-gray-800">Pegawai</h1>

<!-- resTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold tr-text-primary">Tambah Pegawai</h6>
    </div>
    <form action="./proses/proses_pertanyaan.php?aksi=ubah&id=<?= $res['id_pertanyaan'] ?>" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Pertanyaan</label>
                <textarea name="pertanyaan" id="" cols="30" rows="3" class="form-control"><?= $res['pertanyaan'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Aspek</label>
                <select name="aspek" id="" class="form-control">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT*FROM tbl_aspek");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <option value="<?= $data['id_aspek'] ?>" <?= $data['id_aspek'] == $res['id_aspek'] ? 'selected' : '' ?>><?= $data['nama'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                Ubah
            </button>
        </div>
    </form>
</div>