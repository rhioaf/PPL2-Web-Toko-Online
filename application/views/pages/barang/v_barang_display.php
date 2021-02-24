<?php 
    function formatPrice($param){
        $returnedValue = "Rp. " . number_format($param,0,',','.');
        return $returnedValue;
    }
    function formatBerat($berat){
        return $berat*1000 . 'gr';
    }
?>
<style>
    @media(min-width: 1281px){
        .gambar{
            width: 100%;
            height: 22.5vh;
        }
        .w-card{
            width: 26vh;
            height: fit-content;
        }
    }
    @media (min-width: 1025px) and (max-width: 1280px) {
        .gambar{
            width: 100%;
            height: 22.5vh;
        }
        .w-card{
            width: 23vh;
            height: fit-content;
        }
    }
    @media (min-width: 768px) and (max-width: 1024px) {
        .gambar{
            width: 100%;
            height: 19.5vh;
        }
        .w-card{
            width: 20vh;
            height: fit-content;
        }
    }
    @media (min-width: 481px) and (max-width: 767px) {
        .gambar{
            width: 100%;
            height: 17.5vh;
        }
        .w-card{
            width: 22vh;
            height: fit-content;
        }
    }
    @media (min-width: 320px) and (max-width: 480px) {
        .gambar{
            width: 100%;
            height: 16.5vh;
        }
        .w-card{
            width: 22vh;
            height: fit-content;
        }
    }
</style>
<div class="container-fluid">
    <h4 class="ml-4">Daftar barang</h4>
    <div class="d-flex justify-content-around flex-wrap mt-5">
        <?php
            if(count($list_barang) > 0){ 
                foreach($list_barang as $index_barang => $data_barang) { ?>
                    <div class="card mb-5 mr-1 ml-1 w-card">
                        <img class="card-img-top gambar mb-1" src="<?php echo base_url(); ?>assets/images/barang/<?php echo $data_barang->gambar_barang; ?>" alt="Gambar Berita" />
                        <div class="card-body">
                            <h6 class="card-title"><?= $data_barang->nama_barang; ?></h6>
                            <p class="card-text font-weight-bold mb-1" style="color: #e02626"><?= formatPrice($data_barang->harga_barang); ?></p>
                            <p class="card-text mb-0" style="color: #898c8a">Stok : <?php echo $data_barang->stok_barang ?></p>
                            <p class="card-text" style="color: #898c8a">Berat : <?php echo formatBerat($data_barang->berat_barang) ?></p>
                            <form method="POST" action="<?php echo base_url('index.php/add_to_cart') ?>">
                                <input type="hidden" class="form-control" name="id_barang" value="<?= $data_barang->id_barang ?>" />
                                <input type="hidden" class="form-control" name="harga_barang" value="<?= $data_barang->harga_barang ?>" />
                                <button type="submit" class="btn btn-theme">Order</button>
                            </form>
                        </div>
                    </div>
            <?php }
            } else { ?>
                <h5>Tidak ada barang yang dijual untuk saat ini</h5>
            <?php } ?>
    </div>
</div>