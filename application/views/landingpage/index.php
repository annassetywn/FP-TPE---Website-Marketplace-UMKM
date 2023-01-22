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
                                   <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Beli Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>