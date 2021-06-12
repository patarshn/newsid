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
                  
                  <?php foreach($data as $p):?>
                    <div class="modal-header  border-bottom">
                    <h5 class="modal-title"><b>Data Rencana Pembangunan: <?=$p->nama_proyek?></b></h5>
                    </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom">
                                          <div class="card-body">
                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                                  <tr><th>Nama Proyek/Kegiatan</th>
                                                  <td><?=$p->nama_proyek?></td></tr>

                                                  <tr><th>Lokasi</th>
                                                  <td><?=$p->lokasi?></td></tr>                                                                                      

                                                  <tr><th>Pelaksana</th>
                                                  <td><?=$p->pelaksana?></td></tr>

                                                  <tr><th>Manfaat</th>
                                                  <td><?=$p->manfaat?></td></tr>
                                                  
                                                  <tr><th>Keterangan</th>
                                                  <td><?=$p->ket?></td></tr>
                                                 </thead>
                                              </table>                                            
                                        
                                              <h8><b> Sumber Dana / Besaran Biaya</b></h8>
                                              <table class="table table-bordered table-hover border-left-primary">
                                              <thead>
                                              <tr><th>Pemerintah</th>
                                                  <td style="text-align:right">Rp. <?=$p->biaya_pemerintah?></td></tr>

                                                  <tr><th>Provinsi</th>
                                                  <td style="text-align:right">Rp. <?=$p->biaya_prov?></td></tr> 

                                                  <tr><th>Kabupaten/Kota</th>
                                                  <td style="text-align:right">Rp. <?=$p->biaya_kab?></td></tr>

                                                  <tr class="border-bottom-primary"><th>Swadaya</th>
                                                  <td style="text-align:right">Rp. <?=$p->biaya_swadaya?></td></tr>

                                                  <tr><th>Total Biaya</th>
                                                  <td style="text-align:right">Rp. <?=$p->jumlah?></td></tr>
                                                 </thead>
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

