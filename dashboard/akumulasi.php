<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Akumulasi Kritik & Saran</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold">Akumulasi Kritik & Saran Pada Jasa Pelayanan Perbaikan CV. Topliens Tekhnik</h6>
        <a href="index.php?halaman=tambah-pertanyaan" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aspek</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT*FROM tbl_aspek");
                            while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <?php
                                $sb = 0;
                                $total = 0;
                                $persentase = 0;
                                $query2 = mysqli_query($koneksi, "SELECT*FROM tbl_pertanyaan WHERE id_aspek='$data[id_aspek]'");
                                while ($data2 = mysqli_fetch_assoc($query2)) {
                                    $query3 = mysqli_query($koneksi, "SELECT (SELECT COUNT(jawaban) FROM tbl_jawaban WHERE id_pertanyaan='$data2[id_pertanyaan]' AND jawaban='SB') as sb, COUNT(jawaban) as total FROM tbl_jawaban WHERE id_pertanyaan='$data2[id_pertanyaan]'");
                                    $data3 = mysqli_fetch_assoc($query3);
                                    $sb = $sb + $data3['sb'];
                                    $total = $total + $data3['total'];
                                    $persentase = round(($sb / $total) * 100, 2);
                                }
                            ?>
                            <td><?= $persentase ?></td>
                        </tr>
                    <?php
                            }
                    ?> -->
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM tbl_aspek");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <?php
                            $sb = 0;
                            $total = 0;
                            $persentase = 0;
                            $query2 = mysqli_query($koneksi, "SELECT (SELECT COUNT(jawaban) FROM tbl_jawaban WHERE id_pertanyaan IN (SELECT id_pertanyaan FROM tbl_pertanyaan WHERE id_aspek='$data[id_aspek]') AND jawaban='SB') as sb, COUNT(jawaban) as total FROM tbl_jawaban WHERE id_pertanyaan IN (SELECT id_pertanyaan FROM tbl_pertanyaan WHERE id_aspek='$data[id_aspek]')");
                            $data2 = mysqli_fetch_assoc($query2);
                            $sb = $sb + $data2['sb'];
                            $total = $total + $data2['total'];
                            $persentase = round(($sb / $total) * 100, 2);

                            ?>
                            <td><?= $persentase ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-sm">
            Diagram
        </button>
    </div>
</div>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Diagram</h5>
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

<?php
function getPersentase($id_aspek, $jawaban)
{
    include '../koneksi.php';
    $sb = 0;
    $total = 0;
    $persentase = 0;
    $query2 = mysqli_query($koneksi, "SELECT (SELECT COUNT(jawaban) FROM tbl_jawaban WHERE id_pertanyaan IN (SELECT id_pertanyaan FROM tbl_pertanyaan WHERE id_aspek='$id_aspek') AND jawaban='$jawaban') as jawaban, COUNT(jawaban) as total FROM tbl_jawaban WHERE id_pertanyaan IN (SELECT id_pertanyaan FROM tbl_pertanyaan WHERE id_aspek='$id_aspek')");
    $data2 = mysqli_fetch_assoc($query2);
    $sb = $sb + $data2['jawaban'];
    $total = $total + $data2['total'];
    $persentase = round(($sb / $total) * 100, 2);
    echo $persentase;
}
?>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ['Ketepatan Waktu', 'Efisiensi', 'Penampilan', 'Kesopanan dan Keramahan', 'Pengetahuan', 'Keahlian'],
            datasets: [{
                label: 'Sangat Baik',
                backgroundColor: 'rgba(56, 86, 255, 0.87)',
                borderColor: 'rgba(56, 86, 255, 0.87)',
                data: [
                    <?= getPersentase(1, 'SB') ?>,
                    <?= getPersentase(2, 'SB') ?>,
                    <?= getPersentase(3, 'SB') ?>,
                    <?= getPersentase(4, 'SB') ?>,
                    <?= getPersentase(5, 'SB') ?>,
                    <?= getPersentase(6, 'SB') ?>
                ]
            }, {
                label: 'Kurang Baik',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: ['rgb(255, 99, 132)'],
                data: [
                    <?= getPersentase(1, 'KB') ?>,
                    <?= getPersentase(2, 'KB') ?>,
                    <?= getPersentase(3, 'KB') ?>,
                    <?= getPersentase(4, 'KB') ?>,
                    <?= getPersentase(5, 'KB') ?>,
                    <?= getPersentase(6, 'KB') ?>
                ]
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