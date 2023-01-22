<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">UMKM GO DIGITAL</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Saatnya dukung usaha lokal untuk maju !</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($produk as $item) : ?>
                <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?= $item->namaKategori ?></div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url() ?>assets/img/fotoproduk/<?= $item->fotoProduk ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a href="#"class="linkproduk"><?= $item->namaProduk ?></a>
                                    <!-- Product price-->
                                </div>
                                <div class="hargaproduk">
                                    <span class="hargaproduk">Rp. <?= $item->hargaProduk ?></span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                 <div class="text-center">
                                 <a href="<?php echo site_url ('beranda/checkout/'.$item->idProduk)?>" type="button" class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Beli Sekarang
                                </a></div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pemsanan <?= $item->namaProduk ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="POST" action="<?= site_url('beranda/insert_checkout');?>" >
                                        <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                            <th>Nama Produk</th>
                                            <td>:</td>
                                            <td><?=$item->namaProduk?></td>
                                            </tr>

                                            <tr>
                                            <th>Harga Produk</th>
                                            <td>:</td>
                                            <td><?=$item->hargaProduk?></td>
                                            </tr>

                                            <tr>
                                            <th>Nama Toko</th>
                                            <td>:</td>
                                            <td><?=$item->namaToko?></td>
                                            </tr>

                                            
                                            <tr>
                                            <th>Nama Pemesan</th>
                                            <td>:</td>
                                            <td><?= $session_user->usernamePembeli?></td>
                                            </tr>
                                           


                                        </tbody>
                                        </table>
                                            <div class="mb-3">
                                                <!--Input Hidden-->
                                                <input type="hidden" name="idPembeli" value="<?php echo $session_user->idPembeli; ?>">
                                                <input type="hidden" name="idToko" value="<?php echo $item->idToko; ?>">
                                                <input type="hidden" name="idProduk" value="<?php echo $item->idProduk; ?>">
                                                <input type="hidden" name="hargaProduk" value="<?php echo $item->hargaProduk; ?>">

                                                <label for="exampleInputPassword1" class="form-label">Jumlah Produk</label>
                                                <input name="jumlah" type="number" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1">Tujuan Kirim</label>
                                                <select name="idOngkir" class="form-control" id="exampleFormControlSelect1">
                                                    <?php foreach ($ongkir as $item) : ?>
                                                    <option value="<?= $item->idOngkir; ?>"><?= $item->tujuanKirim; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Tanggal Pemesanan</label>
                                                <input name="tglOrder" type="date" class="form-control" id="exampleInputPassword1" >
                                            </div>
                                            <button type="submit" class="btn btn-primary">Pesan</button>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>