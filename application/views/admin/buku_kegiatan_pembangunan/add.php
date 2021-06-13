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

                <div class="form-row">

                <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="tahun">Tahun Pelaksanaan Kegiatan</label>
                            <input type="number" name="tahun" id="tahun" class="form-control border-left-primary" placeholder="Masukan tahun kegiatan, contoh: 2022" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="id_rencana">Nama Proyek/Kegiatan</label>
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
                            <input type="text" name="volume" id="volume" class="form-control border-left-primary " rows="3" placeholder="Volume bagunan"  required>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="biaya_pemerintah">Biaya Pemerintah</label>
                        <input type="text" name="biaya_pemerintah" id="biaya_pemerintah" class="form-control border-left-primary" placeholder="Besaran biaya pemerintah" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_prov">Biaya Provinsi</label>
                        <input type="text" name="biaya_prov" id="biaya_prov" class="form-control border-left-primary" placeholder="Besaran biaya provinsi" required>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_kab">Biaya Kabupaten</label>
                        <input type="text" name="biaya_kab" id="biaya_kab" class="form-control border-left-primary" placeholder="besaran biaya kabupaten"  required>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_swadaya">Biaya Swadaya</label>
                        <input type="text" name="biaya_swadaya" id="biaya_swadaya" class="form-control border-left-primary" placeholder="Besaran biaya swadaya" required>
                    </div>
                    <br>

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="jumlah_biaya">Jumlah Biaya</label>
                        <input type="text" name="jumlah_biaya" id="jumlah_biaya" class="form-control border-left-primary" placeholder="Total biaya keseluruhan" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="waktu">Waktu Kegiatan</label>
                            <input type="text" name="waktu" id="waktu" class="form-control border-left-primary " placeholder="Waktu kegiatan"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="sifat_kegiatan">Sifat Kegiatan</label>
                            <select name="sifat_kegiatan" id="sifat_kegiatan" class="form-control border-left-primary" placeholder=" " required>
                            <option>- Pilih - </option>
                            <option value="Baru">Baru</option>
                            <option value="Lanjutan">Lanjutan</option>
                        </select>
                        </div>
                    </div>              

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="pelaksana">Pelaksana Kegiatan</label>
                            <input type="text" name="pelaksana" id="pelaksana" class="form-control border-left-primary " placeholder="Pelaksana kegiatan"  required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
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