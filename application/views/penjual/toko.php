 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Toko</h1>
<a href="<?php echo base_url ('profilpenjual/addToko')?>" class="btn btn-sm btn-primary"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Toko</a><br>
<br>
<?= ($this->session->flashdata('alert')); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Toko</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Logo</th>
                        <th>Rekening</th>
                    
                    </tr>
                </thead>
                <tbody>
                <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($kelolatoko as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namaToko; ?></td>
                          <td><?= $item->deskripsi; ?></td>
                          <td><?= $item->alamatToko; ?></td>
                          <td><a href="<?= base_url() ?>assets/img/logotoko/<?= $item->logoToko ?>"><?= $item->logoToko ?></td>
                          <td><?= $item->namaBank?> - <?= $item->noRekening?></td>
                         
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