<?= $this->extend('layout/profileuser'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="profile-setting-container mx-auto">
        <div class="row">
            <?php if (session()->get('success')) : ?>
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-4">
                <div class="picture">
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <?php if (empty(session()->get('picture'))) : ?>
                            <img alt="profile" class="img-thumbnail" src="/assets/img/default.png">
                        <?php else : ?>
                            <img alt="profile" class="img-thumbnail" src="/assets/img/<?= session()->get('picture') ?>">
                        <?php endif; ?>
                    <?php endif; ?>
                    <form action="/update" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="email" name="email" value="<?= session()->get('email'); ?>">
                        <div class="custom-file">
                            <input type="file" name="fileupload">
                        </div>
                        <button class="btn btn-picture" type="submit" name="upload" onclick="return confirm('Apakah Anda Yakin Ingin Diperbarui');">Upload</button>
                    </form>
                    <p>Besar file: maksimum 2 Megabytes <br> Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
                </div>
            </div>
            <div class=" col-md-7">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Ubah Biodata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td><?= session()->get('namadepan') . ' ' . session()->get('namabelakang') ?></td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th scope="col">Ubah Kontak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Email</td>
                            <td><?= session()->get('email'); ?></td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor HP</td>
                            <td><?= session()->get('number'); ?></td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th scope="col">Ubah Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alamat</td>
                            <td><?= session()->get('alamat'); ?></td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Ubah
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModal">Ubah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/save" method="post">
                                    <input type="hidden" name="id">
                                    <div class="form-group">
                                        <label for="nama">Nama Depan</label>
                                        <input type="text" class="form-control" id="namadepan" name="namadepan" value="<?= session()->get('namadepan'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Belakang</label>
                                        <input type="text" class="form-control" id="namabelakang" name="namabelakang" value="<?= session()->get('namabelakang'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="email" name="email" value="<?= session()->get('email'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nomor HP</label>
                                        <input type="number" class="form-control" id="number" name="number" value="<?= session()->get('number'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= session()->get('alamat'); ?>">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Diperbarui');" class="btn btn-primary">Ubah Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>