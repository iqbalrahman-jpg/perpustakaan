<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>

		Nota Peminjaman

	</title>

	<link href="<?php echo base_url(); ?>/assets/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

</head>

<style>

	body{

		margin:0 !important;

		font-weight: 600;

		font-family:'Arial';



	}

	.kotak-judul{

		text-align:center; 

		padding:5px 0;

		/* border-bottom:1px solid black; */

		width:100%;

		font-weight:900;

		/*float:left;*/

		display:inline-table;

		font-size:14px;

	}

	.kotak{

		/*width:100%;*/

		border-bottom:1px dashed #000;

		border-width:3px;



	}

	.kotak-content{

		/*float:left;*/

		/*width: 100%;*/

		margin-left: 5px;

		/*margin-right: 10px;*/

		margin-top: 2px;

		margin-bottom: 2px;

		display:inline-table;

	}

	.kotak-item{

		/*float:left;*/

		width: 100%;

		margin-left: 5px;

		margin-right: 5px;

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

		border-width:3px;





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

		/* <!-- font-size:18px; --> */

	}

	.isi{

		text-align:center;

	}

	.judulheadline{

		text-align:center;

		/* <!-- font-size:20px; --> */

	}

	.kotak3-content:first-child{

		border-bottom:1px dashed #000;

		border-width:3px;

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

		font-weight: 900;

		/* border-top:1px solid black; */

	}



	@page {

		size: A6;

		margin: 0;

	}

	@media print {

		html, body {

			width: auto;

			height: auto;

		}

		/* ... the rest of the rules ... */

	}

</style>

<body>

	<div class="container-position">

		<div class="container" style="width: 430px;padding-left: 20px;margin-top: 20px;">

			<div class="kotak-judul" style="font-size: 14pt;">

				<h2>

					<?php foreach ($perpus as $pr) : ?>

						<p><?= $pr->nama ?></p>

						<p><?= $pr->alamat ?></p>


					<?php endforeach; ?>

				</h2>

			</div>

			<div class="kotak3" style="margin-top:6%;">

				<div class="kotak3-content">
					<div style="width:60%; font-size: 14pt; text-align: left;" class="kotak3-content-content judulheadline">

						<p>Tgl Pinjam : <?php $originalDate2 =  date('Y-m-d H:i:s');echo date("d-m-Y") ;?></p>

						<p>Petugas : <?= $user['nama_admin']; ?></p>
						<p>Peminjam : <?php echo $nota->nama_member; ?></p>

					</div>
				</div>

				

				<div class="kotak3-content">

					<div style="width:36%;font-size: 14pt;text-align:left;" class="kotak3-content-content judul">

						<p><b> Kode Buku </b></p>

					</div>

					<div style="width:60%;font-size: 14pt;text-align:center;" class="kotak3-content-content judul">

						<p><b> Nama Buku </b></p>

					</div>


				</div>



				<?php  foreach($buku as $iyaps):?>

				<div class="kotak3-content" style="margin-top:1%;">

					<div style="width:36%;font-size: 14pt;text-align:left;" class="kotak3-content-content judul">

						<?php echo $iyaps->kode_buku?>

					</div>

					<div style="width:60%;font-size: 14pt;" class="kotak3-content-content isi">

						<?php echo $iyaps->judul_buku?>

					</div>			

				</div>

				<?php endforeach?>

			</div>

			

			<div class="kotak">

				<div class="kotak-content" style="margin-left: 0;">



							<div class="kotak4" style="margin-top:5%;">

								<p style="margin:0; width:100%;float:left;text-align:left;/*letter-spacing:3px;*/font-size:14pt;"> <b>TOTAL ITEM : <?php echo $count_buku->jml_buku;?></b> </p>

								<p style="margin:0; width:0%;float:left;text-align:right;font-size:14pt;"></p>

								<p style="margin: 5px 0 0 0; width:40%;float:left;text-align:left;">

								

								</p>

								<p style="margin:0; width:0%;float:left;text-align:right;font-size:14pt;"></p>

								<p style="margin:0; width:0%;float:left;font-size:14pt;"><b>


								</b></p>

								<p style="margin:0; width:0%;float:left;text-align:right;font-size:14pt;"></p>


								<p style="margin:0; width:0%;float:left;font-size:14pt;"><b>


								</b></p>

								

							</div>

							

				</div>

			</div> 

			<div class="kotak">

				<div class="kotak-content" style="margin-left: 0;">

					<div class="kotak4">

						<p style="width:100%;float:left;text-align:left;font-size: 15pt;">NB : MAX KEMBALIKAN 1 MINGGU <br> ( NOTA & BUKU)</p>

						<p style="width:100%;font-size: 14pt;float:left;text-align:center;"><b>TERIMA KASIH <br>KAMI SENANG MELAYANI ANDA</b></p>

					</div>

				</div>	

			</div>	
				<img style="margin-top:8%;width:100%; float:left" src="<?php echo base_url('PeminjamanController/Barcode/'.$nota->kode_member); ?>" alt="">  <!-- Menampilkan gambar barcode -->
		</div>

	</div>

</body>



<!-- Script Menampilkan Struk PDF -->
<script>

	window.onload = function(event) {

        window.print();

	};

	

	window.onafterprint = function(){

		 window.location.href = "<?php echo base_url('PeminjamanController') ?>";

	};

</script>
<!-- Script Menampilkan Struk PDF End-->

</html>

