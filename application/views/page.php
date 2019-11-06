<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-12" data-plugin="summernote" data-air-mode="true">
            <h2 class="title-v4"><?= $halaman['judul']; ?></h2>
            <img width="100%" height="250px" src="<?= base_url() ?>assets/img_halaman/<?= $halaman['gambar']; ?>">

            <?= $halaman['isi_halaman']; ?>

        </div>
        <!-- End Main Content -->

    </div>
</div>
<!--=== End Container Part ===-->