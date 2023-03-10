<?php
if ($check_user == 0) {
    header('location:login.php');
    exit();
}
?>

<div class="container my-5 p-5 rounded bg-white shadow-sm">
    <h1 class="h3 mb-4 text-gray-800">Kuisioner</h1>
    <form action="./proses/proses_kuisioner.php?aksi=tambah" method="POST">
        <?php
        $query = mysqli_query($koneksi, "SELECT*FROM tbl_kuisioner WHERE username='$user[username]'");
        $check = mysqli_num_rows($query);
        if ($check > 0) {

        ?>
            <div class="alert alert-danger" role="alert">
                Anda sudah mengisi Kuisioner.
            </div>
    </form>
</div>
<?php
        } else {
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM tbl_pertanyaan");
            while ($data = mysqli_fetch_assoc($query)) {
?>
    <div class="form-group">
        <label for="" class="form-label"><?= $no . '. ' . $data['pertanyaan'] ?></label>
        <input type="hidden" name="id_pertanyaan[]" value="<?= $data['id_pertanyaan'] ?>">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban[<?= $no - 1 ?>]" id="jawaban_kb<?= $no ?>" value="KB" required>
            <label class="form-check-label" for="jawaban_kb<?= $no ?>">
                Kurang Baik
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban[<?= $no - 1 ?>]" id="jawaban_sb<?= $no ?>" value="SB" required>
            <label class="form-check-label" for="jawaban_sb<?= $no ?>">
                Sangat Baik
            </label>
        </div>
    </div>

<?php
                $no++;
            }
?>
<div class="form-group mt-3 d-flex justify-content-end">
    <button type="submit" class="btn btn-success">
        Simpan
    </button>
</div>
</form>
</div>
<?php } ?>