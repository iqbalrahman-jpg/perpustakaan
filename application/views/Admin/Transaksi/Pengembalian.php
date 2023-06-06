<link href="<?php echo base_url('assets') ?>/table/bootstrap-table.css" rel="stylesheet">

<script src="<?php echo base_url('assets') ?>/table/bootstrap-table.js"></script>

<div class="container-fluid">

<form method='post' action='<?php echo base_url('PengembalianController/simpan_pengembalian') ?>'>

    <div class="card shadow mb-4">

        <div class="card-header py-3">

        </div>

        <div class="card-body">

	    <div class="row">



	        <div class=" col-md-3">

	            <label for="form-field-9">No Peminjaman</label>

	            <button type="button" onclick="faktur()" class="btn btn-success"><i class="fa fa-search" readonly></i> Cari No Peminjaman Lama</i></button>

	        </div>

	        <div class="col-md-3 ">

	            <label for="form-field-9">Peminjaman Terdahulu</label>

	            <input id="tags" type="text" name="id_peminjaman_view" class="form-control" readonly="readonly">

	            <span id="invoice_peminjaman"></span>

	        </div>

	        <div class="col-md-6">

	            <div class="form-group row">

	                <label for="inputPassword" class="col-sm-4 col-form-label">Kode Pengembalian</label>

	                <div class="col-sm-8">

	                    <input type="text" name="no_faktur_penjualan" class=" form-control" id="no_nota_2" placeholder="" value="<?php echo $autonumber ?>">

	                </div>

	            </div>

	            <div class="form-group row">

	                <label for="inputPassword" class="col-sm-4 col-form-label">Tanggal</label>

	                <?php

	                    $tgl = date("Y-m-d");

	                ?>

	                <div class="col-sm-8">

	                    <input type="date" class="form-control" name="tgl_dikembalikan" id="inputPassword" value="<?= $tgl ?>">

	                </div>

	            </div>

	                                                    

	                                                    

	        </div>

	    </div>

		</div>

	</div>	

	<div class="card shadow mb-4">

        <div class="card-header py-3">

            

        </div>

        <div class="card-body">

	    <div class="row">

	        <div class="col-xl-12">

	            <a type="button" onclick="cari_buku_faktur()" class="btn btn-danger"><i class="fa fa-search"></i> Cari Buku Dari Peminjaman</a><br /><br />

	            <table id="pembayaran_hutang_table_det" data-toggle="table" data-select-item-name="toolbar1" data-sort-name="id_jurnal" data-sort-order="desc">

	                <thead>

	                    <tr>

	                        <th data-formatter="runningFormatter" data-align="right">No.</th>

	                        <th data-field="id_buku|kode_buku|id_detail_peminjaman" data-sortable="true" data-formatter="kodebuku2">Kode Buku</th>

	                        <th data-field="judul_buku" data-sortable="true">Judul Buku</th>

	                        <th data-field="penulis_buku" data-sortable="true" data-formatter="berat">Nama Penulis</th>

	                        <th data-field="penerbit_buku" data-sortable="true" >Penerbit Buku</th>

	                        <th data-field="tahun_terbit" data-sortable="true" >Tahun Terbit</th>

	                    </tr>

	                </thead>

	            </table><br />

	            <button type="submit" class="btn btn-primary ">Simpan</button>

	        </div>

	    </div>

		</div>

	</div>	

</form>

</div>  



<div class="modal fade" id="tampilFaktur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

   	<div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Peminjaman</h5>

            </div>

           	<div class="modal-body">

               	<div class="row">

                   



                        <table id="pembayaran_hutang_table" class="tabelfaktur" data-toggle="table" data-select-item-name="toolbar1" data-sort-name="id_jurnal" data-sort-order="desc" data-pagination="false" data-search="true">

                            <thead>

                                <tr>

                                    <th data-formatter="runningFormatter" data-align="right">No.</th>

                                    <th data-field="id_peminjaman" data-sortable="true">Kode Peminjaman</th>

                                    <th data-field="tgl_peminjaman" data-sortable="true">Tanggal Peminjaman</th>

                                    <th data-field="nama_member" data-sortable="true">Member</th>

                                    <th data-field="tgl_pengembalian" data-sortable="true">Tanggal Pengembalian</th>

                                    <th data-field="id_peminjaman" data-formatter="actiondetail">Action</th>

                                </tr>

                            </thead>

                        </table>

                </div>

            </div>

        </div>

   	</div>

</div>



<div class="modal fade" id="tampilFakturBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Buku Pengembalian</h5>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-xs-12">

                        <div class="col-md-12 ">

                        	 <table id="faktur_barang_table" class="tabelfaktur" data-toggle="table" data-select-item-name="toolbar1" data-sort-name="id_jurnal" data-sort-order="desc" data-pagination="false" data-search="false">

                                                    <thead>

                                                        <tr>

                                                            <th data-formatter="runningFormatter" data-align="right">No.</th>

                                                           <th data-field="id_buku|kode_buku" data-sortable="true" data-formatter="kodebuku">ISBN</th>

									                        <th data-field="judul_buku" data-sortable="true">Judul Buku</th>

									                        <th data-field="penulis_buku" data-sortable="true" >Nama Penulis</th>

									                        <th data-field="penerbit_buku" data-sortable="true" >Penerbit Buku</th>

									                        <th data-field="tahun_terbit" data-sortable="true" >Tahun Terbit</th>

                                                            <th data-field="id_buku|kode_buku|judul_buku|penulis_buku|penerbit_buku|penerbit_buku|tahun_terbit|id_detail_peminjaman" data-formatter="actiondetailbarang">Action</th>

                                                        </tr>

                                                    </thead>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<script>

    var session_id = "<?php echo $id_kpesan?>";

	function faktur() {

        $('#tampilFaktur').modal('show');
        
        $('#pembayaran_hutang_table').bootstrapTable('refresh', {

            url: '<?php echo base_url() ?>PengembalianController/get_list_peminjaman',

        });

    }



    function runningFormatter(value, row, index) {

        return index + 1;

    }



    function actiondetail(value, row, index) {

        return '<div class="btn-group" role="group" aria-label="..."><a href="#" onclick="detailnya( \'' + row.id_peminjaman + '\')" type="button" class="btn btn-primary"><span aria-hidden="true"></span>Pilih</a></div>';

    }



    function detailnya(id_peminjaman) {

        $.ajax({

            url: "<?php echo base_url('PengembalianController/tampil_peminjaman2/') ?>" + id_peminjaman,

            type: "GET",

            dataType: "JSON",

            success: function(result) {

                $('[name="id_peminjaman_view"]').val(result.id_peminjaman);

                $('#invoice_peminjaman').html('<b>Kode Member: </b>' + result.kode_member + '<br />' + '<b>Nama Member: </b>' + result.nama_member + '<br />' + '<b>Email: </b>' + result.email_member + '<br />' + '<b>Alamat: </b>' + result.alamat_member);



            },

            error: function(jqXHR, textStatus, errorThrown) {

                alert('Data Eror');

            }

        })

        $('#tampilFaktur').modal('hide');

    }



    function cari_buku_faktur(){

        var no_peminjaman_lama = $('#tags').val();

        //console.log('no_faktur_lama'+no_faktur_lama);

        $('#tampilFakturBarang').modal('show');

        $('#faktur_barang_table').bootstrapTable('refresh', {

            url: '<?php echo base_url() ?>PengembalianController/get_list_buku_peminjaman/'+no_peminjaman_lama

        });

    }    



    function actiondetailbarang(value, row, index){

        var no_beli= $('#no_nota_2').val();

        return '<div class="btn-group" role="group" aria-label="..."><a href="#" onclick="detailnya_buku( \'' + row.id_buku + '\', \''+row.kode_buku+'\', \''+row.judul_buku+'\', \''+row.penulis_buku+'\', \''+row.penerbit_buku+'\', \''+row.tahun_terbit+'\', \''+no_beli+'\', \''+row.id_detail_peminjaman+'\')" type="button" class="btn btn-danger"><span aria-hidden="true"></span>Pilih</a></div>';

    } 



    function kodebuku(value, row, index) {

        return '' + row.kode_buku + '<input name="kode_buku[]" type="hidden" class="form-control kode_buku' + row.id_buku + '" value="' + row.kode_buku + '" id="kode_stok"><input name="id_buku[]" type="hidden" class="form-control id_buku' + row.id_buku + '" value="' + row.id_buku + '" id="Idne">';

    }

    function kodebuku2(value, row, index) {

        return '' + row.kode_buku + '<input name="kode_buku[]" type="hidden" class="form-control kode_buku' + row.id_buku + '" value="' + row.kode_buku + '" id="kode_stok"><input name="id_buku[]" type="hidden" class="form-control id_buku' + row.id_buku + '" value="' + row.id_buku + '" id="Idne"><input name="id_detail_peminjaman[]" type="hidden" class="form-control id_detail_peminjaman' + row.id_detail_peminjaman + '" value="' + row.id_detail_peminjaman + '" id="id_detail_peminjaman">';

    } 



    function detailnya_buku(id_buku, kode_buku, judul_buku, penulis_buku,penerbit_buku, tahun_terbit, no_beli,id_detail_peminjaman){



        var $table_temp_pembelian = $('#pembayaran_hutang_table_det');

        $.ajax({

                type: "POST",

                url: '<?php echo base_url('PengembalianController/keranjang_pengembalian_sementara'); ?>',

                data: { 

                    id_buku : kode_buku,

                    no_beli  : no_beli,

                    session_id : session_id,

                    id_detail_peminjaman : id_detail_peminjaman

                    // fc_kdstock : fc_kdstock,

                    // fn_berat : fn_berat,

                    // ff_kadar : ff_kadar,

                    // fm_price : fm_price,

                    // fm_subtot : fm_subtot 

                },

                success: function (data) {



                    console.log('data berhasil disimpan');

                    $table_temp_pembelian.bootstrapTable('refresh', {

                        url: '<?php echo base_url() ?>PengembalianController/get_list_pengembalian_det_temp/'+session_id

                    });

                }    

        });  

        $('#tampilFakturBarang').modal('hide');

    }

</script>      