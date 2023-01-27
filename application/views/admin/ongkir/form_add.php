 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Penjual</h1><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Penjual</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <?= ($this->session->flashdata('alert')); ?>
        <form method="POST" action="<?= site_url('ongkir/save');?>">
            <div class="form-group" >
                <label for="exampleInputEmail1">Tujuan Kirim</label>
                <input name="tujuanKirim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Harga Kirim</label>
                <input name="hargaKirim" type="number" class="form-control" id="exampleInputPassword1" required>
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