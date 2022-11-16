<?= $this->extend('layout/bengkel/loginregister'); ?>

<?= $this->section('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">Bengkelku</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <img src="/assets/img/bg-bengkel.jpg" class="img-fluid" alt="gambar">
        </div>
        <div class="col-md-4 modal-content">
            <h3>welcome</h3>
            <form action="/pages/login" method="post">
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('danger')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->get('danger'); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-envelope icon"></i>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-lock icon"></i>
                            <input class="form-control" type="password" name="password" placeholder="Password" minlength="8">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="login" class="btn">SIGN IN</button>
                    </div>
                    <div class="col-md-12 forget">
                        <a href="/bengkel/login/forget">Forgot your password?</a>
                    </div>
                    <div class="col-md-11 mx-auto">
                        <hr class="mx-auto line">
                        <p class="or">OR</p>
                    </div>
                    <div class="col-md-12">
                        <button type="button" onclick="location.href='/bengkel/register'" class="btn">SIGN UP</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>