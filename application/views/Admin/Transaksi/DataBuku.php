<?php if($buku->num_rows() > 0) { ?>
<br /><br />
<table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Kode Buku</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td>Action</td>
            </tr>
        </thead>
        <?php foreach($buku->result() as $data):?>
        <tr>
            <td><?php echo $data->id_buku;?></td>
            <td><?php echo $data->judul_buku;?></td>
            <td><?php echo $data->penulis_buku;?></td>
            <td><a href="#" class="tambah"
                id_buku="<?php echo $data->id_buku;?>"
                judul_buku="<?php echo $data->judul_buku;?>"
                penulis_buku="<?php echo $data->penulis_buku;?>"><i class="fas fa-plus" aria-hidden="true"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
<?php }else{ ?>
<br />
<strong>Book Not Found</strong>

<?php } ?>
