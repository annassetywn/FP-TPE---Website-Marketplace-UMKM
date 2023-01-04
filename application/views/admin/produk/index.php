 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Produk</h1>
<?= ($this->session->flashdata('alert')); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Foto Produk</th></th>
                        <th>Nama Toko</th>
                        <th>Nama Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($produk as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namaProduk; ?></td>
                          <td><?= $item->deskripsiProduk; ?></td>
                          <td><?= $item->fotoProduk; ?></td>
                          <td><?= $item->namaToko; ?></td>
                          <td><?= $item->namalengkapPenjual; ?></td>
                          <td>
                          <a href="<?= site_url('produk/delete_hapus/'.$item->idProduk);?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data kategori yang anda pilih ini?')">Hapus</a></td>
                        </tr><?php }
                        }else{?>
                          <tr>
                            <td colspan="7" align="center"><h4>Data Kosong</h4></td>
                          </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->