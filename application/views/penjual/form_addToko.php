 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Toko</h1><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Toko</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <?= ($this->session->flashdata('alert')); ?>
        <form method="POST" action="<?= site_url('profilpenjual/saveaddtoko');?>"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Toko</label>
                <input name="idPenjual" type="hidden" class="form-control" value="<?= $session_user->idPenjual?>" required>
                <input name="namaToko" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Deskripsi</label>
                <input name="deskripsi" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Nama Bank</label>
                <select name="idBank" class="form-control" id="exampleFormControlSelect1">
                <?php foreach ($bank as $key) : ?>
                <option value ="<?= $key->idBank?>"><?= $key->namaBank?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">No Rekening</label>
                <input name="noRekening" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Rekening</label>
                <input name="namaRekening" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat Toko</label>
                <input name="alamatToko" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Logo Toko</label>
                <input name="logotoko" type="file" class="form-control" id="exampleInputPassword1" required>
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