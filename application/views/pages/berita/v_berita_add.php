<div class="container" style="margin-top: 10px">
    <h4>Form Input Berita Baru</h4>
    <form action="<?php echo base_url('index.php/store_berita') ?>" method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label>Judul Berita</label>
            <input type="text" name="judul_berita" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="isi_berita" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Tanggal Berita</label>
            <input type="date" name="tgl_berita" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Gambar Berita</label>
            <input type="file" name="gambar_berita" class="form-control" required>
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-theme w-25" name="submit">Submit</button>
            <a href="<?php echo base_url('index.php/berita_admin') ?>" style="margin-left:15px" class="w-25 btn btn-secondary" name="back">Kembali</a>
        </div>
    </form>
</div>