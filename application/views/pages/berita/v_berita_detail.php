<div class="container">
    <h3 class="mb-2" style="font-weight: bold"><?php echo $berita->judul_berita; ?></h3>
    <img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->gambar_berita; ?>">
    <p class="mt-4">
        <?php echo nl2br($berita->isi_berita); ?>
    </p>
    <h6 class="mt-3">Tanggal : <?php echo $berita->tgl_berita ?></h6>
    <?php if($access_admin)  { ?>
        <a href="<?php echo base_url('index.php/berita_admin') ?>" class="text-white mt-3">
            <button type="button" class="btn btn-secondary">
                Kembali
            </button>
        </a>
    <?php } else {?>
        <a href="<?php echo base_url() ?>" class="text-white mt-3">
            <button type="button" class="btn btn-secondary">
                Kembali
            </button>
        </a>
    <?php } ?>
</div>