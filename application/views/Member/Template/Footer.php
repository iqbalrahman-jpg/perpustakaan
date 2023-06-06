</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<script src="<?= base_url() ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>/assets/jquery-easing/jquery.easing.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>/assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>/js/demo/datatables-demo.js"></script>

<!-- Include library Moment JS -->
<script src="<?= base_url() ?>/assets/moment/moment.min.js"></script>
<!-- Include library Datepicker Gijgo -->
<script src="<?= base_url() ?>/assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Include file custom.js -->
<script src="<?= base_url() ?>/assets/table/bootstrap-table.css"></script>
<script src="<?= base_url() ?>/assets/table/bootstrap-table.js"></script>


<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

<script>
    $(document).ready(function(){
        setDatePicker("#datepicker")
        setDateRangePicker("#startdate", "#enddate")
    })
</script>

<script>
    $(document).ready(function() {

        //alert('');

        $('#dataTables-example').DataTable({
            responsive: true
        });


        //load data tmp 
        function loadData()
        {
            $("#tampil").load("<?php echo site_url('PeminjamanController/tampil_tmp') ?>");
        }
        loadData();

        //function buat mengkosong form data buku setelah di tambah ke tmp
        function EmptyData()
        {
            $("#kode_buku").val("");
            $("#judul_buku").val("");
            $("#penulis_buku").val("");
        }

        //ambil data anggota berdasarkan nis
        // $("#nis").click(function(){

        $("#kode_member").change(function(){    
            var kode_member = $("#kode_member").val();
            
            $.ajax({
                url:"<?php echo site_url('PeminjamanController/cari_anggota');?>",
                type:"POST",
                data:"kode_member="+kode_member,
                cache:false,
                success:function(html){
                    $("#nama_member").val(html);
                    // document.write(html)
                }
            })
            
        });


        

        //show modal search buku
        $("#cari").click(function(){
            $("#myModal2").modal("show");
            //return false;  biar gk langsung ilang
        })

        //search buku
        $("#caribuku").keyup(function(){
            var caribuku = $('#caribuku').val();

            $.ajax({
                url:"<?php echo site_url('PeminjamanController/cari_buku');?>",
                type:"POST",
                data:"caribuku="+caribuku,
                cache:false,
                success:function(hasil){
                    $("#tampilbuku").html(hasil);
                    
                }
            })
            
        })


        //tambah buku dari modal ke form
        
        // $(".tambah").live("click", function(){
        $('body').on('click', '.tambah', function(){
            
            var kode_buku = $(this).attr("kode_buku");
            var judul_buku     = $(this).attr("judul_buku");
            var penulis_buku = $(this).attr("penulis_buku");
            
            $("#kode_buku").val(kode_buku);
            $("#judul_buku").val(judul_buku);
            $("#penulis_buku").val(penulis_buku);

            $("#myModal2").modal("hide");
            //console.log(kode_buku);
        
        });


        //event keypress cari kode
        $("#kode_buku").keypress(function(){
            
            //13 adalah kode asci buat enter
            if(event.which == 13) {
                var kode_buku = $("#kode_buku").val();

                $.ajax({
                    url:"<?php echo site_url('PeminjamanController/cari_kode_buku');?>",
                    type:"POST",
                    data:"kode_buku="+kode_buku,
                    cache:false,
                    success:function(hasil){
                    //split digunakan untuk memecah string    
                    data = hasil.split("|");
                    if(data==0) {
                        alert("Buku " + kode_buku + " Book Not Found");
                        $("#judul_buku").val("");
                        $("#penulis_buku").val("");
                    }
                    else{
                        $("#judul_buku").val(data[0]);
                        $("#penulis_buku").val(data[1]);
                        $("#tambah_buku").focus();
                    }

                    //console.log(data);
                    }
                })
                
            } 

        }) //end event keypress

        //tambah_buku ke tmp
        $("#tambah_buku").click(function(){
            var id_peminjaman = $("#id_peminjaman").val();
            var kode_buku = $("#kode_buku").val();
            var judul_buku = $("#judul_buku").val();
            var penulis_buku = $("#penulis_buku").val();

            if(kode_buku == "") {
                alert("Kode " + kode_buku + " Masih Kosong ");
                $("#kode_buku").focus();
                return false;
            }
            else if(judul_buku == ""){
                alert("Judul " + judul_buku + " Masih Kosong ");
                return false;
            }
            else{
                $.ajax({
                    url:"<?php echo site_url('PeminjamanController/save_tmp');?>",
                    type:"POST",
                    data:"id_peminjaman"+id_peminjaman+"&kode_buku="+kode_buku+"&judul_buku="+judul_buku+"&penulis_buku="+penulis_buku,
                    cache:false,
                    success:function(hasil){
                        loadData();
                        EmptyData();
                        //alert(hasil);
                    //console.log(data);
                    }
                })
            }
        }) 
        //end tambahbuku 

        // //delete tabel tmp
        $('body').on('click', '.hapus', function(){
            
            //ambil dulu atribute kodenya
            var kode_buku = $(this).attr('kode');
            $.ajax({
                url:"<?php echo site_url('PeminjamanController/hapus_tmp');?>",
                type:"POST",
                data:"kode_buku="+kode_buku,
                cache:false,
                success:function(hasil){
                    // alert(hasil);
                    loadData();
                }
            })
            

        }); //end delete table tmp

        //simpan transaksi 
        //$("#simpan").click(function(){
        $('body').on('click', '#simpan', function(){    
            
            //tampung data dari form buat dikirim 
            var id_peminjaman = $("#id_peminjaman").val();
            // console.log('id_peminjaman', id_peminjaman);
            var tgl_peminjaman   = $("#tgl_peminjaman").val();
            var tgl_pengembalian  = $("#tgl_pengembalian").val();
            var kode_member    = $("#kode_member").val();
            var kode_buku    = $("#kode_buku").val();
            var jumlah_tmp   = parseInt($("#jumlahTmp").val(), 10);

            //cek kode_member jika kosong 
            if(kode_member == "") {
                alert("Pilih Kode Member");
                $("#kode_member").focus();
                return false;
            }
            else if(jumlah_tmp == 0){
                alert("Pilih Buku yang di pinjam");
                return false;
            }
            else{
                $.ajax({
                    url:"<?php echo site_url('PeminjamanController/simpan_transaksi');?>",
                    type:"POST",
                    data:"id_peminjaman="+id_peminjaman+"&tgl_peminjaman="+tgl_peminjaman+"&tgl_pengembalian="+tgl_pengembalian+
                     "&kode_member="+kode_member+"&jumlah_tmp="+jumlah_tmp+"&kode_buku"+kode_buku,
                    // data : {
                    //   id_peminjaman :  id_peminjaman,
                    //   tgl_peminjaman : tgl_peminjaman,
                    //   tgl_pengembalian : tgl_pengembalian,
                    //   kode_member : kode_member,
                    //   jumlah_tmp : jumlah_tmp
                    // },
                    cache:false,
                    success:function(hasil){
                    console.log(hasil);
                    alert("Transaksi Peminjaman Berhasil");
                    
                  location.reload();
                    }
                })
            }
            
        })
    });
</script>

</body>

</html>
