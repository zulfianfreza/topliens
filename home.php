<div class="hero" style="width:100%; height: 350px; background-image: url('assets/img/hero.jpeg'); background-size: cover; background-position: center;"></div>
<div class="container my-5">
    <?php
    $query = mysqli_query($koneksi, "SELECT*FROM tbl_info_perusahaan WHERE nama='deskripsi'");
    $data = mysqli_fetch_assoc($query);

    ?>
    <h5>Deskripsi</h5>
    <p>
        <?= nl2br(str_replace('\r\n', "\n", $data['isi'])) ?>
    </p>
</div>