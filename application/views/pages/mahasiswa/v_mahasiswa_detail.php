<!-- <div class="container" style="margin-top: 10px">
    <h4>Detail Mahasiswa</h4>
    <table class="table">
        <tr>
            <th>Nama</th>
            <td><?= $mhsw->nama ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= $mhsw->nim ?></td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td><?= $mhsw->tgl_lahir ?></td>
        </tr>
        <tr>
            <th>Usia</th>
            <td><?= $mhsw->umur ?></td>
        </tr>
    </table>
    <a class="btn btn-grey" href="<?php echo base_url() ?>"><b>Kembali</b></a>
</div> -->
<h4>Detail Mahasiswa</h4>
<table style="margin-left: auto; margin-right: auto; border-collapse: collapse; text-align: center; margin-bottom: 20px">
    <tr>
        <th style="border: 1px solid #000000">Nama</th>
        <td style="border: 1px solid #000000"><?= $mhsw->nama ?></td>
    </tr>
    <tr>
        <th style="border: 1px solid #000000">NIM</th>
        <td style="border: 1px solid #000000"><?= $mhsw->nim ?></td>
    </tr>
    <tr>
        <th style="border: 1px solid #000000">Tanggal Lahir</th>
        <td style="border: 1px solid #000000"><?= $mhsw->tgl_lahir ?></td>
    </tr>
    <tr>
        <th style="border: 1px solid #000000">Usia</th>
        <td style="border: 1px solid #000000"><?= $mhsw->umur ?></td>
    </tr>
</table>
<a href="<?php echo base_url() ?>"><b>Kembali</b></a>
