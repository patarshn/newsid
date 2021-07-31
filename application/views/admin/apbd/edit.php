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
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url()?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body border-bottom-primary">
                <?php echo form_open(base_url('apbd/update'),'id="form"');
                foreach($data as $d):
                ?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <input type="hidden" name="id" id="id" value="<?=$d->id?>">
                <div class="form-row">
                <div class="col-lg-6 mt-3">
                        <label for="tahun_anggaran" class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <input type="text" name="tahun_anggaran" id="tahun_anggaran" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" value="<?=$d->tahun_anggaran?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label for="type" class="text-gray-900 font-weight-bold">Type</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <select name="type" id="type" class="form-control border-left-primary" onchange="kode_rekening()" required>
                                <option><?=$d->type?></option>
                                <option value="PENDAPATAN">Pendapatan</option>
                                <option value="BELANJA">Belanja</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Kode Rekening</label>
                      <div class="form-row">
                        <div class="col-lg-2">
                        <input type="text" id="kode_rekening1" name="kode_rekening1" class="form-control border-left-primary kode_rekening1" value="<?=$d->kode_rekening1?>" diseable />
                          <small id="kode_rekening1" class="text-gray-700"></small>
                        </div>
                        
                        <div class="col-lg-2">
                          <input type="text" name="kode_rekening2" id="kode_rekening2" class="form-control border-left-primary" value="<?=$d->kode_rekening2?>" required>
                          <small id="kode_rekening2" class="text-gray-700"></small>
                        </div>

                        <div class="col-lg-2">
                          <input type="text" name="kode_rekening3" id="kode_rekening3" class="form-control border-left-primary" value="<?=$d->kode_rekening3?>" required>
                          <small id="kode_rekening3" class="text-gray-700"></small>
                        </div>
                        
                        <div class="col-lg-2">
                          <input type="text" name="kode_rekening4" id="kode_rekening4" class="form-control border-left-primary" value="<?=$d->kode_rekening4?>" required>
                          <small id="kode_rekening4" class="text-gray-700"></small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="uraian_apbd" class="text-gray-900 font-weight-bold">Uraian</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="uraian_apbd" id="uraian_apbd" class="form-control border-left-primary" value="<?=$d->uraian_apbd?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="anggaran" class="text-gray-900 font-weight-bold">Anggaran</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="anggaran" id="anggaran" class="form-control border-left-primary" value="<?=$d->anggaran?>" onkeypress="return onlyNumberKey(event)" required>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="keterangan">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="keterangan" id="keterangan" rows="3"><?=$d->keterangan?></textarea>
                        </div>                   
                    </div>               
                </div>
                    
                <?php
                endforeach;
                echo form_close();?>
                
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
    function kode_rekening(){
      var selected = document.getElementById("type");
      if(selected.selectedIndex == 1) {
        $('.kode_rekening1').val(1);
      }
      else if(selected.selectedIndex == 2) {
        $('.kode_rekening1').val(2);
      }
      
      $('.kode_rekening1'). prop("readonly", true);
    }

    function onlyNumberKey(evt) {
      //Only ASCII character in that range allowed
      var ASCIICode = (evt.which)? evt.which : evt.keycode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;     
    }
</script>