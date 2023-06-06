<link href="<?php echo base_url('assets') ?>/table/bootstrap-table.css" rel="stylesheet">
<script src="<?php echo base_url('assets') ?>/table/bootstrap-table.js"></script>
<div class="container-fluid">
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            
        </div>
        <div class="card-body">
	    <div class="row">
	        <div class="col-xl-12">
	        
	            <table id="pembayaran_hutang_table_det" data-toggle="table" data-select-item-name="toolbar1" data-sort-name="id_jurnal" data-url="<?php echo base_url('Member/EbookController/get_tampil_ebook');?>" data-sort-order="desc">
	                <thead>
	                    <tr>
	                        <th data-formatter="runningFormatter" data-align="right">No.</th>
	                        <th data-field="kode_buku" data-sortable="true">Kode Buku</th>
	                        <th data-field="judul_buku" data-sortable="true">Judul Buku</th>
	                        <th data-field="penulis_buku" data-sortable="true" data-formatter="berat">Nama Penulis</th>
	                        <th data-field="penerbit_buku" data-sortable="true" >Penerbit Buku</th>
	                        <th data-field="tahun_terbit" data-sortable="true" >Tahun Terbit</th>
	                        <th data-field="sampul_buku" data-sortable="true" data-formatter="sampul">Sampul Buku</th>
	                        <th data-field="kode_buku|file_ebook" data-sortable="true" data-formatter="download_file">Download</th>
	                    </tr>
	                </thead>
	            </table><br />
	        </div>
	    </div>
		</div>
	</div>	
</div>

<script type="text/javascript">
	var link_sub = '<?php echo base_url() ?>';
	var kode_member = "<?php echo $this->session->userdata('kode_member')?>";
	function runningFormatter(value, row, index) {
        return index + 1;
    }

    function sampul(value, row, index){
    	return `<img src='${link_sub}assets/upload/cover/${row.sampul_buku}' style="width:160px;height:170px;">`;	
    }

    function download_file(value, row, index){
    	return `<button type="button" class="btn btn-danger" onclick="download('${link_sub}assets/upload/file/${row.file_ebook}','${row.file_ebook}','${row.kode_buku}')">Download</button>`
    }

    function download(fileUrl, fileName, kode_buku) {
	  var a = document.createElement("a");
	  a.href = fileUrl;
	  a.setAttribute("download", fileName);
	  a.click();

	  $.ajax({
                type: "POST",
                url: '<?php echo base_url('Member/EbookController/simpan_download_ebook'); ?>',
                data: { 
                    kode_buku : kode_buku,
                    kode_member  : kode_member,
                },
                success: function (data) {

                    console.log('data berhasil disimpan');
                    
                }    
        });  
	}

	// function downloadFile(file) {
	//   var xhr = new XMLHttpRequest();
	//   xhr.open('GET', file, true);
	//   xhr.responseType = 'blob';
	//   xhr.onload = function() {
	//     var urlCreator = window.URL || window.webkitURL;
	//     var imageUrl = urlCreator.createObjectURL(this.response);
	//     var tag = document.createElement('a');
	//     tag.href = imageUrl;
	//     tag.target = '_blank';
	//     tag.download = 'sample.png';
	//     document.body.appendChild(tag);
	//     tag.click();
	//     document.body.removeChild(tag);
	//   };
	//   xhr.onerror = err => {
	//     alert('Failed to download picture');
	//   };
	//   xhr.send();
	// }
</script>