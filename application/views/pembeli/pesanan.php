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
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Tujuan</th>
                        <th>Sub Total</th>
                        <th>Ongkir</th>
                        <th>Total Harus Bayar</th>
                        <th>Bukti Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($pesanan as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namaProduk?></td>
                          <td><?= $item->jumlah?></td>
                          <td><?= $item->tujuanKirim?></td>
                          <td><?= $item->hargaProduk*$item->jumlah?></td>
                          <td><?= $item->hargaKirim?></td>
                          <td><?= $item->hargaProduk*$item->jumlah+$item->hargaKirim?></td>
                          <td><a href="<?= base_url() ?>assets/img/buktibayar/<?= $item->buktiBayar ?>"><?= $item->buktiBayar ?></td>
                            <td>
                          <?php if ($item->statusOrder == 'Belum Dibayar') : ?>
                              <a class="btn btn-success" href="<?= site_url('profilpembeli/buktibayar/' . $item->idDetailOrder); ?>"> Upload bukti bayar </a>
                          <?php else : ?>
                              <a href="<?= site_url('profilpembeli/riwayatpesanan')?>" class="btn btn-danger"> Lihat riwayat pesanan </a>
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