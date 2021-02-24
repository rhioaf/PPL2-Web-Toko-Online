<div class="container">
    <h4>Berita Terkini</h4>
    <div class="d-flex flex-column flex-wrap mt-5">
        <?php foreach($list_berita as $index_berita => $data_berita) { ?>
            <div class="card w-100 p-3 mb-5" style="height: fit-content;">
                <div class="card-body d-flex">
                    <div class="img-hover-zoom">
                        <img class="gambar" src="<?php echo base_url(); ?>assets/images/berita/<?php echo $data_berita->gambar_berita; ?>" alt="Gambar Berita" />
                    </div>
                    <section style="padding-left: 25px">
                        <h6 class="card-text" style="font-size: 19px">
                            <?php echo $data_berita->judul_berita; ?>
                        </h6>
                        <div style="height: 16.7vh">
                            <h6 class="card-text" style="font-size: 14px; color: #A9A9A9">
                                <?php echo substr($data_berita->isi_berita, 0, 250); ?>...
                            </h6>
                        </div>
                        <a href="<?php echo base_url('index.php/detail_berita/'. $data_berita->id_berita); ?>">
                            <button type="button" class="btn btn-theme">
                                Detail berita
                            </button>
                        </a>
                    </section>
                </div>
            </div>
        <?php } ?>
    </div>
</div>