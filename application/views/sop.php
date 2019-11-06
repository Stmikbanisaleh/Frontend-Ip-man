<!--=== Container Part ===-->
<div class="container margin-bottom-40">
    <div class="row margin-top-20">
        <!-- Main Content -->
        <div class="col-lg-8">
            <h2 class="title-v4">SOP</h2>
            <?php foreach ($getsop as $gs) { ?>
                <hr class="hr-xl">
                <h2><?= $gs['nama_judul'] ?></h2>
                <?php if ($gs['nama_file']) { ?>
                    <object data="<?= base_url() ?>assets/document/sop/<?= $gs['nama_file']; ?>" type="application/pdf" width="100%" height="800px">
                        <p>Alternative text - include a link <a href="myfile.pdf">to the PDF!</a></p>
                    </object>
                <?php } else { ?>
                    <div class="tag-box tag-box-v2 margin-bottom-40">
                        <h4>File <?= $gs['nama_judul']; ?> ditemukan.</h4>
                    </div>
                <?php } ?>
                <hr class="hr-xl">
            <?php } ?>

        </div>
        <!-- End Main Content -->

    </div>
</div>
<!--=== End Container Part ===-->