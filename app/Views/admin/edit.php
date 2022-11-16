<?= $this->extend('layout/admin/admindetail'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2> Form Ubah Data</h2>
            <form action="/admin/update/<?= $bengkel['id_bengkel']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $bengkel['slug']; ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?> id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $bengkel['nama'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no-telp" class="col-sm-2 col-form-label">No Telpon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" autofocus value="<?= (old('no_telp')) ? old('no_telp') : $bengkel['no_telp'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" autofocus value="<?= (old('alamat')) ? old('alamat') : $bengkel['alamat'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kota" name="kota" autofocus value="<?= (old('kota')) ? old('kota') : $bengkel['kota'] ?>">
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