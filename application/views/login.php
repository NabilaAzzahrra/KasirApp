<!DOCTYPE html>
<html lang="id-ID">

<head>
  <?php $this->load->view("templates/head"); ?>
</head>

<body class="login-page">
  <div class="login-box">
    <div class="card card-outline card-info">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>SiRP</b> App</a>
      </div>
      <form action="<?= base_url('Auth/login'); ?>" method="post">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Masuk untuk memulai sesi anda!</p>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fal fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fal fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="col-13">
            <button type="submit" class="btn bg-gradient-info btn-block">Masuk</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<?php $this->load->view("templates/script"); ?>
<script>
  $(function() {
    $('[name="username"]').focus();
    <?php if ($this->session->flashdata('usernotfound')) { ?>
      toastr.error('Username tersebut tidak ada.');
    <?php } else if ($this->session->flashdata('passnotfound')) { ?>
      toastr.error('Password tersebut salah.');
    <?php } else if ($this->session->flashdata('logout')) { ?>
      toastr.success('Berhasil keluar dari sesi anda.');
    <?php } else { ?>
      toastr.info('Masukkan data anda untuk masuk.');
    <?php } ?>
  });
</script>

</html>
