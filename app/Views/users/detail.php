<?= $this->extend('layout/detail'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="content">
        <div class="detail-home">
            <div class="row">
                <div class="col-md-4">
                    <div class="img-detail">
                        <div id="imgDisplay" style="width: 100%; height: 342.5px;">
                            <img src="<?= base_url() ?>/assets/img/<?= $bengkel['gambar'] ?>" alt="image" class="thumbnail">
                        </div>
                        <div class="img-bottom">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?= base_url() ?>/assets/img/<?= $bengkel['gambar'] ?>" onclick="changeImg(this)" alt="image" class="thumbnail">
                                </div>
                                <div class="col-3">
                                    <?php if ($bengkel['gambar2'] !== null) : ?>
                                        <img src="<?= base_url() ?>/assets/img/<?= $bengkel['gambar2'] ?>" onclick="changeImg(this)" alt="image" class="thumbnail">
                                    <?php endif; ?>
                                </div>
                                <div class=" col-3">
                                    <?php if ($bengkel['gambar3'] !== null) : ?>
                                        <img src="<?= base_url() ?>/assets/img/<?= $bengkel['gambar3'] ?>" onclick="changeImg(this)" alt="image" class="thumbnail">
                                    <?php endif; ?>
                                </div>
                                <div class=" col-3">
                                    <?php if ($bengkel['gambar4'] !== null) : ?>
                                        <img src="<?= base_url() ?>/assets/img/<?= $bengkel['gambar4'] ?>" onclick="changeImg(this)" alt="image" class="thumbnail">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-md-7">
                    <div class="col-md-12">
                        <h5><?= $bengkel['nama']; ?></h5>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <?php foreach ($rating as $r) : ?>
                                <div class="col-1">
                                    <?php if ($r['rating'] == 0) : ?>
                                        <span class="fa fa-star star-seller fa-2x" style="color: #d4d4d4;"></span>
                                    <?php else : ?>
                                        <span class="fa fa-star checked star-seller fa-2x"></span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-11" style="margin-top: 3px;">
                                    <h4><strong><?= number_format($r['rating'], 1); ?></strong></h4>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h5>Buka</h5>
                        <p><?= $bengkel['buka']; ?></p>
                        <h5>Lokasi</h5>
                        <p><?= $bengkel['alamat']; ?></p>
                        <!-- <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 100%; width: 80%;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.3369368829694!2d112.63327291487111!3d-7.964088694263863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62833a8a51eb1%3A0x6236badc9448d6fc!2sSumber%20Urip%20Autoservice!5e0!3m2!1sen!2sus!4v1602916157587!5m2!1sen!2sus" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="line"></div>
                    <ul class="nav nav-center">
                        <li><a href="#deskripsi">Deskripsi</a></li>
                        <li><a href="#ulasan">Ulasan</a></li>
                    </ul>
                    <div class="line"></div>
                </div>
                <div class="col-md-12" id="deskripsi">
                    <h5>Deskripsi</h5>
                    <p><?= $bengkel['deskripsi']; ?></p>
                    <div class="line"></div>
                </div>
                <div class="col-md-12" id="ulasan">
                    <h5>Semua Ulasan</h5>
                    <div class="buyer-reviews">
                        <div class="row">
                            <!-- Review 1 -->
                            <?php if (empty($review)) : ?>
                                <div class="col-md-12">
                                    <p style="text-align: center; margin-top: 50px; margin-bottom: 50px"><strong>Tidak Ada Ulasan</strong></p>
                                </div>
                            <?php endif; ?>
                            <?php foreach ($review as $r) : ?>
                                <?php
                                $tanggal1 = new DateTime($r['tgl']);
                                $tanggal2 = new DateTime();

                                $perbedaan = $tanggal2->diff($tanggal1)->format("%a") . ' Hari Yang Lalu';
                                ?>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <?php if (empty($r['picture'])) : ?>
                                                <img src="<?= base_url() ?>/assets/img/default.png" alt="profile" class="ulasan-profile">
                                            <?php else : ?>
                                                <img src="<?= base_url() ?>/assets/img/<?= $r['picture']; ?>" alt="profile" class="ulasan-profile">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-9">
                                            <div class="name-date my-auto">
                                                <h6><?= $r['nama_depan']; ?></h6>
                                                <p><?= $perbedaan; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php for ($i = 0; $i < $r['rating']; $i++) : ?>
                                                <span class="fa fa-star checked star-review"></span>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="col-12">
                                            <p><?= $r['komentar']; ?></p>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <section class="message">
                        <button type="button" class="btn pesan">
                            <i class="fas fa-comment-dots"></i>
                        </button>
                    </section>
                    <section class="navbar-bottom fixed-bottom">
                        <ul class="nav float-right">
                            <?php if (session()->get('isLoggedIn')) : ?>
                                <li class="order"><a data-toggle="modal" data-target="#exampleModal">Pesan</a></li>
                            <?php endif; ?>
                            <li class="check-queue"><a data-toggle="modal" data-target="#antrian">Cek Antrian</a></li>
                        </ul>
                        <?php foreach ($pesan as $p) : ?>
                            <?php if (empty($p['antrian'])) : ?>
                                <ul class="nav"></ul>
                            <?php else : ?>
                                <ul class="nav">
                                    <?php if (session()->get('id') == $p['id']) : ?>
                                        <?php if ($p['status'] == 'completed' && $p['antrian'] == 'selesai') : ?>
                                            <li class="check-queue"><a href="<?= base_url() ?>/home/review/<?= $bengkel['slug']; ?>">Review</a></li>
                                        <?php elseif ($p['status'] == 'in progress') : ?>
                                            <li class="check-queue"><a href="<?= base_url() ?>/home/review/<?= $bengkel['slug']; ?>">Review</a></li>
                                            <li class="order">
                                                <a href="<?= base_url() ?>/home/pemesanan/<?= $bengkel['slug'] ?>">No Antrian : <strong><?= $p['antrian']; ?></strong></a>
                                            </li>
                                        <?php else : ?>
                                            <ul class="nav"></ul>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </section>
                </div>
            </div>
        </div>
</main>

<!-- Pesan -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan Service Sekarang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/pesan" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <p style="text-align: center; font-size: 17px">Yakin Ingin Memesan</p>
                    </div>
                    <input type="hidden" name="idbengkel" value="<?= $bengkel['id_bengkel']; ?>">
                    <input type="hidden" name="status" value="in progress">
                    <input type="hidden" name="iduser" value="<?= session()->get('id') ?>">
                    <?php foreach ($cek as $c) : ?>
                        <input type="hidden" name="antrian" value="<?= $c['antrian']; ?>">
                    <?php endforeach; ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Antrian -->
<div class="modal fade" id="antrian" tabindex="-2" aria-labelledby="antrian" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="antrianLabel">Cek Antrian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <?php foreach ($cek as $c) : ?>
                        <?php if (($c['antrian']) < 1) : ?>
                            <p style="text-align: center; font-size: 17px">Tidak Terdapat Antrian</p>
                        <?php else : ?>
                            <p style="text-align: center; font-size: 17px">Terdapat <?= $c['antrian']; ?> antrian saat ini</p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>