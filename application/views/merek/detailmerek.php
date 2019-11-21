<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <div class="col-md-12">
            <h2 class="title-v4">Detail Merek</h2>
        </div>

        <!-- Main Content -->
        <div class="col-md-6 margin-bottom-20">

            <b>Judul</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getMerek['judul']; ?>
            </div>

            <b>Satuan Kerja</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getMerek['satuan_kerja']; ?>
            </div>

            <b>Status</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getMerek['status_']; ?>
            </div>

            <b>Nomor Pendaftaran</b>
            <div class="margin-left-10 margin-bottom-10">
                <?php if ($getMerek['nomor_pendaftar']) {
                    $getMerek['nomor_pendaftar'];
                } else {
                    echo '-';
                } ?>
            </div>

            <b>Tahun Pendaftaran</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getMerek['tahun_pendaftaran']; ?>
            </div>

            <b>Nomor ID Merek</b>
            <div class="margin-left-10 margin-bottom-10">
                0
            </div>

            <b>Tanggal Sertifikasi</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= date('d-m-Y', strtotime($getMerek['sertifikasi'])); ?>
            </div>

            <b>Kelas Barang dan Jasa</b>
            <div class="margin-left-10 margin-bottom-10">
                <?= $getMerek['kelas'];?>
            </div>
        </div>
        <div class="col-md-6">
            <b>Inventor</b>
            <div class="margin-left-10 margin-bottom-20 margin-top-20">
                <?php foreach ($getInventor as $ginv) { ?>
                <?= $ginv['nama']; ?>;
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
                        <td><?= $gdoc['name']; ?></td>
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