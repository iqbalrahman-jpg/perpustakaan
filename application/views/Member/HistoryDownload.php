<link href="<?php echo base_url('assets') ?>/table/bootstrap-table.css" rel="stylesheet">
<script src="<?php echo base_url('assets') ?>/table/bootstrap-table.js"></script>

<div class="container-fluid">
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            
        </div>
        <div class="card-body">
	    <div class="row">
	        <div class="col-xl-12">
	        
	            <table id="pembayaran_hutang_table_det" data-toggle="table" data-select-item-name="toolbar1" data-sort-name="id_jurnal" data-url="<?php echo base_url('Member/HistoryController/get_tampil_download_history');?>" data-sort-order="desc">
	                <thead>
	                    <tr>
	                        <th data-formatter="runningFormatter" data-align="right">No.</th>
	                        <th data-field="kode_buku" data-sortable="true">Kode Buku</th>
	                        <th data-field="judul_buku" data-sortable="true">Judul Buku</th>
	                        <th data-field="penulis_buku" data-sortable="true" data-formatter="berat">Nama Penulis</th>
	                        <th data-field="penerbit_buku" data-sortable="true" >Penerbit Buku</th>
	                        <th data-field="tahun_terbit" data-sortable="true" >Tahun Terbit</th>
	                    </tr>
	                </thead>
	            </table><br />
	        </div>
	    </div>
		</div>
	</div>	
</div>	

<script type="text/javascript">
	function runningFormatter(value, row, index) {
        return index + 1;
    }
</script>