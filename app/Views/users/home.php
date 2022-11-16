<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="content">
        <?php if (session()->get('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->get('success'); ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-2">
                <div class="profile">
                    <div class="row">
                        <?php if (session()->get('isLoggedIn')) : ?>
                            <div class="col-md-12">
                                <h6>profile</h6>
                            </div>
                            <div class="col-md-12">
                                <div class="profile-img">
                                    <?php if (empty(session()->get('picture'))) : ?>
                                        <img style="border-radius: 200px !important; width: 80px; height: 80px" src="<?= base_url() ?>/assets/img/default.png">
                                    <?php else : ?>
                                        <img style="border-radius: 200px !important; width: 80px; height: 80px" src="<?= base_url() ?>/assets/img/<?= session()->get('picture') ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <p><?= session()->get('namadepan') ?></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="/logout" class="nav-link logout">LOGOUT</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <button class="btn setting" onclick="location.href='/profile'" type="button">
                                    <i class="fas fa-user-cog"></i>
                                    Setting
                                </button>
                            </div>
                        <?php else : ?>
                            <div class="col-md-12">
                                <button class="btn setting" type="button" disabled>
                                    <i class="fas fa-user-cog"></i>
                                    Setting
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= base_url() ?>/assets/img/banner1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= base_url() ?>/assets/img/banner2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= base_url() ?>/assets/img/banner3.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row">
                    <?php foreach ($bengkel as $b) : ?>
                        <div class="col-md-2">
                            <a href="<?= base_url() ?>/home/detail/<?= $b['slug']; ?>" class="link">
                                <div class="card">
                                    <img src="<?= base_url() ?>/assets/img/<?= $b['gambar']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-label"><?= $b['nama']; ?></h6>
                                        <p class="card-text">Kota <?= $b['kota']; ?></p>
                                        <!-- <div class="row">
                                            </?php foreach ($rating as $r) : ?>
                                                <div class="col-2">
                                                    </?php if ($r['rating'] == 0) : ?>
                                                        <span class="fa fa-star star-seller" style="color: #d4d4d4;"></span>
                                                    </?php else : ?>
                                                        <span class="fa fa-star checked star-seller"></span>
                                                    </?php endif; ?>
                                                </div>
                                                <div class="col-8" style="margin-top: 3px;">
                                                    <p><strong></?= number_format($r['rating'], 1); ?></strong></p>
                                                </div>
                                            </?php endforeach; ?>
                                        </div> -->
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-12">
                        <?= $pager->links('bengkel', 'pag_custom'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>