 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Bank</h1><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Bank</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <form method="POST" action="<?= site_url('Bank/edit');?>">
                <input type="hidden" name="id" value="<?= $bank->idBank ;?>">
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputEmail3" name="namaBank" placeholder="Nama Bank" value="<?= $bank->namaBank; ?>" >
                      </div>
                    </div>  
                  </div>
                  <div class="" style="float: right">
                    <a href="<?php echo base_url('Bank/index'); ?>" class="btn btn-primary ">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
              
               </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->