<div class="container">
    <h1 style="text-align: center" class="h1-style">Data Mahasiswa</h1>
    <div class="d-flex justify-content-end" style="margin-top: 20px;margin-bottom: 20px">
        <a href="<?php echo base_url('index.php/add_mhsw') ?>" style="margin-right: 10px">
            <button class="btn btn-info">+ Tambah</button>
        </a>
        <form action="<?php echo base_url('index.php/search_mhsw') ?>" method="POST" class="d-flex">
            <input type="text" class="form-control" style="margin-right: 10px" name="nama_cari" require placeholder="Cari mahasiswa" value="<?php echo isset($value_cari) ? $value_cari : '' ?>">
            <button type="submit" class="btn btn-info d-flex align-items-center">
                <img alt="search" style="width: 15px; height: 15px" src="<?php echo base_url('assets/images/search.png') ?>" />
                <p class="mb-0" style="padding-left: 6px">Cari</p>
            </button>
        </form>
    </div>
    <?php if(count($mhsw) == 0){ ?>
        <h5>Mahasiswa tidak ditemukan</h5>
    <?php } else { ?>
    <table class="table text-center w-100 table-striped" style="background-color: #f0f0f0; overflow-x: auto">
        <thead class="thead-style">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-zebra">
            <?php 
                $no =  $this->uri->segment('3')+1;
                foreach($mhsw as $index => $data): ?>
            <tr>
                <td> <?= $no++ ?> </td>
                <td> <?= $data->nama ?> </td>
                <td class="d-flex justify-content-center flex-wrap">
                        <a class="text-white" href="<?php echo base_url('/index.php/detail_mhsw/'.$data->nim) ?>" >
                            <button class="btn btn-info td-space">
                                Detail
                            </button>
                        </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php 
                    $active_page = "";
                    for($i = 0; $i < $total_page; $i++){ 
                    $active_page = $current_page == $i * 3 ? "page-item active" : "page-item";
                ?>
                    <li class="<?php echo $active_page ?>">
                        <a class="page-link" href="<?php echo base_url('index.php/c_mahasiswa/display/' . $i * 3) ?>"> <?= $i+1 ?> </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
<?php } ?>
</div>

<!-- <?php if(count($mhsw) == 0){ ?>
    <h5>Mahasiswa tidak ditemukan</h5>
<?php } else { ?>
        <h3 style="margin-bottom: 20px">Data Mahasiswa</h3>
        <a href="<?php echo base_url('index.php/add_mhsw') ?>">+ Tambah</a>
        <form action="<?php echo base_url('index.php/search_mhsw') ?>" method="POST" style="margin-top: 8px">
            <input type="text" name="nama_cari" require placeholder="Cari mahasiswa" value="<?php echo isset($value_cari) ? $value_cari : '' ?>">
            <button type="submit">
                <img alt="search" width="15px" height="15px" src="<?php echo base_url('assets/images/search.png') ?>" />
                <b>Cari</b>
            </button>
        </form>
        <table style="margin-left: auto; margin-right: auto; border-collapse: collapse; margin-bottom: 40px">
            <thead>
                <tr>
                    <th style="border: 1px solid #000000">No</th>
                    <th width="250px" style="border: 1px solid #000000">Nama</th>
                    <th width="90px" style="border: 1px solid #000000">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach($mhsw as $index => $data): ?>
                    <tr style="text-align: center">
                        <td style="border: 1px solid #000000"> <?= $index+1 ?> </td>
                        <td style="border: 1px solid #000000"> <?= $data->nama ?> </td>
                        <td style="border: 1px solid #000000">
                            <a style="color: #000000" href="<?php echo base_url('/index.php/detail_mhsw/'.$data->nim) ?>">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php } ?> -->
