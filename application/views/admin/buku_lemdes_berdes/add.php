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
                <?=form_open_multipart(base_url('buku_peraturan_desa/store'),'id="form"')?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-6 mt-3">
                        <label for="jns_peraturan_desa" class="text-gray-900 font-weight-bold">Jenis Peraturan di Desa</label>
                        <input type="text" name="jns_peraturan_desa" id="jns_peraturan_desa" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="tentang" class="text-gray-900 font-weight-bold">Tentang</label>
                        <input type="text" name="tentang" id="tentang" class="form-control border-left-primary" required>
                        <small id="tentang" class="text-gray-700">Diisi dengan materi Peraturan Desa</small>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Nomor dan Tanggal ditetapkan</label>
                      <div class="form-row">
                        <div class="col-lg-6">
                          <input type="text" name="no_ditetapkan" id="no_ditetapkan" class="form-control border-left-primary" required>
                          <small id="no_ditetapkan" class="text-gray-700">Nomor ditetapkan</small>
                        </div>

                        <div class="col-lg-6">                        
                          <input type="date" name="tgl_ditetapkan" id="tgl_ditetapkan" class="form-control border-left-primary" placeholder="mm/dd/yyyy" required>
                          <small id="tgl_ditetapkan" class="text-gray-700">Tanggal ditetapkan</small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Diundangkan</label>
                      <div class="form-row">
                          <div class="col-lg-6">
                              <input type="date" name="tgl_diundangkan" id="tgl_diundangkan" class="form-control border-left-primary" required>
                              <small id="tgl_diundangkan" class="text-gray-700">Tanggal</small>
                          </div>
                          
                          <div class="col-lg-6">
                              <input type="text" name="no_diundangkan" id="no_diundangkan" class="form-control border-left-primary" required>
                              <small id="no_diundangkan" class="text-gray-700">Nomor</small>
                          </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                    <label class="text-gray-900 font-weight-bold">Upload Berkas</label>
                      <div class="custom-file">
                          <label for="berkas" class="custom-file-label border-left-primary">Pilih Berkas</label>
                          <input type="file" class="custom-file-input" id="berkas" name="berkas" accept=".pdf">
                      </div>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <div class="form-group">
                            <label for="ket" class="text-gray-900 font-weight-bold">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" required></textarea>
                            <small id="ket" class="text-gray-700">Diisi dengan catatan-catatan lain yang dianggap perlu</small>
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

