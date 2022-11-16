<?= $this->extend('layout/admin/usersdetail'); ?>

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
                        <img src="/assets/img/<?= $user['picture']; ?>" class="card-img" alt="profile users" style="width: 350px; height: 350px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama Depan: <?= $user['nama_depan']; ?></h5>
                            <p class="card-text">Nama Belakang<?= $user['nama_belakang']; ?></p>
                            <p class="card-text">No Telpon<?= $user['number']; ?></p>
                            <p class="card-text">Alamat: <?= $user['alamat']; ?></p>
                            <p class="card-text">email<?= $user['email']; ?></p>
                            <p class="card-text"><small class="text-muted">created at <?= $user['created_at']; ?></small></p>
                            <p class="card-text"><small class="text-muted">updated at <?= $user['updated_at']; ?></small></p>

                            <a href="/admin/customer/edit/<?= $user['id']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/admin/customer/delete/<?= $user['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus <?= $user['nama_depan'] . ' ' . $user['nama_belakang'] ?>');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>