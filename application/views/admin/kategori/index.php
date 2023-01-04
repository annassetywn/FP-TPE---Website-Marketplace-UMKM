 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Kategori</h1>
<a href="<?php echo base_url ('kategori/add')?>" class="btn btn-sm btn-primary"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori</a><br>
<br>
<?= ($this->session->flashdata('alert')); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($kategori as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namaKategori; ?></td>
                          <td><a href="<?= site_url('kategori/getid/'.$item->idKategori);?>" class=" btn btn-warning">Edit</a>
                          <a href="<?= site_url('kategori/delete_hapus/'.$item->idKategori);?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data kategori yang anda pilih ini?')">Hapus</a></td>
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