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
                    <h5 class="modal-title"><b>Data Penduduk Sementara: <?=$d->nama?></b></h5>
                    </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom">
                                          <div class="card-body">
                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>

                                                  <tr class="border-bottom-primary" ><th width="30%">Nomor identitas/Tanda Pengenal</th>
                                                  <td><?=$d->no_identitas?></td></tr> 

                                                  <tr><th>Nama Lengkap</th>
                                                  <td><?=$d->nama?></td></tr>

                                                  <tr><th>Jenis Kelamin</th>
                                                  <td><?=$d->jk?></td></tr> 

                                                  <tr><th>Tempat dan Tanggal Lahir/Umur</th>
                                                  <td><?=$d->tempat_lahir?>,<?=$d->tgl_lahir?> / <?=$d->umur?></td></tr>

                                                  <tr><th>Kebangsaan</th>
                                                  <td><?=$d->kebangsaan?></td></tr>

                                                  <tr><th>Keturunan</th>
                                                  <td><?=$d->keturunan?></td></tr>

                                                  <tr><th>Pekerjaan</th>
                                                  <td><?=$d->pekerjaan?></td></tr>

                                                  <tr><th>Datang Dari (Asal)</th>
                                                  <td><?=$d->datang_dari?></td></tr>

                                                  <tr><th>Maksud dan Tujuan Kedatangan</th>
                                                  <td><?=$d->maksud_tujuan?></td></tr>

                                                  <tr><th>Nama dan Alamat yang Didatangi</th>
                                                  <td><?=$d->nama_yg_didatangi?>, <?=$d->alamat_yg_didatangi?></td></tr>

                                                  <tr><th>Tanggal Kedatangan</th>
                                                  <td><?=$d->tgl_datang?></td></tr>

                                                  <tr><th>Tanggal Kepergian</th>
                                                  <td><?=$d->tgl_pergi?></td></tr>

                                                  <tr><th>Keterangan</th>
                                                  <td><?=$d->ket?></td></tr>

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

