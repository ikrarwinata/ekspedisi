<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mikrotik :: Login</title>
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
    <div class="alert text-center mb-1 mt-0 text-danger" role="alert">
      <small>
        <?php
        $H = timeLog($this->session->userdata("blockTime") + $this->session->userdata("blockTimeout"), "%H");
        $i = timeLog($this->session->userdata("blockTime") + $this->session->userdata("blockTimeout"), "%i");
        $s = timeLog($this->session->userdata("blockTime") + $this->session->userdata("blockTimeout"), "%s");
        echo ("Akses anda dibatasi. Silahkan coba lagi dalam " . $H . " Jam " . $i . " Menit " . $s . " Detik"); ?>
      </small>
    </div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">

      <!-- lockscreen credentials (contains the form) -->
      <form class="lockscreen-credentials" action="" method="POST" style="margin-left: 8px;">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Username" name="pos_username" required maxlength="50" disabled>

          <div class="input-group-append">
            <button type="button" class="btn disabled">
              <i class="fas fa-arrow-right text-muted"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- /.lockscreen credentials -->
    </div>
    <!-- /.lockscreen-item -->
    <?php $this->load->view('_partials/footer'); ?>
  </div>
  <!-- /.center -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>