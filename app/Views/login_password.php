<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ekspedisi :: Login</title>
    <base href="<?php echo (base_url()) ?>">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="<?php echo (base_url('Home/login')) ?>">Login</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name"><?php echo (session("login_name")) ?></div>

        <?php if (session()->getFlashdata('ci_password_flash_message') != NULL) : ?>
            <div class="alert text-center mb-1 mt-0 <?php echo session()->getFlashdata('ci_password_flash_message_type') ?>" role="alert">
                <small><?php echo session()->getFlashdata('ci_password_flash_message') ?></small>
            </div>
        <?php endif; ?>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="assets/img/user.png" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials" action="<?php echo (base_url('Home/login_auth')) ?>" method="POST">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="password" name="pos_password" required maxlength="50" autofocus>

                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Masukan password anda untuk melanjutkan.
        </div>
        <div class="text-center">
            <a href="<?php echo (base_url('Home/login')) ?>">Atau masuk menggunakan akun lain</a>
        </div>
        <?php echo view('_templates/footer'); ?>
    </div>
    <!-- /.center -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>