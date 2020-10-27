<!-- CONTENT -->
<div class="container mt-3">
    <div class="row">
                    
    <div class="col-6">
    <h3>Masukkan NIK</h3>
        <input type="number" class="form-control col-12" name="nik" id="nik">
        
        <button type="button" class="btn btn-primary active-button" onclick="checknik()">Check</button>
    </div>
    </div>
</div>

<script>
    function checknik(){
        var nik = $('#nik').val();
        console.log(nik);
        var link = base_url+'form_check/nik/'+nik;
        console.log(link);
        window.location.href = link;
    }
</script>

<div class="row">
    <div class="container">
    
<?php
if($id==null){
}
else{
    ?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>ID</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Pengajuan</th>
                      <th width="10%">Verif Lurah</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%">No</th>
                      <th>ID</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Pengajuan</th>
                      <th>Verif Lurah</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  
                  <?php 
                  $count = 1;
                  $pending = 0;
                  $disetujui = 0;
                  $ditolak = 0;
                  foreach ($data as $d): ?>
                    <tr>
                    <td>
                        <?=$count++;?>
                      </td>
                      <td><?=$d->id?></td>
                      <td><?=$d->nik?></td>
                      <td><?=$d->nama?></td>
                      <td>
                      <?php
                      $pengajuan  = explode(" ",$d->created_at);
                      echo $pengajuan[0]."<br>";
                      echo $pengajuan[1];
                      ?>
                      </td>
                      <td>
                        <?php 
                        if($d->verif_lurah_at == null){
                          $verif_time = "";
                        }
                        else{
                          $verif_lurah_at  = explode(" ",$d->verif_lurah_at);
                          $verif_time = "<br>".$verif_lurah_at[0]."<br>".$verif_lurah_at[1]."<br>";
                        }
                        ?>
                        
                        <?php if($d->verif_lurah == 'Pending'):?>
                            <div class="card bg-warning text-white text-center">Pending <?=$verif_time;$pending++?></div>
                        <?php elseif($d->verif_lurah == 'Disetujui'):?>
                            <div class="card bg-success text-white text-center">Disetujui <?=$verif_time;$disetujui++?></div>
                        <?php elseif($d->verif_lurah == 'Ditolak'):?>
                            <div class="card bg-danger text-white text-center">Ditolak <?=$verif_time;$ditolak++?></div>
                        <?php endif;?>
                      </td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>


    <?php
}
?>
    </div>
</div>
<!-- END CONTENT -->
