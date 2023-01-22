<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lakukan Pembayaran</h1>
</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah harus dibayar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $pembayaran->harga*$pembayaran->jumlah+$pembayaran->hargaKirim?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            No Rekening</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $pembayaran->noRekening ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Atas Nama</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pembayaran->namaRekening ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Nama Bank</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pembayaran->namaBank ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<form method="POST" action="<?= site_url('profilpembeli/saveuploadbuktibayar');?>"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload Bukti Pembayaran</label>
    <input name="buktibayar" type="file" class="form-control-file" id="exampleFormControlFile1">
    <input name="idDetailOrder" type="hidden" class="form-control-file" value="<?=$pembayaran->idDetailOrder?>">
  </div>
  <button type="submit" class="btn btn-primary">Upload</button>
</form>