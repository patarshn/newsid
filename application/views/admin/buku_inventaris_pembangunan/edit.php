        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row ">
            <div class="col-xl-12 col-lg-12  ">
              <div class="card shadow mb-4 border-bottom-primary">
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
                    <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body  border-bottom-primary ">
                
                <?php 
                  echo form_open(base_url($folder.'/update'),'id="form"');
                  foreach($data as $d):
                ?>
                 <h5  class="text-gray-900 font-weight-bold" class="modal-title"><center>Data Inventaris Hasil Pembangunan : <?=$d->nama_hasil?></h5>
                <br>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>
                <span class="text-danger font-weight-bold">*</span>
                <small class="text-gray-900 font-weight-bold">Wajib Diisi<br></small>
                <br>
                
                <div class="form-row">
                    <div class="col-lg-6 ">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="nama_hasil">Jenis/Nama Hasil Pembangunan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="nama_hasil" id="nama_hasil" class="form-control border-left-primary" placeholder="Nama proyek/kegiatan yang dibangun di Desa" value="<?=$d->nama_hasil?>" size="50" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="volume">Volume</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="volume" id="volume" class="form-control border-left-primary "  placeholder="Besaran proyek/kegiatan" value="<?=$d->volume?>" required>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="biaya">Biaya</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="biaya" id="biaya" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" placeholder="Besaran dukungan biaya atas proyek/kegiatan dimaksud" value="<?=$d->biaya?>" size="30" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="lokasi">Lokasi</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <textarea class="form-control border-left-primary" name="lokasi" id="lokasi" rows="2" placeholder="Lokasi proyek/kegiatan yang dibangun"><?=$d->lokasi?></textarea>
                      </div>   

                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3"  placeholder="Catatan-catatan lain yang dianggap perlu"><?=$d->ket?></textarea>
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

<script>
    function onlyNumberKey(evt) {
      //Only ASCII character in that range allowed
      var ASCIICode = (evt.which)? evt.which : evt.keycode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;     
    
    }
</script>
