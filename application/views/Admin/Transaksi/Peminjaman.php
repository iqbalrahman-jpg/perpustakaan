<!-- Menampilkan Input data peminjaman -->
<div class="container-fluid">
     <form action="<?php echo site_url('PeminjamanController/simpan_transaksi'); ?>" method="post"> <!-- Mengarahkan post form ke PeminjamanController, function simpan_transaksi -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman Buku</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <input type="text" id="tgl_peminjaman" name="tgl_peminjaman" class="form-control" value="<?php echo $tglpinjam; ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <input type="text" id="tgl_pengembalian" name="tgl_pengembalian" class="form-control" value="<?php echo $tglkembali; ?>" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <div class="form-group">
                                <label>Admin Bertugas</label>
                                <input type="text"  id="nama_admin" name="nama_admin" class="form-control" value="<?= $user['nama_admin']; ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group col">
                            <div class="form-group">
                                <label>Kode Detail Peminjaman</label>
                                <input type="text" id="kode_detail_peminjaman" name="kode_detail_peminjaman" class="form-control" value="<?php echo $barcode ?>" readonly="readonly">                            
                            </div>
                        </div>
                        <div class="form-group col">
                            <div class="form-group">
                                <label>Kode Peminjaman</label>
                                <input type="text" id="id_peminjaman" name="id_peminjaman" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly">
                            </div>
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Kode Member</label>
			                <input name="kode_member" class="form-control" id="kode_member">
                        </div>
                        <div class="form-group col">
                            <label for="inputCity">Nama Member</label>
                            <input type="text" name="nama_member" id="nama_member" class="form-control" readonly="readonly">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Peminjaman Buku</h6>
                <button type="button" class="btn btn-success" id="BarisBaru"><i class="fa fa-plus"></i> Baris Baru</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- data buku -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- <div class="form-inline">
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                    <input type="text" class="form-control" id="kode_buku">
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" id="judul_buku" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input type="text" class="form-control" id="penulis_buku" readonly="readonly">
                                </div>

                                <div class="form-group ">
                                    <button id="tambah_buku" class="btn btn-primary"> Add Book <i class="glyphicon glyphicon-plus"></i></button>
                                </div>

                                <div class="form-group">
                                    <button id="cari" class="btn btn-success"> Search Book <i class="glyphicon glyphicon-search"></i></button>
                                </div>                  
                            </div> -->
                                <!-- <br /><br /> -->

                                <!-- buat tampil tabel tmp -->
                                <table class="table table-bordered" id="tableTransaksi" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Penulis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <!-- <a href="<?= base_url('PeminjamanController/Cetak') ?>" class="btn btn-primary btn-icon-split" id="simpan">
									<span class="icon text-white-50">
										<i class="fas fa-save"></i>
									</span>
									<span class="text">Simpan</span>
								</a> -->
                                <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                            </div>
                        </div>
                        <!-- end data buku -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.end row -->
            </div>
        </div>
    </form>
</div>
<!-- Menampilkan Input data peminjaman End-->


<!-- Menampilkan Input data buku yang dipinjam -->
<div class="modal fade" id="pilihbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Buku</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-md-12" style="display: flex;">
                            <div class="col-md-6">
                                <input type="hidden" name="no_urut" id="no_urut" />
                                <select name="jenis_buku" id="jenis_buku" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Buku_Umum">Buku Umum</option>
                                    <option value="Tugas_Akhir">Tugas Akhir</option>
                                    <option value="Laporan_PKL">Laporan PKL</option>
                                    <option value="Komik">Komik</option>
                                    <option value="Novel">Novel</option>
                                    <option value="Majalah">Majalah</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" onclick="cari()" class="btn btn-success">Cari</button>
                            </div>
                        </div>
                        <br />
                        <table class="table table-bordered" id="tableBarang" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Buku</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tahun Terbit</th>
                                    <th>Edisi Majalah</th>
                                    <th>Rak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PAGE CONTENT ENDS -->
</div>
<!-- Menampilkan Input data buku yang dipinjam End -->


<!-- Script Peminjaman Buku -->
<script>
    let dataBarang;
    var table2;
    $(document).ready(function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            0
        );
        getDataBuku();
        BarisBaru();
        orde1(0, 0);
    });

    function orde1(id_blok1, id_blok2) {
        table2 = $("#tableBarang")
            .DataTable({
                processing: true, //Feature control the processing indicator.
                // serverSide: true,
                bDestroy: true,
                order: [], //Initial no order.

                // Load data for the table's content from an Ajax source
                ajax: {
                    url: "<?php echo base_url() ?>PeminjamanController/ajax_listall/" + id_blok1 + "/" + id_blok2,
                    type: "POST",
					dataSrc: ""
                },

                order: [1, "asc"],
            })
            .fnDestroy();
        table2.ajax.reload();
    }

    $("#BarisBaru").on("click", function () {
        BarisBaru();
    });

    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    // hide and show search result
    // $('#pencarian_kode').focus(function(){
    // 	$('#hasil_pencarian').show();
    // });
    $("body").mouseup((e) => {
        if (!(e.target.id == "pencarian_kode" || e.target.id == "btnCari" || e.target.parentNode.id == "btnCari")) {
            $("#hasil_pencarian").hide();
        }
    });

    function getDataBuku() {
        $.ajax({
            url: "<?php echo base_url() ?>PeminjamanController/getDataBuku",
            method: "POST",
            dataType: "JSON",
            success: function (json) {
                console.log(json);
                dataBuku = json.datanya;
            },
        });
    }

    function BarisBaru() {
        var jenis_buku = $("#jenis_buku").val();
        var Nomor = $("#tableTransaksi tbody tr").length + 1;

        // 0
        var Baris = "<tr>";
        Baris += "<td>" + Nomor + "</td>";

        // 1
        Baris += "<td style='display: flex;height: 58px;'>";
        Baris +=
            '<input autocomplete="off" required  type="text" class="form-control kode_buku' +
            Nomor +
            '" name="kode_buku[]" id="pencarian_kode" placeholder="Ketik Kode / Nama Buku"><button type="button" class="btn-sm btn-success" onclick="detail_barang(' +
            Nomor +
            ",'" +
            jenis_buku +
            '\')" style="margin-left: 4px;"> <i class="fa fa-search"></i></button>';
        Baris += "<div id='hasil_pencarian' class='hasil_pencarian'></div>";
        Baris += "</td>";

        // 2
        Baris += "<td>";
        Baris += '<span class="judul_buku' + Nomor + '"></span>';
        Baris += "</td>";

        // 3
        Baris += "<td>";
        Baris += '<span class="nama_penulis' + Nomor + '"></span>';
        Baris += "</td>";

        Baris += "<td><button  class='btn btn-danger' id='HapusBaris'><i class='fa fa-times' style='color:white;'></i></button></td>";
        Baris += "</tr>";

        $("#tableTransaksi").append(Baris);
        // Fokus Input
        $("#tableTransaksi tbody tr").each(function () {
            $(this).find("td:nth-child(2) input").focus();
        });
    }

    let intervalPress;

    function cariBuku(keyword, Indexnya, foundItem) {
        let htmlFoundItem = "<ul id='daftar-autocomplete' class='daftar-autocomplete'>";
        foundItem.forEach((b, i) => {
            //	var b.stok_gudang = 0;
            if (i == 0) {
                htmlFoundItem += '<li class="--focus">';
            } else {
                htmlFoundItem += "<li>";
            }

            htmlFoundItem +=
                `
					<b>Kode</b> : 
					` +
                // <span id='kodenya'>` + b.kode_barang + `</span> <br />
                `
					<span id='kodenya'>` +
                b.kode_buku +
                `</span> <br />
					<span id='judulnya'>` +
                b.judul_buku +
                `</span> <br />
					<span id='penulisnya'>` +
                b.penulis_buku +
                `</span><br />
					<span id='penerbitnya'>` +
                b.penerbit_buku +
                `</span>
					<span id='tahunnya'>` +
                b.tahun_terbit +
                `</span>
				</li>
			`;
        });
        htmlFoundItem += "</ul>";

        if (foundItem.length > 0 && keyword != "") {
            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(2)")
                .find("div#hasil_pencarian")
                .show("fast");
            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(2)")
                .find("div#hasil_pencarian")
                .html(htmlFoundItem);
        } else {
            let tidakAda = '<ul class="daftar-autocomplete"><li> <span>Data Tidak Ditemukan</span></li><ul>';
            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(2)")
                .find("div#hasil_pencarian")
                .html(tidakAda);
            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(2)")
                .find("div#hasil_pencarian")
                .show("fast");
        }
        return foundItem.length;
    }

    let tempKeyword = false;
    $(document).on("keyup", "#pencarian_kode", function (e) {
        var keyword = $(this).val();
        var Indexnya = $(this).parent().parent().index();
        var key = e.which || e.keyCode;
        if (e.which == 40) {
            $(this).select();
            $(this)
                .parent()
                .find("#hasil_pencarian > #daftar-autocomplete li")
                .each(function (i, e) {
                    if ($(this).hasClass("--focus") && i < $(this).parent().find("li").length - 1) {
                        $(this).removeClass("--focus");
                        $(this)
                            .parent()
                            .find("li")
                            .each(function (ii, e) {
                                if (ii == i + 1) {
                                    $(this).addClass("--focus");
                                    if ($(this).position().top > 350) {
                                        $(this)
                                            .parent()
                                            .parent()
                                            .scrollTop($(this).parent().parent().scrollTop() + 71);
                                    }
                                }
                            });
                        return false;
                    }
                });
            e.preventDefault();
            return false;
        } else if (e.which == 38) {
            $(this).select();
            $(this)
                .parent()
                .find("#hasil_pencarian > #daftar-autocomplete li")
                .each(function (i, e) {
                    if ($(this).hasClass("--focus") && i != 0) {
                        $(this).removeClass("--focus");
                        $(this)
                            .parent()
                            .find("li")
                            .each(function (ii, e) {
                                if (ii == i - 1) {
                                    $(this).addClass("--focus");
                                    if ($(this).position().top < 0) {
                                        $(this)
                                            .parent()
                                            .parent()
                                            .scrollTop($(this).parent().parent().scrollTop() - 71);
                                    }
                                }
                            });
                        return false;
                    }
                });
            e.preventDefault();
            return false;
        } else if (e.which == 13) {
            console.log("dapatu");
            $(this).select();
            let foundItem = [];
            for (let i = 0; i < dataBuku.length; i++) {
                let reg = new RegExp("^" + keyword + ".*$", "i");
                if (
                    (dataBuku[i].kode_buku ? dataBuku[i].kode_buku : "").toLowerCase().includes(keyword.toLowerCase()) ||
                    (dataBuku[i].judul_buku ? dataBuku[i].judul_buku : "").toLowerCase().includes(keyword.toLowerCase()) ||
                    (dataBuku[i].penulis_buku ? dataBuku[i].penulis_buku : "").toLowerCase().includes(keyword.toLowerCase())
                ) {
                    foundItem.push(dataBuku[i]);
                }
            }

            // foundItem = [foundItem[0]];

            if (foundItem.length > 1) {
                console.log("dapat");
                if ($(this).parent().find("#hasil_pencarian > #daftar-autocomplete").is(":visible") && tempKeyword) {
                    $(this)
                        .parent()
                        .find("#hasil_pencarian > #daftar-autocomplete li")
                        .each(function (i, e) {
                            if ($(this).hasClass("--focus")) {
                                $(this).parent().parent().parent().find("input").val($(this).find("span#kodenya").html());

                                var Indexnya = $(this).parent().parent().parent().parent().index();
                                var KodeBuku = $(this).find("span#kodenya").html();
                                var JudulBuku = $(this).find("span#judulnya").html();
                                var PenulisBuku = $(this).find("span#penulisnya").html();
                                //var Harganya 	  = $(this).find('span#harganya').html();
                                var PenerbitBuku = $(this).find("span#penerbitnya").html();
                                //console.log('IdBarang'+IdBarang);
                                var TahunTerbit = $(this).find("span#tahunnya").html();

                                $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(2)")
                                    .find("div#hasil_pencarian")
                                    .hide();
                                $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(3)").html(JudulBuku);
                                $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(4)").html(PenulisBuku);
                                // $('#tableTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input#jumlah_beli').removeAttr('disabled').val(1);

                                var IndexIni = Indexnya + 1;
                                var TotalIndex = $("#tableTransaksi tbody tr").length;
                                if (IndexIni == TotalIndex) {
                                    //BarisBaru();
                                    $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(6) input").focus();
                                    // $('html, body').animate({ scrollTop: $(document).height() }, 0);
                                } else {
                                    $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(6) input").focus();
                                }
                                //HitungTotalBayar();
                            }
                        });
                } else {
                    cariBuku(keyword, Indexnya, foundItem);
                    tempKeyword = true;
                }
            } else {
                cariBuku(keyword, Indexnya, foundItem);
                $(this)
                    .parent()
                    .find("#hasil_pencarian > #daftar-autocomplete li")
                    .each(function (i, e) {
                        if ($(this).hasClass("--focus")) {
                            $(this).parent().parent().parent().find("input").val($(this).find("span#kodenya").html());

                            var Indexnya = $(this).parent().parent().parent().parent().index();
                            var KodeBuku = $(this).find("span#kodenya").html();
                            var JudulBuku = $(this).find("span#judulnya").html();
                            var PenulisBuku = $(this).find("span#penulisnya").html();
                            var PenerbitBuku = $(this).find("span#penerbitnya").html();
                            var TahunTerbit = $(this).find("span#tahunnya").html();

                            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(2)")
                                .find("div#hasil_pencarian")
                                .hide();
                            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(3)").html(JudulBuku);
                            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(4)").html(PenulisBuku);

                            var IndexIni = Indexnya + 1;
                            var TotalIndex = $("#tableTransaksi tbody tr").length;
                            if (IndexIni == TotalIndex) {
                                //BarisBaru();
                                $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(6) input").focus();
                            } else {
                                $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(6) input").focus();
                            }
                            //HitungTotalBayar();
                        }
                    });
            }
        } else {
            tempKeyword = false;
        }
    });

    $(document).on("click", "#daftar-autocomplete li", function () {
        $(this)
            .parent()
            .find(".--focus")
            .each(function () {
                $(this).removeClass("--focus");
            });
        $(this).addClass("--focus");
        $(this).parent().parent().parent().find("input").val($(this).find("span#kodenya").html());

        var Indexnya = $(this).parent().parent().parent().parent().index();
        var KodeBuku = $(this).find("span#kodenya").html();
        var JudulBuku = $(this).find("span#judulnya").html();
        var PenulisBuku = $(this).find("span#penulisnya").html();
        var PenerbitBuku = $(this).find("span#penerbitnya").html();
        var TahunBuku = $(this).find("span#tahunnya").html();

        $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(2)")
            .find("div#hasil_pencarian")
            .hide();
        $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(3)").html(JudulBuku);
        $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(4)").val(PenulisBuku);

        var IndexIni = Indexnya + 1;
        var TotalIndex = $("#tableTransaksi tbody tr").length;
        if (IndexIni == TotalIndex) {
            //BarisBaru();
            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(6) input").focus();
            // $('html, body').animate({ scrollTop: $(document).height() }, 0);
        } else {
            $("#tableTransaksi tbody tr:eq(" + Indexnya + ") td:nth-child(6) input").focus();
        }
        //HitungTotalBayar();
    });

    $(document).on("click", "#HapusBaris", function (e) {
        e.preventDefault();
        if ($(this).parent().parent().find("#pencarian_kode").val() == "") {
            $(this).parent().parent().remove();
            var Nomor = 1;
            $("#tableTransaksi tbody tr").each(function () {
                $(this).find("td:nth-child(1)").html(Nomor);
                Nomor++;
            });
            //	HitungTotalBayar();
        } else {
            $(this).parent().parent().remove();
            var Nomor = 1;
            $("#tableTransaksi tbody tr").each(function () {
                $(this).find("td:nth-child(1)").html(Nomor);
                Nomor++;
            });
            //	HitungTotalBayar();
        }
    });

    function detail_barang(Nomor, jenis_buku) {
        $("#pilihbarang").modal("show");
        $("#no_urut").val(Nomor);
        //var jenis_buku = $('#jenis_buku').val();
        table2 = $("#tableBarang")
            .DataTable({
                processing: true, //Feature control the processing indicator.
                // serverSide: true,
                bDestroy: true,
                order: [], //Initial no order.

                // Load data for the table's content from an Ajax source
                ajax: {
                    url: "<?php echo base_url() ?>PeminjamanController/ajax_listall/" + Nomor + "/" + jenis_buku,
                    type: "POST",
					dataSrc: ""
                },

                order: [1, "asc"],
            })
            .fnDestroy();
        table2.ajax.reload();
    }

    function cari() {
        var Nomor = $("#no_urut").val();
        console.log("Nomor", Nomor);
        var jenis_buku = $("#jenis_buku").val();
        orde1(Nomor, jenis_buku);
    }

    function pencarian_kode(id_buku, kode_buku, judul_buku, penulis_buku, tahun_terbit, edisi_majalah, rak_buku, Nomor) {
        $(".kode_buku" + Nomor).val(kode_buku);
        $(".judul_buku" + Nomor).html(judul_buku);
        $(".nama_penulis" + Nomor).html(penulis_buku);

        $("#pilihbarang").modal("hide");
    }
</script>
<!-- Script Peminjaman Buku End -->
