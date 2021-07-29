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
                <?=form_open_multipart(base_url('kas_pembantu/store'),'id="form"')?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-6 mt-2">
                        <label for="tahun_anggaran" class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tahun_anggaran" id="tahun_anggaran" class="form-control border-left-primary" placeholder="Masukan Tahun Kegiatan, Co: 2021" required>
                    </div>

                    <div class="col-lg-6 mt-2">
                        <label for="tanggal" class="text-gray-900 font-weight-bold">Tanggal</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="tanggal" id="tanggal" class="form-control border-left-primary" required>
                    </div>
                    
                        <div class="col-lg-4 mt-2">
                        <label class="text-gray-900 font-weight-bold" >Pajak</label>
                          <input type="text" name="pajak" id="pajak" class="form-control border-left-primary" placeholder="Uraian Pajak" required>
                          <small id="pajak" class="text-gray-700"></small>
                        </div>
                        
                        <div class="col-lg-4 mt-2">
                        <label class="text-gray-900 font-weight-bold" >RET</label>
                          <input type="text" name="ret" id="ret" class="form-control border-left-primary" placeholder="Uraian Retribusi" required>
                          <small id="ret" class="text-gray-700"></small>
                        </div>

                        <div class="col-lg-4 mt-2">
                        <label class="text-gray-900 font-weight-bold" >PL</label>
                          <input type="text" name="pl" id="pl" class="form-control border-left-primary" placeholder="Uraian Penerimaan Lainnya" required>
                          <small id="pl" class="text-gray-700"></small>
                        </div>
                  

                    <div class="col-lg-6 mt-2">
                        <label for="pemotongan" class="text-gray-900 font-weight-bold">Pemotongan (Rp.)</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="pemotongan" id="pemotongan" class="form-control border-left-primary" placeholder="Rp." onkeypress="return onlyNumberKey(event)" required>
                        <small id="kas_pembantu" class="text-gray-700">contoh : 20000 </small>
                    </div>

                    <div class="col-lg-6 mt-2">
                        <label for="penyetoran" class="text-gray-900 font-weight-bold">Penyetoran (Rp.)</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="penyetoran" id="penyetoran" class="form-control border-left-primary" placeholder="Rp." onkeypress="return onlyNumberKey(event)" required>
                        <small id="kas_pembantu" class="text-gray-700">contoh : 20000 </small>
                    </div>
                </div>
                <?=form_close()?>
                
                  <div class="d-flex mt-2">
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

<script>
    function onlyNumberKey(evt) {
      //Only ASCII character in that range allowed
      var ASCIICode = (evt.which)? evt.which : evt.keycode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;     
    
    }
</script>