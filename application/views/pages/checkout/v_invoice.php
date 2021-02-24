<?php 
    function formatPrice($param){
        $returnedValue = "Rp. " . number_format($param,0,',','.');
        return $returnedValue;
    }
    function formatBerat($berat){
        return $berat*1000 . 'gr';
    }
    $total_Harga = 0;
    $total_Item = 0;
?>
<style>
    .cart-invoice{
        height: 30vh;
        overflow: auto;
        margin-top: 2vh;
        margin-bottom: 3vh;
    }
</style>
<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <div class="box-v2 w-50 mb-5">
            <h5 class="mb-3">Data Pembeli</h5>
            <p>Nama : <?= $data_cart['owner']['nama'] ?></p>
            <p>Nomor Hp : <?= $data_cart['owner']['nomor'] ?></p>
            <p>Alamat : <?= $data_cart['owner']['alamat'] ?></p>
            <p>Kecamatan Tujuan : <?= $data_cart['owner']['kec_tujuan'] ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box-v2 w-100">
                <h5 class="mb-2">Daftar Pembelian</h5>
                <div class="cart-invoice">
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Berat Barang</th>
                                <th scope="col">Jumlah Pembelian</th>
                                <th scope="col">Subtotal Berat</th>
                                <th scope="col">Subtotal Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data_cart['list'] as $index => $item): ?>
                                <tr>
                                    <td><?= $item['nama_barang'] ?></td>
                                    <td><?= formatPrice($item['harga_barang']) ?></td>
                                    <td><?= formatBerat($item['berat_barang']) ?></td>
                                    <td><?= $item['jml_barang'] ?></td>
                                    <td><?= formatBerat($item['berat_barang'] * $item['jml_barang']) ?></td>
                                    <td><?= formatPrice($item['harga_barang'] * $item['jml_barang']) ?></td>
                                </tr>
                            <?php 
                            $total_Item++;
                            $total_Harga += $item['harga_barang'] * $item['jml_barang'];endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-v2 w-100">
                <h6>Total Item : <?= $total_Item ?> item</h6>
                <h6>Total Berat : <?= formatBerat($data_cart['owner']['total_berat']) ?></h6>
                <h6>Total Harga Barang : <?= formatPrice($total_Harga) ?></h6>
                <h6 class="mb-3">Total Ongkir : <?= formatPrice($data_cart['owner']['total_ongkir']) ?></h6>
                <h4>Total Pembayaran : <?= formatPrice($total_Harga + $data_cart['owner']['total_ongkir']) ?></h4>
                <a href="<?= base_url('index.php/checkout') ?>" class="btn btn-primary">Order Now</a>
            </div>
        </div>
    </div>
</div>