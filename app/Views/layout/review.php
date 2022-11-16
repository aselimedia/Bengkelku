<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/detail.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/font-awesome/css/all.css">
    <title><?= $title; ?></title>
    <style>
        .star {
            color: #d4d4d4;
        }

        .over {
            color: #f7c56a;
        }

        .fix {
            color: #ffa600;
        }
    </style>
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
    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        const stars = document.querySelectorAll(".star");
        const rating = document.getElementById("rating");

        for (let i = 0; i < stars.length; i++) {
            stars[i].starValue = (i + 1);
            ["mouseover", "mouseout", "click"].forEach(function(e) {
                stars[i].addEventListener(e, starRate);
            })
        }

        function starRate(e) {
            let type = e.type;
            let starValue = this.starValue;
            if (type == "click") {
                if (starValue > 0) {
                    rating.innerHTML = starValue;
                }
            }

            stars.forEach(function(ele, ind) {
                if (type == "click") {
                    if (ind < starValue) {
                        ele.classList.add("fix");
                    } else {
                        ele.classList.remove("fix");
                    }
                }

                if (type == "mouseover") {
                    if (ind < starValue) {
                        ele.classList.add("over");
                    } else {
                        ele.classList.remove("over");
                    }
                }

                if (type == "mouseout") {
                    ele.classList.remove("over");
                }
            })
        }
    </script>
</body>

</html>