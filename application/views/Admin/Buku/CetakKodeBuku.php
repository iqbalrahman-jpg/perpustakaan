<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Member</title>
    <style>
        @media print {
            @page {
                size: 190px 120px;
                margin: 0px;
            }
        }

        .box{
            width: 170px;
            height: 90px;
            /* background-color: #f0f0f0; */
        }
        .header{
            width: 100%;
            height: 90px;
            /* background-color: gray; */
            justify-content: center;
        }
        .gambar{
            width:160px;
            height:70px;
            margin-left:5px;
            margin-top:15px;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="header">
            <img src="<?= base_url("BukuController/Barcode/") . $buku[0]->kode_buku ?>" class="gambar" alt="">
        </div>
    </div>
    
</body>
<!-- Script Menampilkan Struk PDF -->
<script>

	window.onload = function(event) {

        window.print();

	};

	

	window.onafterprint = function(){

		 window.location.href = "<?php echo base_url('BukuController/') ?>";

	};

</script>
<!-- Script Menampilkan Struk PDF End-->

</html>