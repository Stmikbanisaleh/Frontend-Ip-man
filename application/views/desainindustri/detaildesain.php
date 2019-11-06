<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <div class="col-md-12">
            <h2 class="title-v4">Detail Merek</h2>
        </div>

        <!-- Main Content -->
        <div class="col-md-6 margin-bottom-20">

            <b>Nama Desain Industri</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getDesain['JUDUL']; ?>
            </div>

            <b>Satuan Kerja</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getDesain['SATUAN_KERJA']; ?>
            </div>

            <b>Status</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getDesain['STATUS']; ?>
            </div>

            <b>Nomor Pendaftaran</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Tanggal Pendaftaran</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Nomor ID Desain Industri</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Tanggal Sertifikasi</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

        </div>
        <div class="col-md-6">
            <b>Nama Pencipta Desain</b>
            <div class="margin-left-10 margin-bottom-20 margin-top-20">
                <?php foreach ($getPendesain as $gdes) { ?>
                <?= $gdes['NAMA']; ?>;
                <hr class="hr-xs">
                <?php } ?>
            </div>

            <b>Berkas Kekayaan Intelektual</b>
            <div class="margin-left-10 margin-bottom-20 margin-top-20">
                <table class="table">
                    <?php $i = 1; ?>
                    <?php foreach ($getDocument as $gdoc) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $gdoc['NAME']; ?></td>
                        <td><a class="btn btn-xs btn-default"><i class="fa fa-download"></i></a></td>
                        <?php $i++; ?>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>
<!--=== End Container Part ===-->