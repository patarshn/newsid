<link rel="stylesheet" href="yearpicker.css">
<script src="/path/to/cdn/jquery.slim.min.js"></script>
<script src="yearpicker.js" async></script> 

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
                    <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
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
                            <label class="text-gray-900 font-weight-bold" for="tahun">Tahun Pelaksanaan Kegiatan</label>
                            <input list="tahun" name="tahun" id="tahun" class="form-control border-left-primary" required>
                            <datalist id="tahun">
                                <option value="2021">
                                <option value="2022">
                                <option value="2023">
                                <option value="2024">
                                <option value="2025">
                                <option value="2026">
                                <option value="2027">
                                <option value="2028">
                                <option value="2029">
                                <option value="2030">
                            </datalist>  
                    </div>
                    </div>

                <div class="form-row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nama_proyek">Nama Proyek/Kegiatan</label>
                            <input type="text" name="nama_proyek" id="nama_proyek" class="form-control border-left-primary" placeholder="Nama proyek atau kegiatan" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="lokasi">Lokasi</label>
                            <textarea class="form-control border-left-primary" name="lokasi" id="lokasi" placeholder="Lokasi proyek / kegiatan" rows="2"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="biaya_pemerintah">Biaya Pemerintah</label>
                        <input type="number" name="biaya_pemerintah" id="biaya_pemerintah" class="form-control border-left-primary" placeholder="Besaran biaya pemerintah" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_prov">Biaya Provinsi</label>
                        <input type="number" name="biaya_prov" id="biaya_prov" class="form-control border-left-primary" placeholder="Besaran biaya provinsi"  required>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_kab">Biaya Kabupaten</label>
                        <input type="number" name="biaya_kab" id="biaya_kab" class="form-control border-left-primary" placeholder="Besaran biaya kabupaten"  required>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_swadaya">Biaya Swadaya</label>
                        <input type="number" name="biaya_swadaya" id="biaya_swadaya" class="form-control border-left-primary" placeholder="Besaran biaya swadaya"  required>
                    </div>
                    <br>

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="jumlah">Jumlah Biaya</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control border-left-primary" placeholder="Total biaya" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="pelaksana">Pelaksana Kegiatan</label>
                            <input type="text" name="pelaksana" id="pelaksana" class="form-control border-left-primary " placeholder="Pelaksana proyek / kegiatan"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="manfaat">Manfaat Pembangunan</label>
                            <textarea class="form-control border-left-primary" name="manfaat" id="manfaat" placeholder="Manfaat pembangunan" rows="3"></textarea>
                        </div>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3"></textarea>
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