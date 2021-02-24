<?php 
    function formatPrice($param){
        $returnedValue = "Rp. " . number_format($param,0,',','.');
        return $returnedValue;
    }
?>
<div class="container">
    <h4 class="mb-3">Daftar Penjualan</h4>
    <h6>Export Data Penjualan</h6>
    <div class="d-flex">
        <a href="<?= base_url('index.php/gen_pdf') ?>" class="btn btn-theme mr-2" target="_blank">PDF</a>
        <a href="<?= base_url('index.php/gen_excel') ?>" class="btn btn-success" target="_blank">Excel</a>
    </div>
    <table class="table mt-3 text-center">
        <thead>
            <tr>
                <th>No Penjualan</th>
                <th>Nama</th>
                <th>Total Penjualan</th>
                <th>Total Ongkir</th>
            </tr>
        </thead>
        <?php if(!is_null($data_pjl)) { ?>
            <tbody>
                <?php foreach($data_pjl as $index => $item) { ?>
                    <tr> 
                        <td> <?= $item->id_penjualan ?>  </td>
                        <td> <?= $item->nama ?> </td>
                        <td> <?= formatPrice($item->total_penjualan) ?> </td>
                        <td> <?= formatPrice($item->total_ongkir) ?> </td>
                    </tr>
                <?php 
                }     
                ?>
            </tbody>
        <?php } else { ?>
            <tbody>
                <tr> 
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>