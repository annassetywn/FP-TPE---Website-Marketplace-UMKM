 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Penjual</h1>
<?= ($this->session->flashdata('alert')); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penjual</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>E-mail</th>
                        <th>Telepon</th>
                        <th>Status Aktif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($penjual as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->usernamePenjual; ?></td>
                          <td><?= $item->namalengkapPenjual; ?></td>
                          <td><?= $item->emailPenjual; ?></td>
                          <td><?= $item->teleponPenjual; ?></td>
                          <td><?php if ($item->statusAktif == 'Aktif') { ?> 
                            <span class='badge badge-success'>Aktif</span> 
                            <?php } else { ?> 
                            <span class='badge badge-danger'>Tidak Aktif</span> 
                            <?php } ?></td>
                            <td>
                          <?php if ($item->statusAktif == 'Nonaktif') : ?>
                              <a class="btn btn-success" href="<?= site_url('penjual/status_penjual/' . $item->idPenjual); ?>"> Aktifkan </a>
                          <?php else : ?>
                              <a class="btn btn-danger" href="<?= site_url('penjual/status_penjual/' . $item->idPenjual); ?>"> Non Aktifkan </a>
                          <?php endif ?>
                          </td>
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