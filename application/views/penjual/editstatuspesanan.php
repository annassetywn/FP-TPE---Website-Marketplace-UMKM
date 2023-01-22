 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Status Pesanan</h1><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Status Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <form method="POST" action="<?= site_url('profilpenjual/savestatuspesanan');?>">
                    <div class="form-group">
                    <input name="idOrder" type="hidden" class="form-control" id="exampleInputPassword1" value="<?= $status->idOrder ?>" required>
                    <label for="">Status Terakhir</label>
                    <input name="status" type="disabled" class="form-control" id="exampleInputPassword1" value="<?= $status->statusOrder ?>" readonly>
                    <br>
                    
                    <select name="statuspesanan" class="form-control" id="exampleFormControlSelect1">
                    <option>Belum Dibayar</option>
                    <option>Sudah Dibayar</option>
                    <option>Dikirim</option>
                    <option>Dibatalkan</option>
                    <option>Selesai</option>
                    </select>
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