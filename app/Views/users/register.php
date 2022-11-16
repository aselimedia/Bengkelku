<?= $this->extend('layout/loginregister'); ?>

<?= $this->section('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav">
                <li class="nav-item">
                    <a href="<?= base_url() ?>/" class="nav-link">HOME</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <img src="<?= base_url() ?>/assets/img/bg.jpg" class="img-fluid" alt="gambar" aria-disabled="true">
        </div>
        <div class="col-md-5 modal-content">
            <h3>sign up</h3>
            <form action="/register" method="post" id="form">
                <div class="row">
                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-user icon"></i>
                            <input class="form-control" type="text" name="namadepan" placeholder="Nama Depan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-user icon"></i>
                            <input class="form-control" type="text" name="namabelakang" placeholder="Nama Belakang">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-phone-alt icon"></i>
                            <input class="form-control" type="number" name="number" placeholder="Number Phone">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-map-marker-alt icon"></i>
                            <input class="form-control" type="text" name="alamat" placeholder="Alamat">
                            <input class="form-control" type="hidden" name="is_active" value="0">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-envelope icon"></i>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-lock icon"></i>
                            <input class="form-control" type="password" name="password" placeholder="Password" minlength="8">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-lock icon"></i>
                            <input class="form-control" type="password" name="password2" placeholder="Confirm Password" minlength="8">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn" name="register">SIGN UP</button>
                    </div>
                    <div class="col-md-11 mx-auto">
                        <hr class="mx-auto line">
                        <p class="or">OR</p>
                    </div>
                    <div class="col-md-12">
                        <button type="button" onclick="location.href='/login'" class="btn">SIGN IN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>