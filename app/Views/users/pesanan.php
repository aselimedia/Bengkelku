<?= $this->extend('layout/profileuser'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="row" style="padding: 0; margin: 0;">
        <div class="col-md-12">
            <div class="container">
                <h5 style="text-align: center; margin-bottom: 30px;">DETAIL PEMESANAN</h5>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" value="<?= session()->get('namadepan') . ' ' . session()->get('namabelakang') ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <input class="form-control" type="text" value="<?= session()->get('alamat') ?>" disabled>
                    </div>
                    <div class=" col-md-11 mx-auto" style="margin-top: 30px;">
                        <hr class="mx-auto line">
                        <p class="or">MELAKUKAN PEMESANAN</p>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Bengkel</label>
                        <input class="form-control" type="text" value="<?= $bengkel['nama']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat Bengkel</label>
                        <textarea class="form-control" cols="30" disabled><?= $bengkel['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">No Antrian</label>
                        <?php foreach ($pesan as $p) : ?>
                            <?php if (session()->get('id') == $p['id'] && $p['status'] == 'in progress') : ?>
                                <input class="form-control" type="text" value="<?= $p['antrian'] ?>" disabled>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-primary" style="margin-top: 10px; width: 100%;" data-toggle="modal" data-target="#exampleModal">
                        Selesai
                    </button>
                    <button type="button" class="btn btn-danger" style="margin-top: 10px; width: 100%;" data-toggle="modal" data-target="#batal">
                        Batal
                    </button>
                    <hr>
                    <a href="/home/detail/<?= $bengkel['slug'] ?>">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Modal Selesai -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selesai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Service Anda Telah Selesai?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php foreach ($pesan as $p) : ?>
                    <?php if (session()->get('id') == $p['id'] && $p['status'] == 'in progress') : ?>
                        <a href="/selesai/<?= $p['id_pesan'] ?>" class="btn btn-primary">Selesai</a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Batal -->
<div class="modal fade" id="batal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selesai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda Ingin Membatalkan Service Anda?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/canceled/<?= $p['id_pesan'] ?>" class="btn btn-primary">Selesai</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>