<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- <a href="" class="btn btn-success btn-icon-split" data-toggle="modal" data-target=".bd-example-modal-lg">
        <span class="icon text-white-50">
            <i class="fas fa-save"></i>
        </span>
        <span class="text">Simpan</span>
    </a> -->
	<br>
	<!--Form Tambah Buku -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Filter Buku Masuk</h6>
		</div>
		<div class="card-body">
			<div class="container">
				<!-- Form Pinjam Buku -->
				<form>
					<div class="row">

						<!-- Kolom Kiri Form -->
						<div class="col">
							<div class="col form-group">
								<label for="inputMulaiTanggal" class="font-weight-bold">Tanggal :</label>
								<input type="date" id="inputMulaiTanggal" name="mulai_tanggal" class="form-control"
									name="tgl_pemasukan" required>
							</div>
							<div class="col form-group">
								<label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label>
								<input type="date" id="inputSampaiTanggal" name="sampai_tanggal" class="form-control"
									name="tgl_pemasukan" required>
							</div>
						</div>
						<!-- End Kolom Kiri Form -->

						<!-- Kolom Kanan Form -->
						<div class="col">
							<div class="form-group rec-element">
								<label class="control-label col" for="first-name">Jenis Buku <span
										class="required">*</span>
								</label>
								<div class="col">
									<select class="form-control jenis-buku" name="">
										<option>-- Pilih --</option>
										<option value="laki-laki">E-Book</option>
										<option value="perempuan">Buku</option>
									</select>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div id="nextkolom" name="nextkolom"></div>
							<button type="button" id="jumlahkolom" value="1" style="display:none"></button>
							<div class="form-group">
								<div class="col col-md-offset-3">
									<a href="" class="btn btn-success btn-icon-split">
										<span class="icon text-white-50">
											<i class="fas fa-search"></i>
										</span>
										<span class="text">Cari Data</span>
									</a>
								</div>
							</div>
						</div>
						<!-- End Kolom Kanan Form -->

					</div>
				</form>
				<!-- End Form Pinjam Buku -->
			</div>
		</div>


	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Laporan Buku Masuk</h6>
		</div>
		<div class="card-body">
			<!-- Tabel Pinjam Buku -->
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul Buku</th>
							<th>Penulis Buku</th>
							<th>Penerbit Buku</th>
							<th>Tahun Terbit</th>
							<th>Stok Buku</th>
							<th>Jenis Buku</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>59302</td>
							<td>Buku Paket</td>
							<td>Budi</td>
							<td>1</td>
							<td>12</td>
							<td>12</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- End Tabel Pinjam Buku -->
		</div>


	</div>


</div>

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website 2020</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
