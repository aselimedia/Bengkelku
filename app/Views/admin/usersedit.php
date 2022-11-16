<?= $this->extend('layout/admin/usersdetail'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2> Form Ubah Data</h2>
            <form action="/admin/editcustomer/<?= $user['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $user['id']; ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Depan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" <?= ($validation->hasError('nama_depan')) ? 'is-invalid' : ''; ?> id="nama_depan" name="nama_depan" autofocus value="<?= (old('nama_depan')) ? old('nama_depan') : $user['nama_depan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_belakang" class="col-sm-2 col-form-label">Nama Belakang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" autofocus value="<?= (old('nama_belakang')) ? old('nama_belakang') : $user['nama_belakang'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="number" class="col-sm-2 col-form-label">No Telpon</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="number" name="number" autofocus value="<?= (old('number')) ? old('number') : $user['number'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="number" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" autofocus value="<?= (old('email')) ? old('email') : $user['email'] ?>">
                        <input type="hidden" class="form-control" name="picture" autofocus value="<?= $user['picture'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" autofocus value="<?= (old('alamat')) ? old('alamat') : $user['alamat'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>