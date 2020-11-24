         <!-- Begin Page Content -->
         <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-primary">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?=$breadcrumb?>
                  </h6>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
          <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div> 
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body border-bottom-primary">
                <?=form_open(base_url('rencana_pembangunan/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>

                <div class="form-row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama_proyek"><b>Nama Proyek/Kegiatan</b></label>
                            <input type="text" name="nama_proyek" id="nama_proyek" class="form-control border-left-info" placeholder="Nama proyek atau kegiatan" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="lokasi"><b>Lokasi</b></label>
                            <textarea class="form-control border-left-info" name="lokasi" id="lokasi" placeholder="Lokasi proyek / kegiatan" rows="2"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="biaya_pemerintah"><b>Biaya Pemerintah</b></label>
                        <input type="text" name="biaya_pemerintah" id="biaya_pemerintah" class="form-control border-left-info" placeholder="Besaran biaya pemerintah" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="biaya_prov"><b>Biaya Provinsi</b></label>
                        <input type="text" name="biaya_prov" id="biaya_prov" class="form-control border-left-info" placeholder="Besaran biaya provinsi"  required>
                    </div>

                    <div class="col-lg-3">
                        <label for="biaya_kab"><b>Biaya Kabupaten</b></label>
                        <input type="text" name="biaya_kab" id="biaya_kab" class="form-control border-left-info" placeholder="Besaran biaya kabupaten"  required>
                    </div>

                    <div class="col-lg-3">
                        <label for="biaya_swadaya"><b>Biaya Swadaya</b></label>
                        <input type="text" name="biaya_swadaya" id="biaya_swadaya" class="form-control border-left-info" placeholder="Besaran biaya swadaya"  required>
                    </div>
                    <br>

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="jumlah"><b>Jumlah Biaya</b></label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control border-left-info" placeholder="Total biaya" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pelaksana"><b>Pelaksana Kegiatan</b></label>
                            <input type="text" name="pelaksana" id="pelaksana" class="form-control border-left-info " placeholder="Pelaksana proyek / kegiatan"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="manfaat"><b>Manfaat Pembangunan</b></label>
                            <textarea class="form-control border-left-info" name="manfaat" id="manfaat" placeholder="Manfaat pembangunan" rows="3"></textarea>
                        </div>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
                            <textarea class="form-control border-left-info" name="ket" id="ket" rows="3"></textarea>
                        </div>                   
                    </div>
                </div>
                <?=form_close()?>
                
                  <div class="d-flex mt-3">
                    <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/<?=$uri[2]?>/store','#form')">Simpan</button>
                        <div class="spinner-border m-1 align-self-center text-primary d-none" role="status" id="loading">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    
                    
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->