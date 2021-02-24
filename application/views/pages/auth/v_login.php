<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap Section -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <!-- Title Tab Style -->
        <title>PPL 2</title>
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/icon/seo.ico">

        <!-- Meta Section -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            .box-v2{
                width: 75vh;
                height: fit-content;
                margin: 15vh auto 15vh auto;
                background-color: #ffffff;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 20px 15px 20px 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="box-v2">
                <h6 class="mb-4">Silahkan login terlebih dahulu</h6>
                <form action="<?= base_url('index.php/auth_login') ?>" method="POST">
                    <div class="d-flex mb-3">
                        <label for="email_user" style="width: 13vh">Username</label>
                        <input type="text" id="email_user" class="form-control form-control-sm w-50" name="username" required>
                    </div>
                    <div class="d-flex mb-3">
                        <label for="pass_user" style="width: 13vh">Password</label>
                        <input type="password" id="pass_user" class="form-control form-control-sm w-50" name="password" required>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-primary btn-sm mr-3">Login</button>
                        <p class="my-auto">Belum punya akun? Daftar di <a href="<?= base_url('index.php/register') ?>">sini</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>