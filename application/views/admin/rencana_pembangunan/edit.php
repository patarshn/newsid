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
                  foreach($data as $p):
                ?>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$p->id?>" required>
                
                <div class="form-row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama_proyek"><b>Nama Proyek/Kegiatan</b></label>
                            <input type="text" name="nama_proyek" id="nama_proyek" class="form-control border-left-info" placeholder=" " value="<?=$p->nama_proyek?>" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="lokasi"><b>Lokasi</b></label>
                            <textarea class="form-control border-left-info" name="lokasi" id="lokasi" rows="2"><?=$p->lokasi?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="biaya_pemerintah"><b>Biaya Pemerintah</b></label>
                        <input type="text" name="biaya_pemerintah" id="biaya_pemerintah" class="form-control border-left-info" placeholder="biaya" value="<?=$p->biaya_pemerintah?>" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="biaya_prov"><b>Biaya Provinsi</b></label>
                        <input type="text" name="biaya_prov" id="biaya_prov" class="form-control border-left-info" placeholder="biaya" value="<?=$p->biaya_prov?>" required>
                    </div>

                    <div class="col-lg-3">
                        <label for="biaya_kab"><b>Biaya Kabupaten</b></label>
                        <input type="text" name="biaya_kab" id="biaya_kab" class="form-control border-left-info" placeholder="biaya" value="<?=$p->biaya_kab?>" required>
                    </div>

                    <div class="col-lg-3">
                        <label for="biaya_swadaya"><b>Biaya Swadaya</b></label>
                        <input type="text" name="biaya_swadaya" id="biaya_swadaya" class="form-control border-left-info" placeholder="biaya" value="<?=$p->biaya_swadaya?>" required>
                    </div>
                    <br>

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="jumlah"><b>Jumlah Biaya</b></label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control border-left-info" placeholder="lokasi"  value="<?=$p->jumlah?>" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pelaksana"><b>Pelaksana Kegiatan</b></label>
                            <input type="text" name="pelaksana" id="pelaksana" class="form-control border-left-info " placeholder="pelaksana" value="<?=$p->pelaksana?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="manfaat"><b>Manfaat Pembangunan</b></label>
                            <textarea class="form-control border-left-info" name="manfaat" id="manfaat" rows="3"><?=$p->manfaat?></textarea>
                        </div>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
                            <textarea class="form-control border-left-info" name="ket" id="ket" rows="3"><?=$p->ket?></textarea>
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

