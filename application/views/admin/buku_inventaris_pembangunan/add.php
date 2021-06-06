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
                <?=form_open_multipart(base_url('hasil_inventaris/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>

                <div class="form-row">
                
                <div class="col-lg-6 ">
                <div class="form-group">
                        <label for="nama_hasil"><b>Jenis/Nama Hasil Pembangunan</b></label>
                        <input type="text" name="nama_hasil" id="nama_hasil" class="form-control border-left-primary" placeholder=" " required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="volume"><b>Volume</b></label>
                        <input type="text" name="volume" id="volume" class="form-control border-left-primary " placeholder="Volume bangunan" required>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="biaya"><b>Biaya</b></label>
                        <input type="text" name="biaya" id="biaya" class="form-control border-left-primary" placeholder="Total biaya kegiatan" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="lokasi"><b>Lokasi</b></label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control border-left-primary" placeholder="Lokasi bagunanan" rows="2" required>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
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