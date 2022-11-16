<?= $this->extend('layout/review'); ?>

<?= $this->section('content'); ?>

<main>
    <div class="container col-md-6">
        <?php if (isset($validation)) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="my-auto" align="center">
            <ul class="nav" style="margin-top: 20px; margin-bottom: 20px;">
                <li class="star"><i class="fa fa-star fa-2x" data-index="0"></i></li>
                <li class="star"><i class="fa fa-star fa-2x" data-index="1"></i></li>
                <li class="star"><i class="fa fa-star fa-2x" data-index="2"></i></li>
                <li class="star"><i class="fa fa-star fa-2x" data-index="3"></i></li>
                <li class="star"><i class="fa fa-star fa-2x" data-index="4"></i></li>
            </ul>
        </div>
        <form action="/ulasan" method="post">
            <div class="form-group">
                <input class="form-control" type="text" value="<?= $bengkel['nama']; ?>" disabled>
            </div>
            <div class="form-group">
                <?php foreach ($pesan as $p) : ?>
                    <input class="form-control" type="hidden" name="idpesan" value="<?= $p['id_pesan'] ?>">
                <?php endforeach; ?>
                <textarea style="visibility: hidden; position: absolute;" name="rating" id="rating" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="ulasan" rows="3" placeholder="Ulasan Anda"></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="location.href='/home/detail/<?= $bengkel['slug']; ?>'">Kembali</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</main>

<?= $this->endSection(); ?>