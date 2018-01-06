          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Acara Warga</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <?php $no=1; ?>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama Acara</th>
                  </tr>  
                </thead>
                <tbody>
                  <?php foreach($acara as $data){ ?>
                  <tr>
                    <td><?=$no;?></td>
                    <td><a href="<?php base_url();?>acara/detail/<?=$data->id_event?>/<?=$data->username?>"><?=$data->judul?></a></td>
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