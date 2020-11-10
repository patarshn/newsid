        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row ">
            <div class="col-xl-12 col-lg-12  ">
              <div class="card shadow mb-4 border-bottom-info">
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
          <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div> 
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12 ">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit <?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body  border-bottom-info ">
                
                <?php 
                  echo form_open(base_url($folder.'/update'),'id="form"');
                  foreach($data as $d):
                ?>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>
                
                <div class="form-row">
                    <div class="col-lg-6 ">
                    <div class="form-group">
                        <label for="nama_hasil"><b>Jenis/Nama Hasil Pembangunan</b></label>
                        <input type="text" name="nama_hasil" id="nama_hasil" class="form-control border-left-info" placeholder=" " value="<?=$d->nama_hasil?>" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="volume"><b>Volume</b></label>
                        <input type="text" name="volume" id="volume" class="form-control border-left-info " placeholder="volume" value="<?=$d->volume?>" required>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="biaya"><b>Biaya</b></label>
                        <input type="text" name="biaya" id="biaya" class="form-control border-left-info" placeholder="biaya" value="<?=$d->biaya?>" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="lokasi"><b>Lokasi</b></label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control border-left-info" placeholder="lokasi" rows="2" value="<?=$d->lokasi?>" required>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
                            <textarea class="form-control border-left-info" name="ket" id="ket" rows="3"><?=$d->ket?></textarea>
                        </div>                   
                    </div>
                </div>
              <?php
                endforeach;
                form_close();
              ?>
                  <div class="d-flex mt-3">
                    <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/<?=$uri[2]?>/update','#form')">Simpan</button>
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

