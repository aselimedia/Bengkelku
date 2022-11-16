<?= $this->extend('layout/admin/profileuser'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="row" style="padding: 0; margin: 0;">
        <div class="col-md-12">
            <div class="container">
                <h5 style="text-align: center; margin-bottom: 30px;">LOGIN ADMIN</h5>
                <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="/admin/login" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="nama" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="nama">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px; width: 100%;">Login</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>