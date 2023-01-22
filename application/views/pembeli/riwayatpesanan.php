 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pesanan</h1>
<?= ($this->session->flashdata('alert')); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesanan</th>
                        <th>Nama Toko</th>
                        <th>Nama Produk</th>
                        <th>Tujuan</th>
                        <th>Kontak Toko</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($pesanan as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->tglOrder?></td>
                          <td><?= $item->namaToko?></td>
                          <td><?= $item->namaProduk?></td>
                          <td><?= $item->tujuanKirim?></td>
                          <td><?= $item->teleponPenjual?></td>
                          <td><?php if ($item->statusOrder == 'Belum Dibayar') { ?> 
                            <span class='badge badge-danger'>Belum Dibayar</span> 
                            <?php } else if ($item->statusOrder == 'Sudah Dibayar'){ ?> 
                            <span class='badge badge-warning'>Sudah dibayar</span> 
                            <?php } else if ($item->statusOrder == 'Dikirim'){ ?> 
                            <span class='badge badge-warning'>Dikirim</span> 
                            <?php } else if ($item->statusOrder == 'Dibatalkan'){ ?> 
                            <span class='badge badge-danger'>Dibatalkan</span> 
                            <?php } else if ($item->statusOrder == 'Selesai'){ ?> 
                            <span class='badge badge-success'>Selesai</span> 
                            <?php } ?></td>
                         
                          
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