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
                <?=form_open(base_url('kader_pemberdayaan/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>

                <div class="form-row">
                    <div class="col-lg-6 ">
                    <div class="form-group">
                        <label for="nama"><b>Nama</b></label>
                        <input type="text" name="nama" id="nama" class="form-control border-left-primary" placeholder="Nama Lengkap Anda" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="umur"><b>Umur</b></label>
                        <input type="text" name="umur" id="umur" class="form-control border-left-primary " placeholder="Umur Anda" required>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="jkelamin"><b>Jenis Kelamin</b></label>
                        <select name="jkelamin" id="jkelamin" class="form-control" placeholder="Jenis Kelamin" required>
                            <option>- Pilih -</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div> 
                    </div>
                    <div class="col-lg-6">
                        <label for="pendidikan"><b>Pendidikan</b></label>
                        <select name="pendidikan" id="pendidikan" class="form-control" placeholder="pendidikan" required>
                            <option>- Pilih -</option> 
                            <option value="SD">SD</option>
                            <option value="SMP">SMP/SLTP Sederajat</option>
                            <option value="SMA">SMA/STA Sederajat</option>
                            <option value="SMK">SMK</option>
                            <option value="Sarjana (S1)">Sarjana (S1)</option>
                            <option value="Magister (S2)">Magister (S2)</option>
                            <option value="Doktor (S3)">Doktor (S3)</option>
                            <option value="Tidak Sekolah"> Tidak Sekolah</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="bidang"><b>Bidang</b></label>
                        <input type="text" name="bidang" id="bidang" class="form-control border-left-primary" placeholder="Posisi bidang saat ini" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="alamat"><b>Alamat</b></label>
                        <input type="text" name="alamat" id="alamat" class="form-control border-left-primary" placeholder="Alamat Anda"  required>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" placeholder="Isi Keterangan (jika ada)"></textarea>
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