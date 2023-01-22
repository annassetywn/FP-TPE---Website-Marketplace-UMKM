 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Produk</h1>
<a href="<?php echo base_url ('profilpenjual/addProduk')?>" class="btn btn-sm btn-primary"><i
            class="fas fa-plus fa-sm text-white-50"></i>Tambah Produk</a><br>
<br>
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
                        <th>Nama Toko</th>
                        <th>Nama Kategori</th>
                        <th>Harga Produk</th>
                        <th>Deskripsi</th>
                        <th>Berat Produk</th>
                        <th>Stok Produk</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($kelolaproduk as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namaProduk; ?></td>
                          <td><?= $item->namaToko; ?></td>
                          <td><?= $item->namaKategori; ?></td>
                          <td><?= $item->hargaProduk; ?></td>
                          <td><?= $item->deskripsiProduk; ?></td>
                          <td><?= $item->beratProduk; ?></td>
                          <td><?= $item->stokProduk; ?></td>
                          <td><a href="<?= base_url() ?>assets/img/fotoproduk/<?= $item->fotoProduk ?>"><?= $item->fotoProduk ?></td>
                          <td><a href="<?= site_url('profilpenjual/editproduk/'.$item->idProduk);?>" class=" btn btn-warning">Edit</a>
                          <a href="<?= site_url('profilpenjual/hapusproduk/'.$item->idProduk);?>" class=" btn btn-danger">Hapus</a></td>
                        </tr><?php }
                        }else{?>
                          <tr>
                            <td colspan="6" align="center"><h4>Data Kosong</h4></td>
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