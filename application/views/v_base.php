<html>

<head>
  <?php $this->load->view('layout/head'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('layout/top_login')?>
  <?php $this->load->view('layout/side_menu')?>
  
  <?php $this->load->view('layout/content')?>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <b><i>KINDLE Web Services</i></b>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">KINDLE Developers</a>.</strong> All rights reserved.
  </footer>
  

  
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view('layout/foot')?>

</body>
</html>