 <!-- Product section-->
 <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= base_url() ?>assets/img/fotoproduk/<?= $produk->fotoProduk ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><?= $produk->namaToko ?></div>
                        <h1 class="display-5 fw-bolder"><?= $produk->namaProduk ?></h1>
                        <div class="fs-5 mb-5">
                            <span>Rp. <?= $produk->hargaProduk ?></span>
                        </div>
                        <p class="lead"><?= $produk->deskripsiProduk ?></p>
                        <div class="d-flex">
                            <a href="<?php echo site_url('beranda')?>" class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi bi-arrow-return-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4" style="text-align: center">Form Pembelian</h2>
                
                    <form method="POST" action="<?= site_url('beranda/insert_checkout');?>">
                    <div class="form-group">

                        <input type="hidden" name="idPembeli" value="<?php echo $session_user->idPembeli; ?>">
                        <input type="hidden" name="idToko" value="<?php echo $produk->idToko; ?>">
                        <input type="hidden" name="idProduk" value="<?php echo $produk->idProduk; ?>">
                        <input type="hidden" name="hargaProduk" value="<?php echo $produk->hargaProduk; ?>">

                        <label for="exampleFormControlInput1">Nama Pemesan</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $session_user->usernamePembeli?>" readonly>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Jumlah Produk</label>
                        <input name="jumlah" type="number" class="form-control" id="exampleInputPassword1" required>
                    </div><br>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Kota Tujuan</label></label>
                        <select name="idOngkir" class="form-control" id="exampleFormControlSelect1" required>
                            <?php foreach ($ongkir as $item) : ?>
                             <option value="<?= $item->idOngkir; ?>"><?= $item->tujuanKirim; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Tanggal Pemesanan</label>
                             <input name="tglOrder" type="date" class="form-control" id="exampleInputPassword1" required>
                                </div>
                    <button type="submit" class="btn btn-outline-dark flex-shrink-0">Pesan</button>
                    </form>
                </div>
            </div>
        </section>