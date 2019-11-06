<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <div class="col-md-12">
            <h2 class="title-v4">Detail Merek</h2>
        </div>

        <!-- Main Content -->
        <div class="col-md-6 margin-bottom-20">

            <b>Judul Ciptaan</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getHakcipta['JUDUL']; ?>
            </div>

            <b>Satuan Kerja</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getHakcipta['SATUAN_KERJA']; ?>
            </div>

            <b>Status</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getHakcipta['STATUS']; ?>
            </div>

            <b>Nomor Pendaftaran</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Tahun Pendaftaran</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Nomor ID Sertifikat</b>
            <div class="margin-left-10 margin-bottom-10">
                0
            </div>

            <b>Tanggal Sertifikasi</b>
            <div class="margin-left-10 margin-bottom-10">
                -
            </div>

            <b>Jenis Ciptaan</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getHakcipta['JENIS_CIPTAAN']; ?>
            </div>

            <b>Tanggal Pengmuman</b>
            <div class="margin-left-10 margin-bottom-10">
                00-00-0000
            </div>

            <b>Tempat Diumumkan</b>
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