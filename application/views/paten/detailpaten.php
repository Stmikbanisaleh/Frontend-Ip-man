<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <div class="col-md-12">
            <h2 class="title-v4">Detail Paten</h2>
        </div>

        <!-- Main Content -->
        <div class="col-md-6 margin-bottom-20">

            <b>Judul Invensi</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getPaten['JUDUL']; ?>
            </div>

            <b>Satuan Kerja</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getPaten['SATUAN_KERJA']; ?>
            </div>

            <b>Status</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getPaten['STATUS']; ?>
            </div>

            <b>Nomor Pendaftaran</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getPaten['NOMOR_PERMOHONAN']; ?>
            </div>

            <b>Tanggal Pendaftaran</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= date('d-m-Y', strtotime($getPaten['FILLING'])); ?>
            </div>

            <b>Nomor ID Paten</b>
            <div class="margin-left-10 margin-bottom-10">
                0
            </div>

            <b>Tanggal Sertifikasi</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= date('d-m-Y', strtotime($getPaten['SERTIFIKASI'])); ?>
            </div>

            <b>Jenis Paten</b>
            <div class="margin-left-10 margin-bottom-10">
                <?php if ($getPaten['JENIS_PATEN'] == 'PB') {
                    $paten = 'Paten Biasa';
                } else {
                    $paten = 'Paten Sederhana';
                } ?>
                <?= $paten; ?>
            </div>

            <b>Bidang Teknik</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getPaten['BIDANG_TEKNIK']; ?>
            </div>

            <b>Abstrak</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getPaten['ABSTRAK']; ?>
            </div>

            <b>Jumlah Klaim</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Pemeriksa Paten</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Email Pemeriksa</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Kontak Pemeriksa</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

        </div>
        <div class="col-md-6">
            <b>Inventor</b>
            <div class="margin-left-10 margin-bottom-20 margin-top-20">
                <?php foreach ($getInventor as $ginv) { ?>
                <?= $ginv['NAMA']; ?>;
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