<?= $this->extend('layout/bengkel/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Penilaian Bengkel</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id Pesanan</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Ulasan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($coment as $c) : ?>
                        <?php if ($c['id_bengkel'] == session()->get('id_bengkel')) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $c['id_pesan']; ?></td>
                                <td>
                                    <?php for ($a = 0; $a < $c['rating']; $a++) : ?>
                                        <span class="fa fa-star star-review" style="color: #ff9d00;"></span>
                                    <?php endfor; ?>
                                </td>
                                <td><?= $c['komentar']; ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>