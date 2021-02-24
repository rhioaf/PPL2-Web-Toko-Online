<div class="container" style="margin-top: 10px">
    <h4>Form Update Data Mahasiswa</h4>
    <form action="<?php echo base_url('index.php/update_mhsw/'.$mhsw->nim) ?>" method="post">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Ex: 181511064" value="<?php echo $mhsw->nim ?>" disabled>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Ex: Budi" value="<?php echo $mhsw->nama ?>" require>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" placeholder="Ex: 2020-07-29" value="<?php echo $mhsw->tgl_lahir ?>" require>
        </div>
        <div class="form-group">
            <label>Umur</label>
            <input type="text" name="umur" class="form-control" placeholder="Ex: 19" value="<?php echo $mhsw->umur ?>" require>
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-primary w-25" name="submit">Submit</button>
            <a href="<?php echo base_url() ?>" style="margin-left:15px" class="w-25 btn btn-secondary" name="back">Kembali</a>
        </div>
    </form>
</div>