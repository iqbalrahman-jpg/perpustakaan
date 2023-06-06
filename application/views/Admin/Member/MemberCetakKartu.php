<link href="<?php echo base_url('assets') ?>/table/bootstrap-table.css" rel="stylesheet">

<script src="<?php echo base_url('assets') ?>/table/bootstrap-table.js"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Cetak Kartu Member</h1>
    <div class="card shadow mb-4">

        <div class="card-header py-3">

        </div>

        <div class="card-body">

	    <div class="row">



	        <div class=" col-md-3">

	            <label for="form-field-9">Member</label></br>

	            <button type="button" onclick="faktur()" class="btn btn-success"><i class="fa fa-search" readonly></i> Cari Member</i></button>

	        </div>

	        <div class="col-md-9">
                
                    <div class="view-detail-member">
                        
                    </div>
                
	        </div>

	    </div>

		</div>

	</div>	
</div>

<!-- //modal each -->
<div class="modal fade" id="tampilMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

   	<div class="modal-dialog modal-lg" style="min-width: auto; max-width: fit-content;">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Member Perpustakaan</h5>

            </div>

           	<div class="modal-body">

               	<div class="row">

                        <table id="member_table" class="tabelmember" data-toggle="table" data-select-item-name="toolbar1" data-sort-name="id_jurnal" data-sort-order="desc" data-pagination="false" data-search="true">

                            <thead>

                                <tr>

                                    <th data-formatter="runningFormatter" data-align="right">No.</th>

                                    <th data-field="kode_member" data-sortable="true">Kode Member</th>

                                    <th data-field="nama_member" data-sortable="true">Nama Member</th>

                                    <th data-field="no_telp_member" data-sortable="true">No. Telp</th>

                                    <th data-field="email_member" data-sortable="true">Email</th>
                                    <th data-field="alamat_member" data-sortable="true">Alamat</th>

                                    <th data-field="id_member" data-formatter="actiondetail">Action</th>

                                </tr>

                            </thead>

                        </table>

                </div>

            </div>

        </div>

   	</div>

</div>

<script>
    function faktur() {
        $('#tampilMember').modal('show');
        console.log('iya');
        
        $('#member_table').bootstrapTable('refresh', {

            url: '<?php echo base_url() ?>MemberController/get_list_member',

        });

    }

    function runningFormatter(value, row, index) {

        return index + 1;

    }

    function actiondetail(value, row, index) {

        return '<div class="btn-group" role="group" aria-label="..."><a href="#" onclick="detailnya( \'' + row.id_member + '\')" type="button" class="btn btn-primary"><span aria-hidden="true"></span>Pilih</a></div>';

    }

    function detailnya(id_member) {

        $.ajax({

            url: "<?php echo base_url('MemberController/get_id_member2/') ?>" + id_member,

            type: "GET",

            dataType: "JSON",

            success: function(result) {

                $('.view-detail-member').html(
                    '<form action="' + '<?php echo site_url("MemberController/print_kartu/");?>' + result.id_member+ '" method="post">' +
                    '<b>Kode Member: </b>' + result.kode_member + 
                    '<br />' + '<b>Nama Member: </b>' + result.nama_member + 
                    '<br />' + '<b>Email: </b>' + result.email_member + 
                    '<br />' + '<b>Alamat: </b>' + result.alamat_member + 
                    '<br/><button type="submit" class="btn btn-primary mt-3">Cetak Kartu</button>' +
                    '</form>'
                    );

            },

            error: function(jqXHR, textStatus, errorThrown) {

                alert('Data Eror');

            }

        })

        $('#tampilMember').modal('hide');

    }
</script>