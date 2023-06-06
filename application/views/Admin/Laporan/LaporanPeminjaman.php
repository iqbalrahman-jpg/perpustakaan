<!-- Menampilkan tabel laporan peminjaman -->
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
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tabel as $tb) { ?>
                        <tr>
                            <td><?php echo $tb->nama_member;?></td>
                            <td><?php echo $tb->judul_buku;?></td>
                            <td><?php echo $tb->tgl_peminjaman;?></td>
                            <td><?php echo $tb->tgl_pengembalian;?></td>
                            <td>Dipinjam</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Menampilkan tabel laporan peminjaman End-->
