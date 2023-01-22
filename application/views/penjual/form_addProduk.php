 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Produk</h1><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Produk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <?= ($this->session->flashdata('alert')); ?>
        <form method="POST" action="<?= site_url('profilpenjual/saveaddproduk');?>"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Produk</label>
                <input name="namaProduk" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Nama Toko</label>
                <select name="idToko" class="form-control" id="exampleFormControlSelect1">
                <?php foreach ($gettokobypenjual as $toko) : ?>
                <option value ="<?= $toko->idToko?>"><?= $toko->namaToko?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Nama Kategori</label>
                <select name="idKategori" class="form-control" id="exampleFormControlSelect1">
                <?php foreach ($kategori as $key) : ?>
                <option value ="<?= $key->idKategori?>"><?= $key->namaKategori?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Harga Produk</label>
                <input name="hargaProduk" type="number" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Deskripsi</label>
                <input name="deskripsiProduk" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Berat Produk</label>
                <input name="beratProduk" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">stokProduk</label>
                <input name="stokProduk" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">fotoProduk</label>
                <input name="fotoproduk" type="file" class="form-control" id="exampleInputPassword1" required>
            </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->