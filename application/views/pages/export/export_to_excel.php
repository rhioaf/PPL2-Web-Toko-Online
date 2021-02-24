<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=$title.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    function formatPrice($param){
        $returnedValue = "Rp. " . number_format($param,0,',','.');
        return $returnedValue;
    }
?>
<table border="1" style="width: 100%">
 <thead>
      <tr>
           <th>No Penjualan</th>
           <th>Nama Pembeli</th>
           <th>Total Penjualan</th>
           <th>Total Ogkir</th>
      </tr>
 </thead>
 <tbody>
      <?php foreach($data_pjl as $index => $item) { ?>
        <tr style="text-align: center">
            <td><?= $item->id_penjualan ?></td>
            <td><?= $item->nama ?></td>
            <td><?= formatPrice($item->total_penjualan) ?></td>
            <td><?= formatPrice($item->total_ongkir) ?></td>
        </tr>
      <?php  } ?>
 </tbody>
</table>

