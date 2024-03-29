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
                <?=form_open(base_url('kegiatan_pembangunan/store'),'id="form"','enctype="multipart/form-data"')?>
                <h3 class="text-gray-900"></h3>
                <span class="text-danger font-weight-bold">*</span>
                <small class="text-gray-900 font-weight-bold">Wajib Diisi<br></small>
                <br>
                <div class="form-row">

                <div class="col-lg-12">
                    <div class="form-group">
                    <h5 class="text-gray-900 font-weight-bold">Deskripsi Kegiatan</h5>
                    </div>
                    </div>

                <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="tahun">Tahun Pelaksanaan Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="tahun" id="tahun" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" placeholder="Masukan kapan tahun pelaksanaan kegiatan, contoh: 2022" size="4" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="id_rencana">Nama Proyek/Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <select name="id_rencana" id="id_rencana" class="form-control border-left-primary">
                                <option value=" ">- Pilih -</option> 
                                
                                <?php foreach($data_option as $p) : ?>
                                  <option value="<?php echo $p->id;?>"> <?php echo $p->nama_proyek; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="volume">Volume</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="volume" id="volume" class="form-control border-left-primary " rows="3" placeholder="Besaran proyek/kegiatan dimaksud" size="30" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="waktu">Waktu Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="waktu" id="waktu" class="form-control border-left-primary " placeholder="Waktu lamanya proyek/kegiatan akan dilaksanakan" size="50" required>
                        </div>
                    </div>
 
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="sifat_kegiatan">Sifat Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <select name="sifat_kegiatan" id="sifat_kegiatan" class="form-control border-left-primary" placeholder=" " required>
                            <option selected value="">- Pilih - </option>
                            <option value="Baru">Baru</option>
                            <option value="Lanjutan">Lanjutan</option>
                        </select>
                        </div>
                    </div>              

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="pelaksana">Pelaksana Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="pelaksana" id="pelaksana" class="form-control border-left-primary " placeholder="Pelaksana proyek/kegiatan dimaksud" size="30" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5 class="text-gray-900 font-weight-bold"><br>Besaran Perolehan Biaya</h5>
                    <small class="text-gray-900 font-weight-bold">Catatan: Isi Nol (0) jika tidak ada biaya yg diperoleh. <br></small>
                    </div>
                    </div>
                    
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="biaya_pemerintah">Biaya Pemerintah</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="biaya_pemerintah" id="biaya_pemerintah" class="form-control biaya_pemerntah-0" onkeyup="sum();"  onkeypress="return onlyNumberKey(event)" placeholder="Besaran biaya pemerintah" required>
                        <small class="text-gray-900 font-weight-bold">Contoh: 5000000 <br></small>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_prov">Biaya Provinsi</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="biaya_prov" id="biaya_prov" class="form-control biaya_prov-0" onkeyup="sum();" onkeypress="return onlyNumberKey(event)" placeholder="Besaran biaya provinsi"  required>
                        <small class="text-gray-900 font-weight-bold">Contoh: 5000000 <br></small>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_kab">Biaya Kabupaten</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="biaya_kab" id="biaya_kab" class="form-control biaya_kab-0" onkeyup="sum();" onkeypress="return onlyNumberKey(event)" placeholder="Besaran biaya kabupaten"  required>
                        <small class="text-gray-900 font-weight-bold">Contoh: 5000000 <br></small>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_swadaya">Biaya Swadaya</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="biaya_swadaya" id="biaya_swadaya" class="form-control biaya_swadaya-0" onkeyup="sum();"  onkeypress="return onlyNumberKey(event)" placeholder="Besaran biaya swadaya"  required>
                        <small class="text-gray-900 font-weight-bold">Contoh: 5000000 <br></small>
                    </div>
                    <br>

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="jumlah_biaya">Jumlah Biaya</label>
                        <input type="number" name="jumlah_biaya" id="jumlah_biaya" class="form-control jumlah_biaya-0" placeholder="Total biaya" readonly >
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" placeholder="Isi keterangan jika diperlukan"></textarea>
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

<script>
    function onlyNumberKey(evt) {
      //Only ASCII character in that range allowed
      var ASCIICode = (evt.which)? evt.which : evt.keycode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;     
    
    }
</script>

<script>
      function sum() {
      var biaya_pemerintah = document.getElementById('biaya_pemerintah').value;
      var biaya_prov = document.getElementById('biaya_prov').value;
      var biaya_kab = document.getElementById('biaya_kab').value;
      var biaya_swadaya = document.getElementById('biaya_swadaya').value;
      var result = parseInt(biaya_pemerintah) + parseInt(biaya_prov) + parseInt(biaya_kab) + parseInt(biaya_swadaya);

      if (!isNaN(result)) {
         document.getElementById('jumlah_biaya').value = result;
      }
}
</script>