<h1 class="h3 mb-4 text-gray-800">Info Layanan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold tr-text-primary">Info Layanan</h6>
        <?php
        if ($user['role'] == 'admin') {
        ?>
            <a href="index.php?halaman=ubah-info-layanan" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Ubah
            </a>
        <?php
        }
        ?>
    </div>
    <div class="card-body">
        <div class="">
            <?php
            $query = mysqli_query($koneksi, "SELECT*FROM tbl_info_perusahaan WHERE nama='info_layanan'");
            $data = mysqli_fetch_assoc($query);
            ?>
            <p>
                <?= nl2br(str_replace('\r\n', "\n", $data['isi'])) ?>
            </p>
        </div>
    </div>
</div>