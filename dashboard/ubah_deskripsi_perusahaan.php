<?php
$query = mysqli_query($koneksi, "SELECT*FROM tbl_info_perusahaan WHERE nama='deskripsi'");
$data = mysqli_fetch_assoc($query);
?>
<h1 class="h3 mb-4 text-gray-800">Deskripsi Perusahaan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold tr-text-primary">Deskripsi Perusahaan</h6>
    </div>
    <form action="./proses/proses_info_perusahaan.php?aksi=ubah&info=deskripsi" method="POST">
        <div class="card-body">
            <div class="">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?= $data['isi'] ?></textarea>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                Ubah
            </button>
        </div>
    </form>
</div>