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
        <form method="POST" action="<?= site_url('penjual/save');?>">
            <div class="form-group" >
                <label for="exampleInputEmail1">Username</label>
                <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Lengkap</label>
                <input name="namaLengkap" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input name="email" type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">No Telepon</label>
                <input name="noTelepon" type="number" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
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