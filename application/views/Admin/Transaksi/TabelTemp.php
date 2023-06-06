<!-- Menampilkan data tabel tmp/sementara -->
<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th colspan="2">Kode Buku</th>
            <th colspan="2">Judul Buku</th>
            <th colspan="2">Nama Penulis</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <?php foreach ($tmp as $tmp) : ?>
        <tr>
            <td colspan="2"><?php echo $tmp->id_buku; ?></td>
            <td colspan="2"><?php echo $tmp->judul_buku; ?></td>
            <td colspan="2"><?php echo $tmp->penulis_buku; ?></td>
            <td colspan="2"><a href="#" class="hapus" kode="<?php echo $tmp->id_buku; ?>"><i class="fas fa-trash" aria-hidden="true"></i></a></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="4">Total Buku</td>
        <td colspan="4"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp; ?>" class="form-control"></td>
    </tr>

</table>
<!-- Menampilkan data tabel tmp/sementara ENd -->
