        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
            
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?=$breadcrumb?>
                  </h6>
                </div>
              </div>
            </div>
            <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div>
          </div>
          <?php
          
          $pending = 0;
          $disetujui = 0;
          $ditolak = 0;
          $data2 = $data;
          foreach($data2 as $countdata){
            if($countdata->verif_lurah == 'Pending'):
              $pending++;
            elseif($countdata->verif_lurah == 'Disetujui'):
              $disetujui++;
            elseif($countdata->verif_lurah == 'Ditolak'):
              $ditolak++;
            endif;
          }
          ?>

<div class="row"> <!--row2 start-->
            <?php
            $total = $ditolak+$pending+$disetujui;
            if($total == 0){
              $disetujuiPersentase = 0;
              $ditolakPersentase = 0;
              $pendingPersentase = 0;
            }

            else {
              $disetujuiPersentase = $disetujui/$total*100;
              $ditolakPersentase = $ditolak/$total*100;
              $pendingPersentase = $pending/$total*100;
            }
            
            ?>
            <!-- Project Card Example -->
            <div class="col-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Persentase Data</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Pending <span class="float-right"><?=round($pendingPersentase)?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?=round($pendingPersentase)?>%" aria-valuenow="<?=round($pendingPersentase)?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Disetujui <span class="float-right"><?=round($disetujuiPersentase)?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?=round($disetujuiPersentase)?>%" aria-valuenow="<?=round($disetujuiPersentase)?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Ditolak <span class="float-right"><?=round($ditolakPersentase)?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?=round($ditolakPersentase)?>%" aria-valuenow="<?=round($ditolakPersentase)?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Total Data <span class="float-right"><?=round($total)?></span></h4>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Total Data</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Pending (<?=$pending?>)
                            </span>
                            <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Disetujui (<?=$disetujui?>)
                            </span>
                            <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Ditolak (<?=$ditolak?>)
                            </span>
                        </div>
                        </div>
                    </div>
                </div>



            
          </div> <!-- row2 end -->
          

          <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
                        <th>Jenis Form</th>
                        <th class="text-warning">Dipending</th>
                        <th class="text-success">Desetujui</th>
                        <th class="text-danger">Ditolak</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th width="5%">No</th>
                        <th>Jenis Form</th>
                        <th class="text-warning">Dipending</th>
                        <th class="text-success">Desetujui</th>
                        <th class="text-danger">Ditolak</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                        $i = 1;
                        foreach($formdata as $fd):
                            $form_name = $fd['form_name'];
                            $form_name_lower = strtolower($form_name);
                            $form_name_id = str_replace(' ', '', $form_name_lower);  
                      ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?= $form_name?></td>
                        <td id="<?=$form_name_id;?>Pending">0</td>
                        <td id="<?=$form_name_id;?>Disetujui">0</td>
                        <td id="<?=$form_name_id;?>Ditolak">0</td>
                      </tr>
                      
                      <?php endforeach;?>
                      <tbody>
                    </table>
                  </div>
                </div>
                
              </div>
            

              <script>
                var data = <?=json_encode($formdata)?>;
                Object.keys(data).forEach(function(i){
                    var countdata = data[i].countdata;
                    var form_name = data[i].form_name;
                    var countdatalen = countdata.length;
                    var form_name_lower = form_name.toLowerCase();
                    var form_name_id = form_name_lower.replace(/ /g,'');
                    console.log(form_name_id);
                    for(j=0;j<countdatalen;j++){
                      verif_lurah = countdata[j]['verif_lurah'];
                      total = countdata[j]['total'];
                      if(verif_lurah == "Pending"){
                        document.getElementById(form_name_id+verif_lurah).innerHTML = total;
                      }
                      else if(verif_lurah == "Disetujui"){
                        document.getElementById(form_name_id+verif_lurah).innerHTML = total;
                      }
                      else if(verif_lurah == "Ditolak"){
                        document.getElementById(form_name_id+verif_lurah).innerHTML = total;
                      }
                    }
                });
              </script>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
              <div>
                <div class="btn-group" role="group" aria-label="Basic example">
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <form method="POST" id="formdelete" action="/kk/destroy">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Aksi</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis Form</th>
                      <th>Pengajuan</th>
                      <th width="10%">Verif Lurah</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%">No</th>
                      <th>Aksi</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis Form</th>
                      <th>Pengajuan</th>
                      <th>Verif Lurah</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  
                  <?php 
                  $count = 1;
                  foreach ($data as $d): ?>
                    <tr>
                    <td>
                        <?=$count++;?>
                      </td>
                      <td><div class="dropdown no-arrow">
                        <a class="dropdown-toggle btn btn-sm btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Actions:</div>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$d->table_name.'/edit/'.$d->id)?>">Edit</a>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$d->table_name.'/detail/'.$d->id)?>">Detail</a>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$d->table_name.'/cetak/'.$d->id)?>">Cetak</a>
                          <!--<div class="dropdown-divider"></div>-->
                          </div>
                        </div>
                      </td>
                      <td><?=$d->nik?></td>
                      <td><?=$d->nama?></td>
                      <td><?=$d->table_name?></td>
                      
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
                            <div class="card bg-gradient-warning text-white text-center">Pending <?=$verif_time;?></div>
                        <?php elseif($d->verif_lurah == 'Disetujui'):?>
                            <div class="card bg-gradient-success text-white text-center">Disetujui <?=$verif_time;?></div>
                        <?php elseif($d->verif_lurah == 'Ditolak'):?>
                            <div class="card bg-gradient-danger text-white text-center">Ditolak <?=$verif_time;?></div>
                        <?php endif;?>
                      </td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
                </form>
              </div>



            </div>
            <!-- End Card -->
            
          </div>
          
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script>
      
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var pending = <?=$pending?>;
var disetujui = <?=$disetujui?>;
var ditolak = <?=$ditolak?>;
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Pending", "Disetujui", "Ditolak"],
    datasets: [{
      data: [pending, disetujui, ditolak],
      backgroundColor: ['#f6c23e', '#1cc88a', '#e74a3b'],
      hoverBackgroundColor: ['#fab400', '#17a673', '#e1301f'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

