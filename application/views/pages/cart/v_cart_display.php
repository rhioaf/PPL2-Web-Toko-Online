<?php 
    function formatPrice($param){
        $returnedValue = "Rp. " . number_format($param,0,',','.');
        return $returnedValue;
    }
    $total_Harga = 0;
?>
<div class="container">
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
    <div class="d-flex">
        <a href="<?php echo base_url('index.php/clear_cart') ?>" class="btn btn-danger mr-3">Hapus Cart</a>
        <a href="<?php echo base_url('index.php/checkout_form') ?>" class="btn btn-theme">Checkout</a>
    </div>
    <table class="table mt-3 text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Pembelian</th>
                <th>Stok Barang</th>
                <!-- <th>Aksi</th> -->
            </tr>
        </thead>
        <?php if(!is_null($data_cart)) { ?>
            <tbody>
                <?php foreach($data_cart as $index_cart => $data) { ?>
                    <tr> 
                        <td> <?php echo $index_cart+1 ?>  </td>
                        <td> <?php echo $data['nama_barang'] ?>  </td>
                        <td> <?php echo formatPrice($data['harga_barang']) ?> </td>
                        <td> <?php echo $data['jml_barang'] ?> </td>
                        <td> <?php echo $data['stok_barang'] ?>  </td>
                        <!-- <td>
                            <div class="d-flex justify-content-around align-items-center w-50 mx-auto">
                                <a href="<?= base_url('index.php/add_amount/'.$data['id_barang']) ?>">
                                    <img src="<?= base_url(); ?>assets/images/icon/plus.png" alt="add_icon" style="width: 13px; height: 13px">
                                </a>
                                <div><?php echo $data['jml_barang'] ?></div>
                                <a href="<?= base_url('index.php/reduce_amount/'.$data['id_barang']) ?>">
                                    <img src="<?= base_url(); ?>assets/images/icon/minus.png" alt="reduce_icon" style="width: 13px; height: 13px">
                                </a>
                            </div>
                            
                        </td>
                        <td> <?php echo $data['stok_barang'] ?>  </td>
                        <td> 
                            <a href="<?php echo base_url('index.php/clear_one_from_cart/'.$data['id_barang']) ?>">
                                <img src="<?php echo base_url(); ?>assets/images/icon/delete.png" style="width: 20px; height: 20px"> 
                            </a>
                        </td> -->
                    </tr>
                <?php 
                    $total_Harga += $data['jml_barang'] * $data['harga_barang'];
                }     
                ?>
                <tr class="text-right">
                    <td colspan="6"> <b>Total harga : </b> <?= formatPrice($total_Harga); ?> </td>
                </tr>
            </tbody>
        <?php } else { ?>
            <tbody>
                <tr> 
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <!-- <td>-</td> -->
                </tr>
                <tr class="text-right">
                    <td colspan="5"> <b>Total harga : </b> <?= formatPrice($total_Harga); ?> </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>