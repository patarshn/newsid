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
                <?=form_open_multipart(base_url('buku_rapat_bpd/store'),'id="form"')?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-6 mt-3">
                        <label for="tgl" class="text-gray-900 font-weight-bold">Tanggal Rapat</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="tgl" id="tgl" class="form-control border-left-primary" placeholder="mm/dd/yy"  required>
                    </div>
                    
                    <div class="col-lg-6 mt-3">
                        <label for="agenda" class="text-gray-900 font-weight-bold">Agenda Rapat</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="agenda" id="agenda" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="buku_daftar_hadir" class="text-gray-900 font-weight-bold">Buku Daftar Hadir Rapat</label>
                        <a href="<?=base_url('administrasilainnya\buku_rapat_bpd/BUKU DAFTAR HADIR RAPAT BHP.docx')?>" class="btn btn-primary" role="button">Unduh</a>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="buku_notulen" class="text-gray-900 font-weight-bold">Buku Notulen Rapat</label>
                        <a href="<?=base_url('administrasilainnya\buku_rapat_bpd/BUKU NOTULEN RAPAT BHP.docx')?>" class="btn btn-primary" role="button">Unduh</a>
                    </div>

                    <div class="col-lg-6 mt-3">
                    <label class="text-gray-900 font-weight-bold">Upload Berkas Daftar Hadir Rapat</label>
                      <div class="custom-file">
                          <label for="berkas1" class="custom-file-label border-left-primary">Pilih Berkas</label>
                          <input type="file" class="custom-file-input" id="berkas1" name="berkas1" accept=".pdf">
                          <small id="berkas1" class="text-gray-700">Berkas berformat .pdf</small>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                    <label class="text-gray-900 font-weight-bold">Upload Berkas Notulen Rapat</label>
                      <div class="custom-file">
                          <label for="berkas2" class="custom-file-label border-left-primary">Pilih Berkas</label>
                          <input type="file" class="custom-file-input" id="berkas2" name="berkas2" accept=".pdf">
                          <small id="berkas2" class="text-gray-700">Berkas berformat .pdf</small>
                      </div>
                    </div>
          </div>

                <?=form_close()?>
                <medium id="wajib" class="text-danger">* Wajib diisi</medium>
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