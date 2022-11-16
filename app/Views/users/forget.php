<?= $this->extend('layout/loginregister'); ?>

<?= $this->section('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">HOME</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <img src="<?= base_url() ?>/assets/img/bg.jpg" class="img-fluid" alt="gambar">
        </div>
        <div class="col-md-4 modal-content">
            <h3>welcome</h3>
            <form action="/login/forget" method="post">
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
                        <button type="submit" name="forget" class="btn">Forget</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>