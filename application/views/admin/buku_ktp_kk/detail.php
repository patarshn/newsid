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
                    <h5 class="modal-title"><b>Data Penduduk : <?=$d->nama?></b></h5>
                    </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom">
                                          <div class="card-body">
                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>

                                                  <tr><th width="35%">Nomor KK</th>
                                                  <td><?=$d->nkk?></td></tr> 

                                                  <tr><th>Nama Ayah</th>
                                                  <td><?=$d->ayah?></td></tr>

                                                  <tr class="border-bottom-primary" ><th>Nama Ibu</th>
                                                  <td><?=$d->ibu?></td></tr>

                                                  <tr><th>NIK</th>
                                                  <td><?=$d->nik?></td></tr>

                                                  <tr><th>Nama Lengkap</th>
                                                  <td><?=$d->nama?></td></tr>

                                                  <tr><th>Jenis Kelamin</th>
                                                  <td><?=$d->jenis_kelamin?></td></tr> 

                                                  <tr><th>Tempat dan Tanggal Lahir</th>
                                                  <td><?=$d->tempat_lahir?>, <?=$d->tanggal_lahir?></td></tr>

                                                  <tr><th>Goldar </th>
                                                  <td><?=$d->goldar?></td></tr>

                                                  <tr><th>Agama </th>
                                                  <td><?=$d->agama?></td></tr>

                                                  <tr><th>Pendidikan Terakhir</th>
                                                  <td><?=$d->pendidikan?></td></tr> 

                                                  <tr><th>Pekerjaan</th>
                                                  <td><?=$d->pekerjaan?></td></tr>

                                                  <tr><th>Alamat</th>
                                                  <td><?=$d->alamat?>, <?=$d->rt?>>, <?=$d->rw?>, <?=$d->alamat?>, </td></tr>

                                                  <tr><th>Status Perkawinan</th>
                                                  <td><?=$d->status_perkawinan?></td></tr>

                                                  <tr><th>Tempat dan Tanggal Dikeluarkan</th>
                                                  <td><?=$d->tmpt_tgl_dikeluarkan?></td></tr>

                                                  <tr><th>Hubungan Keluarga</th>
                                                  <td><?=$d->wn?></td></tr>
                                                  
                                                  <tr><th>Kewarganegaraan</th>
                                                  <td><?=$d->wn?></td></tr>

                                                  <tr><th>Tanggal Mulai Tinggal di Desa</th>
                                                  <td><?=$d->tgl_tinggal_desa?></td></tr>

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

