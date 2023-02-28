<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<?php
$bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$periode = isset($_GET['periode']) ? $_GET['periode'] : date('m');
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Rekomendasi Hasil Evaluasi</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-end">
        <h6 class="font-weight-bold">Periode</h6>
    </div>
    <form action="" method="GET">
        <input type="hidden" name="halaman" value="rekomendasi">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <select name="periode" id="" class="form-control">
                        <?php

                        for ($i = 0; $i < 12; $i++) {
                        ?>
                            <option value="<?= $i + 1 ?>" <?= ($i + 1) == $periode ? 'selected' : '' ?>><?= $bulan[$i] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select name="tahun" id="" class="form-control">
                        <option value="<?= $tahun - 1 ?>"><?= $tahun - 1 ?></option>
                        <option value="<?= $tahun ?>" selected><?= $tahun ?></option>
                        <option value="<?= $tahun + 1 ?>"><?= $tahun + 1 ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end align-items-center">
            <button class="btn btn-primary btn-sm" type="submit">Filter</button>
        </div>
    </form>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold">Rekomendasi Hasil Evaluasi Pada Jasa Pelayanan Perbaikan CV. Topliens Tekhnik</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Atribut</th>
                        <th rowspan="2">Pertanyaan</th>
                        <th colspan="2">Ekspektasi Pelayanan</th>
                        <th colspan="2">Persepsi Pelayanan</th>
                        <th colspan="2" rowspan="2">Nilai GAP 5 (q)</th>
                    </tr>
                    <tr>
                        <th>Nilai Pembobotan (NPE)</th>
                        <th>Rata-rata Ekspektasi (E)</th>
                        <th>Nilai Pembobotan (NPP)</th>
                        <th>Rata-rata Ekspektasi (P)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $temp_id = [];
                    $temp_q = [];
                    $query = mysqli_query($koneksi, "SELECT*FROM tbl_pertanyaan");
                    while ($data = mysqli_fetch_assoc($query)) {
                        $persen = 0;
                        if ($data['id_pertanyaan'] == 'V1') {
                            $persen = 0.867;
                        } else if ($data['id_pertanyaan'] == 'V2') {
                            $persen = 0.8;
                        } else if ($data['id_pertanyaan'] == 'V3') {
                            $persen = 0.767;
                        } else if ($data['id_pertanyaan'] == 'V4') {
                            $persen = 0.93;
                        } else if ($data['id_pertanyaan'] == 'V5') {
                            $persen = 0.867;
                        } else if ($data['id_pertanyaan'] == 'V6') {
                            $persen = 0.967;
                        } else if ($data['id_pertanyaan'] == 'V7') {
                            $persen = 0.9;
                        } else if ($data['id_pertanyaan'] == 'V8') {
                            $persen = 0.8;
                        } else {
                            $persen = 0.833;
                        }
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['id_pertanyaan'] ?></td>
                            <td><?= $data['pertanyaan'] ?></td>
                            <?php

                            $query_sb = mysqli_query($koneksi, "SELECT*FROM tbl_jawaban tj JOIN tbl_kuisioner tk ON tj.id_kuisioner = tk.id_kuisioner WHERE tj.id_pertanyaan='$data[id_pertanyaan]' AND tj.jawaban='SB' AND MONTH(tk.tanggal)='$periode' AND YEAR(tk.tanggal)='$tahun'");
                            $query_kb = mysqli_query($koneksi, "SELECT*FROM tbl_jawaban tj JOIN tbl_kuisioner tk ON tj.id_kuisioner = tk.id_kuisioner WHERE tj.id_pertanyaan='$data[id_pertanyaan]' AND tj.jawaban='KB' AND MONTH(tk.tanggal)='$periode' AND YEAR(tk.tanggal)='$tahun'");
                            $query_jumlah = mysqli_query($koneksi, "SELECT*FROM tbl_jawaban tj JOIN tbl_kuisioner tk ON tj.id_kuisioner = tk.id_kuisioner WHERE tj.id_pertanyaan='$data[id_pertanyaan]' AND MONTH(tk.tanggal)='$periode' AND YEAR(tk.tanggal)='$tahun'");
                            $jumlah_sb = mysqli_num_rows($query_sb);
                            $jumlah_kb = mysqli_num_rows($query_kb);
                            $jumlah = mysqli_num_rows($query_jumlah);
                            $ekspektasi_sb = round($jumlah * $persen);
                            $ekspektasi_kb = $jumlah - $ekspektasi_sb;
                            $npe = $jumlah == 0 ? 0 : ($ekspektasi_sb * 5) + ($ekspektasi_kb * 1);
                            $e = $jumlah == 0 ? 0 : $npe / $jumlah;
                            $npp = $jumlah == 0 ? 0 : ($jumlah_sb * 5) + ($jumlah_kb * 1);
                            $p = $jumlah == 0 ? 0 : $npp / $jumlah;
                            $q = $jumlah == 0 ? 0 : round($p, 2) - round($e, 2);
                            $jumlah == 0 ? '' : array_push($temp_id, $data['id_pertanyaan']);
                            $jumlah == 0 ? '' : array_push($temp_q, $q);
                            ?>
                            <td><?= $npe ?></td>
                            <td><?= round($e, 2) ?></td>
                            <td><?= $npp ?></td>
                            <td><?= round($p, 2) ?> </td>
                            <td><?= $q ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end gap-x-2">
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".modal-evaluasi">
            Evaluasi
        </button>
        <!-- <button type="button" class="btn btn-primary ml-2 btn-sm" data-toggle="modal" data-target=".modal-diagram">
            Diagram
        </button> -->
    </div>
</div>

<div class="modal fade modal-diagram" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Diagram Akumulasi Bulan <?= $bulan[$periode - 1] ?> Tahun <?= $tahun ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-evaluasi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Diagram</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (count($temp_id) > 0) {
                    $temp_q = array_filter($temp_q, function ($v) {
                        return $v < 0;
                    });
                    $min = min($temp_q);
                    $index = array_search($min, $temp_q);
                    $query = mysqli_query($koneksi, "SELECT*FROM tbl_pertanyaan WHERE id_pertanyaan='$temp_id[$index]'");
                    $data = mysqli_fetch_assoc($query);
                ?>
                    <p><b>(<?= $temp_id[$index] ?>)</b> <?= $data['pertanyaan'] ?></p>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT*FROM tbl_evaluasi WHERE id_pertanyaan='$temp_id[$index]'");
                    $res = mysqli_fetch_assoc($query);
                    ?>
                    <p><?= $res['evaluasi'] ?></p>
                <?php
                } else {
                ?>
                    <p>Data Kosong !</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
$temp_id_pertanyaan = [];
$temp_sb = [];
$temp_kb = [];
$query = mysqli_query($koneksi, "SELECT tp1.id_pertanyaan, (SELECT count(jawaban) FROM tbl_jawaban JOIN tbl_kuisioner ON tbl_jawaban.id_kuisioner = tbl_kuisioner.id_kuisioner WHERE tbl_jawaban.id_pertanyaan=tp1.id_pertanyaan AND tbl_jawaban.jawaban='SB' AND MONTH(tbl_kuisioner.tanggal)='$periode' AND YEAR(tbl_kuisioner.tanggal)='$tahun') as 'SB', (SELECT count(jawaban) FROM tbl_jawaban JOIN tbl_kuisioner ON tbl_jawaban.id_kuisioner = tbl_kuisioner.id_kuisioner WHERE tbl_jawaban.id_pertanyaan=tp1.id_pertanyaan AND tbl_jawaban.jawaban='KB' AND MONTH(tbl_kuisioner.tanggal)='$periode' AND YEAR(tbl_kuisioner.tanggal)='$tahun') as 'KB' FROM tbl_pertanyaan tp1 ORDER BY tp1.id_pertanyaan");
while ($data = mysqli_fetch_assoc($query)) {
    array_push($temp_id_pertanyaan, $data['id_pertanyaan']);
    array_push($temp_sb, $data['SB']);
    array_push($temp_kb, $data['KB']);
}
?>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ['<?= join("','", $temp_id_pertanyaan) ?>'],
            datasets: [{
                label: 'Sangat Baik',
                backgroundColor: 'rgba(56, 86, 255, 0.87)',
                borderColor: 'rgba(56, 86, 255, 0.87)',
                data: [<?= join(",", $temp_sb) ?>]
            }, {
                label: 'Kurang Baik',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?= join(',', $temp_kb) ?>]
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>