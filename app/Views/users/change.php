<?= $this->extend('layout/loginregister'); ?>

<?= $this->section('content'); ?>
<style>
    .content {
        width: 30%;
    }

    @media only screen and (max-width: 800px) {
        .content {
            width: 50%;
        }
    }

    @media only screen and (max-width: 500px) {
        .content {
            width: 70%;
        }
    }

    @media only screen and (max-width: 330px) {
        .content {
            width: 100%;
        }
    }
</style>
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
        <div class="col-md-12 modal-content">
            <h3>change password</h3>
            <form action="/forget/change?vkey=<?= $vkey; ?>" method="post" id="form">
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
                            <i class="fas fa-lock icon"></i>
                            <input class="form-control" type="password" name="password" placeholder="Password" minlength="8">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-lock icon"></i>
                            <input class="form-control" type="password" name="password2" placeholder="Confirm Password" minlength="8">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn" name="register">Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>