<?php 
    function formatPrice($param){
        $returnedValue = "Rp. " . number_format($param,0,',','.');
        return $returnedValue;
    }
    function formatBerat($berat){
        return $berat*1000 . 'gr';
    }
    $total_Harga = 0;
    $total_Berat = 0;
?>
<style>
    .cart-checkout{
        height: 50vh;
        overflow: auto;
        margin-top: 2vh;
        margin-bottom: 3vh;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            <div class="box-v2 w-100">
                <a href="<?= base_url('index.php/display_cart') ?>" style="color: #000000;"> <b><</b>  Kembali ke cart</a>
                <h6 class="mb-4 mt-2">Isi data diri anda terlebih dahulu</h6>
                <form action="<?= base_url('index.php/invoice') ?>" method="POST">
                    <div class="d-flex mb-3">
                        <label for="nama" style="width: 17vh">Nama</label>
                        <input type="text" id="nama" class="form-control form-control-sm w-50" name="nama" required>
                    </div>
                    <div class="d-flex mb-3">
                        <label for="nomor" style="width: 17vh">Nomor Telepon</label>
                        <input type="text" id="nomor" class="form-control form-control-sm w-50" name="nomor" required>
                    </div>
                    <div class="d-flex mb-3">
                        <label for="alamat" style="width: 17vh">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control form-control-sm w-50" required></textarea>
                    </div>
                    <div class="d-flex mb-3">
                        <label for="kecamatan" style="width: 17vh">Kecamatan</label>
                        <select name="kecamatan_tujuan" id="kecamatan" class="form-control form-control-sm w-50" required>
                            <?php 
                                foreach($list_kecamatan as $index => $item){
                            ?>
                                <option value="<?= $item->id_kecamatan ?>"><?= $item->nama_kecamatan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mr-3">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="box-v2 w-100">
                <h5>Pembelian Anda</h5>
                <div class="cart-checkout">
                    <?php foreach($cart['list'] as $index => $item): ?>
                        <div class="d-flex mb-3">
                            <img src="<?= base_url() ?>assets/images/barang/<?= $item['gambar_barang'] ?>" alt="gambar barang" style="width: 15vh; height: 15vh">
                            <div class="ml-4">
                                <p><?= $item['nama_barang'] ?> (<?= $item['jml_barang'] ?> item)</p>
                                <p class="mb-1">Subtotal harga : <?= formatPrice($item['harga_barang'] * $item['jml_barang']) ?></p>
                                <p>Subtotal berat : <?= formatBerat($item['berat_barang'] * $item['jml_barang']) ?></p>
                            </div>
                        </div>
                    <?php
                        $total_Harga += $item['harga_barang'] * $item['jml_barang'];
                        $total_Berat +=  $item['berat_barang'] * $item['jml_barang'];
                        endforeach; 
                    ?>
                </div>
                <h6>Total berat : <?= formatBerat($total_Berat) ?></h6>
                <h6>Total harga : <?= formatPrice($total_Harga) ?></h6>
            </div>
        </div>
    </div>
</div>