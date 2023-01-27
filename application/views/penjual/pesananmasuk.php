 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Pesanan Masuk</h1>

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
                        <th>Nama Pembeli</th>
                        <th>Telepon Pembeli</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Alamat Pembeli</th>
                        <th>Total Bayar</th>
                        <th>Bukti Bayar</th>
                        <th>Status Pesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($kelolapesananmasuk as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->tglOrder; ?></td>
                          <td><?= $item->namalengkapPembeli; ?></td>
                          <td><?= $item->teleponPembeli; ?></td>
                          <td><?= $item->namaProduk; ?></td>
                          <td><?= $item->jumlah; ?></td>
                          <td><?= $item->alamatPembeli; ?></td>
                          <td><?= $item->harga*$item->jumlah+$item->hargaKirim ; ?></td>
                          <td><a href="<?= base_url() ?>assets/img/buktibayar/<?= $item->buktiBayar ?>"><?= $item->buktiBayar ?></td>
                          <td><?= $item->statusOrder; ?></td>
                          <td><a href="<?= site_url('profilpenjual/editstatuspesanan/'.$item->idOrder);?>" class=" btn btn-primary">Ubah Status Pesanan</a></td>
                        </tr><?php }
                        }else{?>
                          <tr>
                            <td colspan="10" align="center"><h4>Data Kosong</h4></td>
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