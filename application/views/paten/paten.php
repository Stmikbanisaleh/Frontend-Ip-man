<style>
    tr:hover {
        cursor: pointer;
    }
</style>

<!--=== Container Part ===-->
<div class="container margin-bottom-80">
    <div class="row-lg-12 margin-top-20">
        <!-- Main Content -->
        <div class="row row-lg text-center">
            <div class="col col-lg text-center" style="height:300px;">
                <h2> Produktivitas Paten</h2>
                <?php if ($jumlahPaten) {
                    foreach ($jumlahPaten as $data) {
                        $tahun[] = (float) $data['tahun'];
                        $total[] = (float) $data['total'];
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
    <table class="table table-bordered table-responsive table-hover dataTable" id="myTable" data-plugin="dataTable">
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
            <?php foreach ($getPaten as $ptn) : ?>
            <?php $id = $ptn['id']; ?>
            <tr id="view_tabel" onclick="viewdata(<?php echo $id ?>)" id=<?= $id; ?>>
                <td><?= $i ?></td>
                <td><?= $ptn['judul']; ?></td>
                <td><?= $ptn['nama_rev'] ?></td>
                <td>
                    <?php foreach ($getInventor as $gpeg) { ?>
                    <?php if ($gpeg['id_paten'] == $ptn['id']) { ?>
                    <?= $gpeg['nama']; ?>;
                    <?php } ?>
                    <?php } ?>
                </td>
                <td><?= date('d-m-Y', strtotime($ptn['createdAt'])) ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src=" <?= base_url('assets/'); ?>plugins/chart-js/Chart.js"> </script>
<script src=" <?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>
    var target = 'paten/detail';

    function viewdata(id) {
        document.location = 'http://localhost/frontend-ipman/' + target + '/' + id;
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
                    }
                }]
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>