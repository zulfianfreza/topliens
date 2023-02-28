<?php
if ($check_user == 0) {
    header('location:login.php');
    exit();
}
?>

<div class="container my-5 p-5 rounded bg-white shadow-sm">
    <h1 class="h3 mb-4 text-gray-800">Kritik & Saran</h1>
    <form action="./proses/proses_kritik_dan_saran.php?aksi=tambah" method="POST">
        <?php
        $query = mysqli_query($koneksi, "SELECT*FROM tbl_kritik_dan_saran WHERE username='$user[username]'");
        $check = mysqli_num_rows($query);
        if ($check > 0) {

        ?>
            <div class="alert alert-danger" role="alert">
                Anda sudah mengisi Kritik & Saran.
            </div>
    </form>
</div>
<?php
        } else {
?>
    <div class="form-group">
        <label for="" class="form-label">Kritik</label>
        <textarea name="kritik" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group mt-3">
        <label for="" class="form-label">Saran</label>
        <textarea name="saran" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group mt-3 d-flex justify-content-end">
        <button type="submit" class="btn btn-success">
            Simpan
        </button>
    </div>
    </form>
    </div>
<?php } ?>