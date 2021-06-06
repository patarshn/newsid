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
                    <h5 class="modal-title"><b>Data Rekapitulasi Jumlah Penduduk Dusun: <?=$d->dusun?></b></h5>
                    <h5 class="modal-title"><b>Periode: <?=$d->bulan_tahun?></b></h5>
                    </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom">
                                          <div class="card-body">
                                          <h5 class="modal-title"><b>Jumah Penduduk Awal Bulan</b></h5>
                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                              <tr><th width="35%">WNA Laki-Laki</th>
                                                  <td><?=$d->awal_wna_l?></td></tr>

                                                  <tr><th>WNA Perempuan</th>
                                                  <td><?=$d->awal_wna_p?></td></tr> 

                                                  <tr><th>WNI Laki-Laki</th>
                                                  <td><?=$d->awal_wni_l?></td></tr>

                                                  <tr  class="border-bottom-primary"><th>WNI Perempuan</th>
                                                  <td><?=$d->awal_wni_p?></td></tr> 

                                                  <tr><th>Jumlah Kartu Keluarga</th>
                                                  <td><?=$d->awal_jml_kk?></td></tr>
                                                  
                                                  <tr><th>Jumlah Anggota Keluarga</th>
                                                  <td><?=$d->awal_jml_anggota_keluarga?></td></tr>

                                                  <tr><th>Jumlah Jiwa</th>
                                                  <td><?=$d->awal_jml_jiwa?></td></tr> 
                                              </thead> 

                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                              <tr><th width="35%">Kalahiran WNA Laki-Laki</th>
                                                  <td><?=$d->tambah_lahir_wna_l?></td></tr>

                                                  <tr><th>Kalahiran WNA Perempuan</th>
                                                  <td><?=$d->tambah_lahir_wna_p?></td></tr> 

                                                  <tr><th>Kalahiran WNI Laki-Laki</th>
                                                  <td><?=$d->tambah_lahir_wni_l?></td></tr>

                                                  <tr  class="border-bottom-primary"><th>Kalahiran WNI Perempuan</th>
                                                  <td><?=$d->tambah_lahir_wni_p?></td></tr> 

                                                  <th width="35%">Kedatangan WNA Laki-Laki</th>
                                                  <td><?=$d->tambah_datang_wna_l?></td></tr>

                                                  <tr><th>Kedatangan WNA Perempuan</th>
                                                  <td><?=$d->tambah_datang_wna_p?></td></tr> 

                                                  <tr><th>Kedatangan WNI Laki-Laki</th>
                                                  <td><?=$d->tambah_datang_wni_l?></td></tr>

                                                  <tr  class="border-bottom-primary"><th>Kedatangan WNI Perempuan</th>
                                                  <td><?=$d->tambah_datang_wni_p?></td></tr> 
                                              </thead> 
                                              <h5 class="modal-title"><b>Penambahan Penduduk</b></h5>

                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                              <tr><th width="35%">WNA Laki-Laki Meninggal</th>
                                                  <td><?=$d->kurang_meninggal_wna_l?></td></tr>

                                                  <tr><th>WNA Perempuan Meninggal</th>
                                                  <td><?=$d->kurang_meninggal_wna_p?></td></tr> 

                                                  <tr><th>WNI Laki-Laki Meninggal</th>
                                                  <td><?=$d->kurang_meninggal_wni_l?></td></tr>

                                                  <tr  class="border-bottom-primary"><th>WNI Perempuan Meninggal</th>
                                                  <td><?=$d->kurang_meninggal_wni_p?></td></tr> 

                                                  <th width="35%">WNA Laki-Laki Pindah</th>
                                                  <td><?=$d->kurang_pindah_wna_l?></td></tr>

                                                  <tr><th>WNA Perempuan Pindah</th>
                                                  <td><?=$d->kurang_pindah_wna_p?></td></tr> 

                                                  <tr><th>WNI Laki-Laki Pindah</th>
                                                  <td><?=$d->kurang_pindah_wni_l?></td></tr>

                                                  <tr  class="border-bottom-primary"><th>WNI Perempuan Pindah</th>
                                                  <td><?=$d->kurang_pindah_wni_p?></td></tr> 
                                              </thead> 
                                              <h5 class="modal-title"><b>Pengurangan Penduduk</b></h5>

                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                              <tr><th width="35%">WNA Laki-Laki</th>
                                                  <td><?=$d->akhir_wna_l?></td></tr>

                                                  <tr><th>WNA Perempuan</th>
                                                  <td><?=$d->akhir_wna_p?></td></tr> 

                                                  <tr><th>WNI Laki-Laki</th>
                                                  <td><?=$d->akhir_wni_l?></td></tr>

                                                  <tr  class="border-bottom-primary"><th>WNI Perempuan</th>
                                                  <td><?=$d->akhir_wni_p?></td></tr> 

                                                  <tr"><th>Jumlah Kartu Keluarga</th>
                                                  <td><?=$d->akhir_jml_kk?></td></tr>
                                                  
                                                  <tr><th>Jumlah Anggota Keluarga</th>
                                                  <td><?=$d->akhir_jml_anggota_keluarga?></td></tr>

                                                  <tr><th>Jumlah Jiwa</th>
                                                  <td><?=$d->akhir_jml_jiwa?></td></tr> 
                                              </thead> 
                                              <h5 class="modal-title"><b>Jumah Penduduk Akhir Bulan</b></h5>
                                                                    
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

