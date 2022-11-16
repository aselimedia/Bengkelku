<?= $this->extend('layout/bengkel/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="col-md-10 p-2 pt-3">

        <h1>Daftar Pesanan Online</h1>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Antrian</th>
                        <th scope="col">Id Pesanan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pesan as $n) : ?>
                        <?php if ($n['status'] == 'in progress') : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $n['antrian']; ?></td>
                                <td><?= $n['id_pesan']; ?></td>
                                <td>
                                    <a href="/pages/detailonline/<?= $n['id_pesan']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>