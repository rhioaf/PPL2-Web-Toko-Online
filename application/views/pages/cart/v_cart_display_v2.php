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
     @media(min-width: 1281px){
        .p-cart{
            padding: 0 15vh 0 15vh;
        }
    }
</style>
<div class="container-fluid p-cart" style="margin-bottom: 20vh">
    <h4 class="mb-2">My Shopping Cart</h4>
    <?php if($this->session->flashdata('warning_amount')){ ?>
        <div class="alert alert-warning alert-dismissable fade show w-50" role="alert">
            <strong>Peringatan!</strong> <?= $this->session->flashdata('warning_amount') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if($this->session->flashdata('danger_amount')){ ?>
        <div class="alert alert-danger alert-dismissable fade show w-50" role="alert">
            <strong>Peringatan!</strong> <?= $this->session->flashdata('danger_amount') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if($this->session->flashdata('info_cart_null')){ ?>
        <div class="alert alert-info alert-dismissable fade show w-50" role="alert">
            <strong>Peringatan!</strong> <?= $this->session->flashdata('info_cart_null') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="row mt-3">
        <div class="col-md-8 col-sm-12">
            <?php if(!is_null($data_cart)){  
                foreach($data_cart['list'] as $index_cart => $data) {  ?>
                    <div class="box-item-cart">
                        <div class="d-flex">
                            <img src="<?= base_url(); ?>assets/images/barang/<?= $data['gambar_barang'] ?>" style="width: 16vh; height: 16vh" alt="gambar_barang">
                            <div class="pl-4 mt-3"> 
                                <b class="mb-1"><?= $data['nama_barang'] ?></b>
                                <div class="d-flex">
                                    <p class="mb-2">Harga: <?= formatPrice($data['harga_barang']) ?></p>
                                    <p class="ml-4 mb-2">Berat: <?= formatBerat($data['berat_barang']) ?></p>
                                    <p class="ml-4 mb-2">Stok: <?= $data['stok_barang'] ?></p>
                                </div>
                                <b>Subtotal</b>
                                <div class="d-flex">
                                    <p><?= $data['jml_barang'] ?> buah</p>
                                    <p class="ml-3"><?= formatPrice($data['harga_barang'] * $data['jml_barang']) ?></p>
                                    <p class="ml-3"><?= formatBerat($data['berat_barang'] * $data['jml_barang']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>  
            <?php
                    $total_Harga += $data['jml_barang'] * $data['harga_barang']; 
                    $total_Berat += $data['jml_barang'] * $data['berat_barang'];
                }
            } else { ?>
                <h5>Tidak ada pembelian barang</h5>
            <?php } ?>   
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <?php if(!is_null($data_cart)) { ?>
                <div class="box-cart">
                    <div class="d-flex">
                        <h6 style="padding-top: 2px">Total harga : </h6>
                        <p class="ml-2"><?= formatPrice($total_Harga) ?></p>
                    </div>
                    <div class="d-flex" style="height: 6vh">
                        <h6 style="padding-top: 2px">Total berat : </h6>
                        <p class="ml-2"><?= formatBerat($total_Berat) ?></p>
                    </div>
                    <div class="d-flex">
                        <a href="<?php echo base_url('index.php/checkout_form') ?>" class="btn btn-theme mr-2">Checkout</a>
                        <a href="<?php echo base_url('index.php/clear_cart') ?>" class="btn btn-danger">Clear cart</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>