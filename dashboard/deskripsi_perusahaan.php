<h1 class="h3 mb-4 text-gray-800">Deskripsi Perusahaan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold tr-text-primary">Deskripsi Perusahaan</h6>
        <?php
        if ($user['role'] == 'admin') {
        ?>
            <a href="index.php?halaman=ubah-deskripsi-perusahaan" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Ubah
            </a>
        <?php
        }
        ?>
    </div>
    <div class="card-body">
        <div class="">
            <?php
            $query = mysqli_query($koneksi, "SELECT*FROM tbl_info_perusahaan WHERE nama='deskripsi'");
            $data = mysqli_fetch_assoc($query);
            ?>
            <p>
                <?= nl2br(str_replace('\r\n', "\n", $data['isi'])) ?>
            </p>
        </div>
    </div>
</div>