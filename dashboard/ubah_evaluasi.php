<?php
$query = mysqli_query($koneksi, "SELECT*FROM tbl_evaluasi te JOIN tbl_pertanyaan tp ON te.id_pertanyaan = tp.id_pertanyaan WHERE te.id_evaluasi='$_GET[id]'");
$res = mysqli_fetch_assoc($query);
?>
<h1 class="h3 mb-4 text-gray-800">Pertanyaan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold tr-text-primary">Tambah Pertanyaan</h6>
    </div>
    <form action="./proses/proses_evaluasi.php?aksi=tambah" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">ID Pertanyaan</label>
                <input type="text" value="<?= $res['id_pertanyaan'] ?>" name="id_pertanyaan" readonly class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">Pertanyaan</label>
                <textarea name="pertanyaan" readonly id="pertanyaan" cols="30" rows="3" class="form-control"><?= $res['pertanyaan'] ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Evaluasi</label>
                <textarea name="evaluasi" id="" cols="30" rows="10" class="form-control"><?= $res['evaluasi'] ?></textarea>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                Simpan
            </button>
        </div>
    </form>
</div>


<script>
    async function getPertanyaan() {
        d = document.getElementById('id_pertanyaan').value;
        const url = 'http://localhost/topliens/dashboard/proses/data_pertanyaan.php?id=' + d;
        const data = await getAPI(url);

        console.log(data)

        document.getElementById('pertanyaan').value = data['pertanyaan'];

    }
    async function getAPI(url) {
        const response = await fetch(url);
        var data = await response.json();
        return data;
    }
</script>