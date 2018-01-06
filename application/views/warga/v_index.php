          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar warga</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <?php $no=1; ?>
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                  </tr>  
                </thead>
                <tbody>
                  <?php foreach($warga as $data){ ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><a href="<?php base_url();?>warga/detail/<?=$data->username?>"><?=$data->username?></a></td>
                    <td><?=$data->email?></td>
                    <?php if ($data->verified == 1){ ?>
                    <td>Akun terverifikasi.</td>
                    <?php }else{ ?>
                    <td>
                      <?php if ($this->session->userdata("level") == "RT") {?>
                        <a href="<?=site_url('warga/acc/'.$data->username);?>" class="btn btn-info">Verifikasi Akun</a>
                      <?php }else{ ?>
                      Akun belum diverifikasi, kontak RT Anda.
                      <?php } ?>
                    </td>
                    <?php } ?>
                  </tr>
                  <?php $no++;} ?>
                </tbody>
              </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
             <?=$paging?>
              
            </div>
          </div>
          <script>
            $(document).ready(function(){
              $('#myTable').DataTable();
            });
          </script>