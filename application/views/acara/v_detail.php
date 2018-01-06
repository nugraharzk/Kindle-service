        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Acara</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table">
              <tbody>
                <tr>
                  <th>Nama Acara</th>
                  <td><?=$acara->judul?></td>
                </tr>
                <tr>
                  <th>Penyelenggara</th>
                  <td><?=$user->nama?></td>
                </tr>
                <tr>
                  <th>Waktu</th>
                  <td><?=$acara->waktu?></td>
                </tr>
                <tr>
                  <th>Prioritas</th>
                  <td><?=$acara->priority?></td>
                </tr>
                <tr>
                  <th>Deskripsi</th>
                  <td><?=$acara->deskripsi?></td>
                </tr>
                <tr>
                  <th>Konfirmasi</th>
                  <td><?=$acara->konfirmasi?></td>
                </tr>
              </tbody>
            </table><br>
            <div class="col-md-2 col-md-push-5">
              <?=anchor('acara', 'Kembali', [
                'class' => 'btn btn-primary',
                'role'  => 'button'
              ])?>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
           <?=$paging?>
            
          </div>
        </div>
        <script>
function warnDelete() {
  job=confirm("Are you sure to delete permanently?");
  if(job!=true)
  {
      return false;
  }
  
}
</script>