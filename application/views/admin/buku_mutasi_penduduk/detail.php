        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?=$breadcrumb?>
                  </h6>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <!--<button type="button" class="btn btn-warning">Cancel</button>-->
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                  
                  <?php foreach($data as $d):?>
                    <div class="modal-header  border-bottom">
                    <h5 class="modal-title"><b>Data Mutasi Penduduk: <?=$d->nama?></b></h5>
                    </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom">
                                          <div class="card-body">
                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                              <tr><th width="35%">Nama Lengkap/Panggilan</th>
                                                  <td><?=$d->nama?></td></tr>

                                                  <tr><th>Tempat Lahir</th>
                                                  <td><?=$d->tempat_lahir?></td></tr> 

                                                  <tr><th>Tanggal Lahir</th>
                                                  <td><?=$d->tgl_lahir?></td></tr>

                                                  <tr><th>Jenis Kelamin</th>
                                                  <td><?=$d->jk?></td></tr> 

                                                  <tr class="border-bottom-primary"><th>Kewarganegaraan</th>
                                                  <td><?=$d->wn?></td></tr>
                                              </thead> 

                                                  
                                                  <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                                  <thead>
                                                  <tr><th width="35%">Datang Dari (Tempat/Alamat Asal)</th>
                                                  <td><?=$d->datang?></td></tr>

                                                  <tr><th>Tanggal Kedatangan</th>
                                                  <td class="border-bottom-primary"><?=$d->tgl_datang?></td></tr> 
                                                  </thead>  
                                                  <h5><b>Penambahan</b></h5>  

                                                 
                                                  <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                                  <thead>
                                                  <tr><th width="35%">Pindah Ke (Lokasi Tujuan)</th>
                                                  <td><?=$d->pindah?></td></tr>

                                                  <tr><th>Tanggal Pindah</th>
                                                  <td><?=$d->tgl_pindah?></td></tr> 

                                                  <tr><th>Meninggal (Tempat/Lokasi) </th>
                                                  <td><?=$d->meninggal?></td></tr>

                                                  <tr><th>Tanggal Meninggal</th>
                                                  <td class="border-bottom-primary"><?=$d->tgl_meninggal?></td></tr> 
                                                 </thead>        
                                                 <h5><b>Pengurangan</b></h>                               
                                              </table>
                                        </div>
                                    </div>
                              </div>
                        
                  <?php endforeach;?>
                    
                    
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

