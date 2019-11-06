<style>
    tr:hover {
        cursor: pointer;
    }
</style>

<!--=== Container Part ===-->
<div class="container margin-bottom-80 margon-left-20">
    <div class="row row-md">
        <!-- Main Content -->
        <div class="row row-lg text-center">
            <div class="col col-lg text-center" style="height:300px;">
                <h2> Desain Industri Tedaftar</h2>
                <?php if ($jumlahDesain) {
                    foreach ($jumlahDesain as $data) {
                        $tahun[] = (float) $data->tahun;
                        $total[] = (float) $data->total;
                    }
                }
                ?>
                <canvas id="myChart" style="height:50%;"></canvas>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>

<div class="container margin-top-20 margin-bottom-40">
    <table class="table table-bordered table-responsive table-hover" id="myTable" data-plugin="dataTable">
        <thead>
            <tr class="table-info">
                <th>No.</th>
                <th>Judul</th>
                <th>Unit Kerja</th>
                <th>Nama Inventor</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($getDesain as $dsn) : ?>
            <?php $id = $dsn['ID']; ?>
            <tr id="view_tabel" onclick="viewdata(<?php echo $id ?>)" id=<?= $id; ?>>
                <td><?= $i ?></td>
                <td><?= $dsn['JUDUL']; ?></td>
                <td><?= $dsn['NAMA_REV'] ?></td>
                <td>
                    <?php foreach ($getPendesain as $gpeg) { ?>
                    <?php if ($gpeg['ID_DESAIN_INDUSTRI'] == $dsn['ID']) { ?>
                    <?= $gpeg['NAMA']; ?>;
                    <?php } ?>
                    <?php } ?>
                </td>
                <td><?= date('d-m-Y', strtotime($dsn['TGL_INPUT'])) ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!--=== End Container Part ===-->

<script src=" <?= base_url('assets/'); ?>plugins/chart-js/Chart.js"> </script>
<script src=" <?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>
    var target = 'desain/detail';

    function viewdata(id) {
        document.location = 'http://localhost/pusispan/ip-man/' + target + '/' + id;
        //Ganti sesuai server
        //document.location = 'http://pusispan.stmik-banisaleh.com/pusispan/ip-man/' + target + '/' + id;
    }
</script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tahun); ?>,
            datasets: [{
                label: '',
                data: <?php echo json_encode($total); ?>,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 10,
                        max: 50
                    }
                }]
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>