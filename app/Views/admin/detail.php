<?= $this->extend('layout/admin/admindetail'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="padding:20px;">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <h3>Detail Bengkel</h3>
                    </div>
                    <div class="col-md-4">
                        <img src="/assets/img/<?= $bengkel['gambar']; ?>" class="card-img" alt="profile bengkel" style="width: 350px; height: 350px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $bengkel['nama']; ?></h5>
                            <p class="card-text"><?= $bengkel['no_telp']; ?></p>
                            <p class="card-text"><?= $bengkel['alamat']; ?></p>
                            <p class="card-text"><?= $bengkel['kota']; ?></p>
                            <p class="card-text"><?= $bengkel['buka']; ?></p>
                            <p class="card-text"><small class="text-muted">created at <?= $bengkel['created_at']; ?></small></p>
                            <p class="card-text"><small class="text-muted">updated at <?= $bengkel['updated_at']; ?></small></p>

                            <a href="/admin/bengkel/edit/<?= $bengkel['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/admin/bengkel/delete/<?= $bengkel['id_bengkel']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus <?= $bengkel['nama']; ?>');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>