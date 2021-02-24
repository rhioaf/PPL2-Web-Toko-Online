<div class="container-fluid">
    <h4>Daftar Berita</h4>
    <div class="align-left w-50">
        <form action="<?php echo base_url('index.php/search_berita') ?>" method="POST" class="d-flex">
            <input type="text" class="form-control" style="margin-right: 10px" name="judul_berita" require placeholder="Cari berita" value="<?php echo isset($value_cari) ? $value_cari : '' ?>">
            <button type="submit" class="btn btn-theme d-flex align-items-center">
                <img alt="search" style="width: 15px; height: 15px" src="<?php echo base_url('assets/images/icon/search.png') ?>" />
                <p class="mb-0" style="padding-left: 6px">Cari</p>
            </button>
        </form>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th style="width: 20vh">Judul berita</th>
                <th>Isi berita</th>
                <th style="width: 15vh">Tanggal berita</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_berita as $index_berita => $data_berita) { ?>
                <tr> 
                    <td> <?php echo $index_berita+1 ?>  </td>
                    <td> <?php echo $data_berita->judul_berita ?>  </td>
                    <td> <?php echo substr($data_berita->isi_berita, 0, 500) ?>...  </td>
                    <td> <?php echo $data_berita->tgl_berita ?>  </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>