<!-- Menampilkan tabel laporan pengembalian -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Peminjaman Buku</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Peminjaman</th>
                            <th>Buku</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengembalian as $pgm) { ?>
                        <tr>
                            <td><?php echo $pgm->id_peminjaman;?></td>
                            <td><?php echo $pgm->judul_buku;?></td>
                            <td><?php echo $pgm->tgl_dikembalikan;?></td>
                            <td>Dikembalikan</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Menampilkan tabel laporan pengembalian End -->
