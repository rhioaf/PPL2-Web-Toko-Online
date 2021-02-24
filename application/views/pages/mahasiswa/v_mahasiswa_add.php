<div class="container" style="margin-top: 10px">
    <div style="padding-left: 60px; padding-right: 60px">
        <h4>Form Input Mahasiswa Baru</h4>
        <form action="<?php echo base_url('index.php/store_mhsw') ?>" method="post">
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Ex: 181511064" style="border-radius: 50px" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Ex: Budi" style="border-radius: 50px" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" placeholder="Ex: 2020-07-29" style="border-radius: 50px" required>
            </div>
            <div class="form-group">
                <label>Umur</label>
                <input type="text" name="umur" class="form-control" placeholder="Ex: 19" style="border-radius: 50px" required>
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary w-25" name="submit">Submit</button>
                <a href="<?php echo base_url() ?>" style="margin-left:15px" class="w-25 btn btn-secondary" name="back">Kembali</a>
            </div>
        </form>
    </div>
</div>
<!-- <h4>Form Input Mahasiswa Baru</h4>
<form action="<?php echo base_url('index.php/store_mhsw') ?>" method="post">
    <label>NIM</label>
    <input type="text" name="nim" placeholder="Ex: 181511064" required>
    <br>
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" placeholder="Ex: Budi" required>
    <br>
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" placeholder="Ex: 2020-07-29" required>
    <br>
    <label>Umur</label>
    <input type="text" name="umur" class="form-control" placeholder="Ex: 19" required
    <br>
    <button type="submit" name="submit">Submit</button>
    <br>
    <a href="<?php echo base_url() ?>" name="back">Kembali</a>
</form> -->