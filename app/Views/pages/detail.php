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
                                Nama
                            </td>
                            <td>
                                : <?= $pesanan['nama']; ?>
                            </td>
                        </tr>
                        <p class="card-text">
                            <tr>
                                <td>
                                    Alamat
                                </td>
                                <td>
                                    : <?= $pesanan['alamat']; ?><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal
                                </td>
                                <td>
                                    : <?= $pesanan['date']; ?>
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