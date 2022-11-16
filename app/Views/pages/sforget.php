<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/font-awesome/css/all.css">
    <title><?= $title; ?></title>
</head>

<body>

    <main>
        <div class="row" style="padding: 50px; margin-top: 220px; width:500px; border-radius: 10px; border: 2px solid #d0d0d0; margin-left:auto; margin-right: auto;">
            <div class="col-md-12">
                <div class="container">
                    <h5 style="text-align: center; margin-bottom: 30px;">Sent to email address successfully</h5>
                    <hr>
                    <p style="text-align: center; margin-bottom: 30px;">Please check your email address</p>
                    <div class="col text-center">
                        <button onclick="location.href='/login'" class="btn btn-primary" type="button">Back to Login</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script defer src="<?= base_url() ?>/assets/font-awesome/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>