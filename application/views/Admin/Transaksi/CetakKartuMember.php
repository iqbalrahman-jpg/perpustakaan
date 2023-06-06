<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Member</title>
    <style>
        @media print 
        {
        @page {
            size: 340px 220px;
            margin: 0px;
        }
        }

        .box{
            width: 323px;
            height: 204px;
            /* background-color: #f0f0f0; */
        }
        .header{
            width: 100%;
            height: 35px;
            /* background-color: gray; */
            display: flex;
            justify-content: center;
            border-bottom:1px dashed #000;
        }
        .title-header{
            font-size: 18px;
            font-weight: 900;
            margin: auto;
            
            
        }
        .contain{
            width: 100%;
            height: 169px;
            /* background-color: #f1f1f1; */
            display: inline-block;
            justify-content: center;
            align-items:center;
        }
        .nama{
            font-size: 16px;
            margin: 20px auto 0;
            text-align:center;
            
        }
        .alamat{
            font-size: 12px;
            margin: 0px auto;
            text-align:center;
        }
        .gambar{
            width:160px;
            height:60px;
            margin-left:80px;
            margin-top:20px;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="header">
            <span class="title-header">Kartu Member Perpustakaan</span>
        </div>
        <div class="contain">
            <p class="nama"><b><?=$detail[0]->nama_member?></b></p>
            <p class="alamat"><?=$detail[0]->alamat_member?></p>
            <img src="<?= base_url("MemberController/Barcode/") . $detail[0]->kode_member ?>" class="gambar" alt="">
        </div>
    </div>
    
</body>
<!-- Script Menampilkan Struk PDF -->
<script>

	window.onload = function(event) {

        window.print();

	};

	

	window.onafterprint = function(){

		 window.location.href = "<?php echo base_url('MemberController/Cetak_Kartu') ?>";

	};

</script>
<!-- Script Menampilkan Struk PDF End-->

</html>