<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/detail.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/font-awesome/css/all.css">
    <title><?= $title; ?></title>
</head>

<body>

    <?= $this->include('layout/navbar'); ?>

    <?= $this->renderSection('content'); ?>
    <footer>
        <div class="footer">
            <div class="row">
                <div class="col-4">
                    <div class="col-12">
                        <b>Bengkelku.id</b>
                    </div>
                    <div class="col-12">
                        <a href="">Tentang Bengkelku.id</a>
                    </div>
                    <div class="col-12">
                        <a href="">Karir</a>
                    </div>
                    <div class="col-12">
                        <a href="">Blog</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12">
                        <b>Layanan Pelanggan</b>
                    </div>
                    <div class="col-12">
                        <a href="">Metode Pembayaran</a>
                    </div>
                    <div class="col-12">
                        <a href="">Hubungi Kami</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12">
                        <b>Bantuan dan Panduan</b>
                    </div>
                    <div class="col-12">
                        <a href="">Bengkelku.id Care</a>
                    </div>
                    <div class="col-12">
                        <a href="">Syarat dan Ketentuan</a>
                    </div>
                    <div class="col-12">
                        <a href="">Kebijakan Privasi</a>
                    </div>
                </div>
                <div class="col-12">
                    <p>Bengkelku.id &copy; 2020, Kelompok 9</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?= base_url() ?>/assets/javascript/detail.js"></script>
    <script defer src="<?= base_url() ?>/assets/font-awesome/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>