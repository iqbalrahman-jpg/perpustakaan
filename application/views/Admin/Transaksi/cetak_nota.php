<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>
		Nota Peminjaman
	</title>
</head>
<style>
	body{
		margin: 0 !important;
	}
	.kotak-judul{
		text-align:center;
		padding:5px 0;
		/* border-bottom:1px solid black; */
		width:100%;
		font-weight:normal;
		/*float:left;*/
		display:inline-table;
		font-size:14px;
		font-family:'Arial';
	}
	.kotak{
		/*width:100%;*/
		border-bottom:1px dashed #000;
	}
	.kotak-content{
		/*float:left;*/
		/*width: 100%;*/
		margin-left: 10px;
		/*margin-right: 10px;*/
		margin-top: 2px;
		margin-bottom: 2px;
		display:inline-table;
	}
	.kotak-item{
		/*float:left;*/
		width: 100%;
		margin-left: 10px;
		margin-right: 10px;
		margin-top: 2px;
		margin-bottom: 2px;
		display:inline-table;
	}
	.kotak3{
		width:100%;
		/*float:left;*/
		display:inline-table;
		margin:5px 0;
		margin-top:0px;
		/* height:210px; */
		border-bottom:1px dashed #000;
	}
	.kotak3-content{
		width:100%;
		margin:2px 0;
		/*float:left;*/
		display:flex;
	}
	.kotak3-content-content{
		/*float:left;*/
		display:inline-table;
		margin:0;
	}
	.judul{
		text-align:center;
		/* font-size:18px; */
	}
	.isi{
		/* <!-- text-align:center; --> */
	}
	.judulheadline{
		text-align:center;
		/* <!-- font-size:20px; --> */
	}
	.kotak3-content:first-child{
		border-bottom:1px dashed #000;
		/*padding-bottom:5px;*/
	}
	.kotak-judul p{
		margin:3px 0;
	}
	#col-1 {
		width: 65%
	}
	#col-2 {
		width: 35%
	}
	.kotak4{
		margin-top:0px;
		/*width:100%;*/
		display:inline-table;
		/*float:left;*/
		text-align:right;
		/* border-top:1px solid black; */
	}

	@page {
		size: A6;
		margin: 0;
	}
	@media print {
		html, body {
			width: 105mm;
			height: 148mm;
		}
		/* ... the rest of the rules ... */
	}
</style>
<body>

<div class="container-position">
		<div class="container" style="
    width: 330px;padding-left: 40px;
    margin-top: 20px;
">
			<div class="kotak-judul">
				<p>PERPUSTAKAAN</p>
				<p>SDN ARJOWINANGUN 2 MALANG</p>
				<!-- <p>086879798576</p> -->
			</div>
			<div class="kotak3">
				<div class="kotak3-content">
					<div style="width:50%; font-size: 13px; text-align: left;" class="kotak3-content-content judulheadline">
						<?php $originalDate2 =  date('Y-m-d H:i:s');
						echo date("d-m-Y") . '<br>' . date("H:i:s");
						?>
					</div>
					
					<div style="width:50%;font-size: 13px; text-align: right;" class="kotak3-content-content judulheadline">
						<?php echo $nota->id_peminjaman; ?>
					</div>
				</div>	
				<?php  foreach($buku as $iyaps):?>
				<div class="kotak3-content">
					<div style="width:30%;font-size: 13px;text-align:left;" class="kotak3-content-content judul">
						<?php echo $iyaps->kode_buku?>
					</div>
					<div style="width:45%;font-size: 13px;" class="kotak3-content-content isi">
						<?php echo $iyaps->judul_buku?>
					</div>
					<div style="width:25%;font-size: 13px; text-align: right;" class="kotak3-content-content judul">
					<?php echo $iyaps->tahun_terbit?>
					</div>
					
				</div>
				<?php endforeach?>
			</div>
			
            <div class="kotak">
				<div class="kotak-content" style="margin-left: 0;">

							<div class="kotak4">
								<p style="margin:0; width:100%;float:left;text-align:left;/*letter-spacing:3px;*/font-size: 13px;"> TOTAL ITEM : <?php echo $count_buku->jml_buku;?></p>
								<p style="margin:0; width:0%;float:left;text-align:right;font-size: 13px;"></p>
								<p style="margin:0; width:0%;float:left;font-size: 13px;">sadasdas<img src="<?php echo base_url('PeminjamanController/Barcode/'.$nota->id_peminjaman); ?>" alt=""></p>
								<p style="margin: 5px 0 0 0; width:40%;float:left;text-align:left;">
								
								</p>
								<p style="margin:0; width:0%;float:left;text-align:right;font-size: 13px;"></p>
								<p style="margin:0; width:0%;float:left;font-size: 13px;"><b>
									<!-- <?php echo number_format($master_penjualan->potongan)?> -->
								</b></p>
								<p style="margin:0; width:0%;float:left;text-align:right;font-size: 13px;"></p>
								<!-- <?php $total = $master_penjualan->total_harga - $master_penjualan->potongan;?> -->
								<p style="margin:0; width:0%;float:left;font-size: 13px;"><b>
									<!-- <?php echo number_format($total)?> -->
								</b></p>
								
							</div>
							
                </div>
			</div> 
			<div class="kotak">
				<div class="kotak-content" style="margin-left: 0;">

					<div class="kotak4">
						
						<p style="width:100%;float:left;text-align:left;font-size: 10pt;"><b>NB : MAX RETURN 1 MINGGU, NOTA BARCODE & BARANG UTUH</b></p>
						<p style="width:100%;font-size: 13px;float:left;text-align:center;">TERIMA KASIH <br>KAMI SENANG MELAYANI ANDA</p>
					</div>	
				</div>	
			</div>	
							
		</div>
	</div>
</body>
<script>
	window.onload = function(event) {
        window.print();
	};
	
	// window.onafterprint = function(){
	// 	 window.location.href = "<?php echo base_url('Peminjaman/cetak_nota') ?>";
	// };
</script>
</html>
