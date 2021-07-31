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
                  foreach($data as $p):
                ?>
                 <h5 class="text-gray-900 font-weight-bold"><center>Data Rencana Pembangunan: <?=$p->nama_proyek?></h5>
                 
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$p->id?>" required>
                <span class="text-danger font-weight-bold">*</span>
                <small class="text-gray-900 font-weight-bold">Wajib Diisi<br></small>
                <br>
                <div class="form-row">

                <div class="col-lg-12">
                    <div class="form-group">
                    <h4 class="text-gray-900 font-weight-bold">Deskripsi Rencana Kegiatan</h4>
                    </div>
                    </div>

                <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="tahun">Tahun Pelaksanaan Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="tahun" id="tahun" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" placeholder="Masukan tahun kegiatan, contoh: 2022" value="<?=$p->tahun?>" size="4" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nama_proyek">Nama Proyek/Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="nama_proyek" id="nama_proyek" class="form-control border-left-primary" placeholder=" " value="<?=$p->nama_proyek?>" size="50" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="pelaksana">Pelaksana Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="pelaksana" id="pelaksana" class="form-control border-left-primary " placeholder="pelaksana" value="<?=$p->pelaksana?>" size="50" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="lokasi">Lokasi</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <textarea class="form-control border-left-primary" name="lokasi" id="lokasi" rows="2"><?=$p->lokasi?></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="manfaat">Manfaat Pembangunan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <textarea class="form-control border-left-primary" name="manfaat" id="manfaat" rows="3"><?=$p->manfaat?></textarea>
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
                        <input type="text" name="biaya_pemerintah" id="biaya_pemerintah" class="form-control biaya_pemerntah-0" onkeyup="sum();"  onkeypress="return onlyNumberKey(event)" placeholder="Besaran biaya pemerintah" value="<?=$p->biaya_pemerintah?>"  required>
                        <small class="text-gray-900 font-weight-bold">Contoh: 1000000 <br></small>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_prov">Biaya Provinsi</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="biaya_prov" id="biaya_prov" class="form-control biaya_prov-0" onkeyup="sum();" onkeypress="return onlyNumberKey(event)" placeholder="Besaran biaya provinsi" value="<?=$p->biaya_prov?>" required>
                        <small class="text-gray-900 font-weight-bold">Contoh: 1000000 <br></small>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_kab">Biaya Kabupaten</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="biaya_kab" id="biaya_kab" class="form-control biaya_kab-0" onkeyup="sum();"  onkeypress="return onlyNumberKey(event)" placeholder="Besaran biaya kabupaten" value="<?=$p->biaya_kab?>" required>
                        <small class="text-gray-900 font-weight-bold">Contoh: 1000000 <br></small>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_swadaya">Biaya Swadaya</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="biaya_swadaya" id="biaya_swadaya" class="form-control biaya_swadaya-0" onkeyup="sum();"  onkeypress="return onlyNumberKey(event)" placeholder="Besaran biaya swadaya" value="<?=$p->biaya_swadaya?>"  required>
                        <small class="text-gray-900 font-weight-bold">Contoh: 1000000 <br></small>
                    </div>
                    <br>

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="jumlah">Jumlah Biaya</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control jumlah-0" placeholder="Total biaya" value="<?=$p->jumlah?>" readonly>
                        </div>
                    </div>
                                                        
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3"><?=$p->ket?></textarea>
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

<script>
      function sum() {
      var biaya_pemerintah = document.getElementById('biaya_pemerintah').value;
      var biaya_prov = document.getElementById('biaya_prov').value;
      var biaya_kab = document.getElementById('biaya_kab').value;
      var biaya_swadaya = document.getElementById('biaya_swadaya').value;
      var result = parseInt(biaya_pemerintah) + parseInt(biaya_prov) + parseInt(biaya_kab) + parseInt(biaya_swadaya);
                
      if (!isNaN(result)) {
         document.getElementById('jumlah').value = result;
      }
}
</script>