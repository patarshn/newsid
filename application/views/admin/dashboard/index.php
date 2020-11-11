        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p>Anda login sebagai, <?=$this->session->userdata('username')?></p>
                </div>
                
              </div>


              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
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
                      foreach($data as $formdata):
                          $form_name = $formdata['form_name'];
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
            

              <script>
                var data = <?=json_encode($data)?>;
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


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->