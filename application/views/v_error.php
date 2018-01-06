<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('layout/head') ?>
</head>
<body class="hold-transition login-page">

<?php $this->load->view('layout/top_menu')?>
  
<div class="login-box">
  <div class="login-logo">
<<<<<<< HEAD
    <a href="../../index2.html"><b>SISFO</b>ASET</a>
=======
    <a href="../../index2.html"><b>KINDLE</b><br>Web Services</a>
>>>>>>> f0e6f9cd69ccd2857bf618b4295b8c8d4735d276
  </div>
  <!-- /.login-logo -->

  <div class="login-box-body">
    <p class="login-box-msg">Error! Username <?=$nama?> tidak ada!</p> 
    <div class="col-md-4 col-md-push-4">
      <?=anchor('', 'Kembali', [
        'class' => 'btn btn-primary',
        'role'  => 'button'
      ])?>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $this->load->view('layout/foot2')?>

</body>
</html>
