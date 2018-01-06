        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Asset</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table">
              <tbody>
                <tr>
                  <th>Username</th>
                  <td><?=$warga->username?></td>
                </tr>
                <tr>
                  <th>Nama</th>
                  <td><?=$warga->nama?></td>
                </tr>
                <tr>
                  <th>Tempat Tanggal Lahir</th>
                  <td><?=$warga->ttl?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><?=$warga->alamat?></td>
                </tr>
                <tr>
                  <th>RT</th>
                  <td><?=$warga->rt?></td>
                </tr>
                <tr>
                  <th>RW</th>
                  <td><?=$warga->rw?></td>
                </tr>
                <tr>
                  <th>Desa</th>
                  <td><?=$warga->desa?></td>
                </tr>
                <tr>
                  <th>Telepon</th>
                  <td><?=$warga->telepon?></td>
                </tr>
                <tr>
                  <th>Pekerjaan</th>
                  <td><?=$warga->pekerjaan?></td>
                </tr>
                <tr>
                  <th>Jabatan</th>
                  <td><?=$warga->jabatan?></td>
                </tr>
            </tbody></table><br>
            <div class="col-md-2 col-md-push-5">
              <?=anchor('warga', 'Kembali', [
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