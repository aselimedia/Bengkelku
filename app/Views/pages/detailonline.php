<?= $this->extend('layout/bengkel/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Rincian Pesanan</h5>
                    <table>
                        <tr>
                            <td>
                                Id Pesanan
                            </td>
                            <td>
                                : <?= $pesan['id_pesan']; ?>
                            </td>
                        </tr>
                        <p class="card-text">
                            <tr>
                                <td>
                                    No. Antrian
                                </td>
                                <td>
                                    : <?= $pesan['antrian']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Id
                                </td>
                                <td>
                                    : <?= $pesan['id']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Status
                                </td>
                                <td>
                                    : <?= $pesan['status']; ?>
                                </td>
                            </tr>
                        </p>
                        <tr>
                            <td>
                                <a href="/pages/pesanan" class="btn btn-secondary">Back</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>