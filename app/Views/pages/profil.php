<?= $this->extend('layout/bengkel/template'); ?>

<?= $this->section('content'); ?>
<div class="profile-bengkel">
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
        <div class="col-md-5">
            <div class="picture">
                <?php if (session()->get('bengkelLoggin')) : ?>
                    <?php if (empty(session()->get('gambar'))) : ?>
                        <img alt="profile" class="img-thumbnail" src="/assets/img/default.png">
                    <?php else : ?>
                        <img alt="profile" style="width: 400px; height: 400px" class="img-thumbnail" src="/assets/img/<?= session()->get('gambar') ?>">
                    <?php endif; ?>
                <?php endif; ?>
                <!-- Button trigger modal -->
                <button style="width: 100%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload">
                    Upload Gambar
                </button>
                <p>Besar file: maksimum 2 Megabytes <br> Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
            </div>
        </div>
        <div class="col-md-7">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Biodata</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td><?= session()->get('nama') ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <?php if (!empty(session()->get('deskripsi'))) : ?>
                            <td><?= session()->get('deskripsi') ?></td>
                        <?php else : ?>
                            <td>-</td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td>Waktu Operasional</td>
                        <?php if (!empty(session()->get('buka'))) : ?>
                            <td><?= session()->get('buka') ?></td>
                        <?php else : ?>
                            <td>-</td>
                        <?php endif; ?>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope="col">Kontak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Email</td>
                        <td><?= session()->get('email'); ?></td>
                    </tr>
                    <tr>
                        <td>Nomor HP</td>
                        <?php if (!empty(session()->get('no_tlp'))) : ?>
                            <td><?= session()->get('no_tlp') ?></td>
                        <?php else : ?>
                            <td>-</td>
                        <?php endif; ?>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alamat</td>
                        <td><?= session()->get('alamat'); ?></td>
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
                        <form action="/bengkel/save" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="nama">Nama Bengkel</label>
                                    <input type="text" class="form-control" id="namadepan" name="nama" value="<?= session()->get('nama'); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Deskripsi</label>
                                    <input type="text" class="form-control" id="namabelakang" name="deskripsi" value="<?= session()->get('deskripsi'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Waktu Buka</label>
                                    <input type="text" class="form-control" id="buka" name="buka" value="<?= session()->get('buka'); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="email" name="email" value="<?= session()->get('email'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nomor HP</label>
                                    <input type="text" class="form-control" id="number" name="number" value="<?= session()->get('no_tlp') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= session()->get('alamat'); ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Diperbarui');" class="btn btn-primary">Update Profil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Upload -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/bengkel/update" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="email" name="email" value="<?= session()->get('email'); ?>">
                    <div class="custom-file">
                        <label for="nama">Gambar 1</label>
                        <input class="form-control" type="file" name="gambar">
                    </div>
                    <div class="custom-file">
                        <label for="nama">Gambar 2</label>
                        <input class="form-control" type="file" name="gambar2">
                    </div>
                    <div class="custom-file">
                        <label for="nama">Gambar 3</label>
                        <input class="form-control" type="file" name="gambar3">
                    </div>
                    <div class="custom-file">
                        <label for="nama">Gambar 4</label>
                        <input class="form-control" type="file" name="gambar4">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="upload" onclick="return confirm('Apakah Anda Yakin Ingin Diperbarui');">Simpan Gambar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>