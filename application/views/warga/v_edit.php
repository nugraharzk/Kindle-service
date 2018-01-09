<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Asset</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <div class="form-horizontal">

    <?php echo form_open_multipart('warga/upload_profile/'.$_SESSION['username']);?>

    <!-- <form class="form-horizontal" action="" method="post"> -->
      <input type="hidden" value="">
      <div class="box-body">
        <div class="form-group">
          <label for="foto_profil" class="col-sm-2 control-label">Foto Profil</label>
          <div class="col-sm-10">
            <img class="imgplaceholder" style="border: 1px solid #000; max-width:300px; max-height:300px;"
              src="<?php
                $path = FCPATH."uploads/profile/".$warga->profile_image;
                if(file_exists($path))
                 echo site_url()."uploads/profile/".$warga->profile_image;
                else
                 echo site_url()."uploads/notfound.png"
                ?>"
              >
          </div>
        </div>
        <div class="form-group">
          <label for="foto_profil_baru" class="col-sm-2 control-label">Update Foto Profil</label>

          <div class="col-sm-10">
            <input name="foto_profil" type="file" class="form-control" id="foto_rumah" placeholder="foto_profil">
          </div>
        </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">

        <button type="submit" class="btn btn-info pull-right">Simpan Foto Profil</button>
      </div>
      <!-- /.box-footer -->
    </form>

    <?php echo form_open_multipart('warga/upload_home/'.$_SESSION['username']);?>

    <!-- <form class="form-horizontal" action="" method="post"> -->
      <input type="hidden" value="">
      <div class="box-body">

        <div class="form-group">
          <label for="Username" class="col-sm-2 control-label">Username</label>

          <div class="col-sm-10">
            <input name="username" type="text" readonly value="<?=isset($warga->username) ? $warga->username : ''?>" class="form-control" id="username" placeholder="Username">
          </div>
        </div>

        <div class="form-group">
          <label for="foto_rumah" class="col-sm-2 control-label">Foto Rumah</label>
          <div class="col-sm-10">
            <img class="imgplaceholder" style="border: 1px solid #000; max-width:300px; max-height:300px;"
              src="<?php 
                $path = FCPATH."uploads/house/".$warga->house_image;
                if(file_exists($path))
                 echo site_url()."uploads/house/".$warga->house_image;
                else
                 echo site_url()."uploads/notfound.png"
                ?>"
              >
          </div>
          
        </div>
        <div class="form-group">
          <label for="foto_rumah_baru" class="col-sm-2 control-label">Update Foto Rumah</label>

          <div class="col-sm-10">
            <input name="foto_rumah" type="file" class="form-control" id="foto_rumah" placeholder="foto_rumah">
          </div>
        </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">

        <button type="submit" class="btn btn-info pull-right">Simpan Foto Rumah</button>
      </div>
      <!-- /.box-footer -->
    </form>

    
  </div>
</div>