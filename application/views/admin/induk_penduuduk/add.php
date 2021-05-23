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
                        <button type="button" class="btn btn-warning">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body border-bottom-primary">
                <?=form_open(base_url('induk_penduduuk/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>

                <div class="form-row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nik"><b>Nomor Induk Penduduk (NIK)</b></label>
                            <input type="number" name="nik" id="nik" class="form-control border-left-info" placeholder="Nomor Induk Kependudukan"  maxlength="16" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nokk"><b>Nomor Kartu Keluarga (KK)</b></label>
                            <input type="number" name="nokk" id="nokk" class="form-control border-left-info " placeholder="Nomor Kartu Keluarga"  max="16" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama"><b>Nama Lengkap/Panggilan</b></label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-info" placeholder="Nama Lengkap atau Panggilan" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="wn"><b>Kewarganegaraan</b></label>
                            <input type="text" name="wn" id="wn" class="form-control border-left-info " placeholder="Status Kewarganegaraan"  required>
                        </div>


                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jk"><b>Jenis Kelamin</b></label>
                            <select name="jk" id="jk" class="form-control" placeholder="Jenis Kelamin" required>
                            <option>- Pilih -</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="stkawin"><b>Status Perkawinan</b></label>
                        <select name="stkawin" id="stkawin" class="form-control" placeholder="Status Perkawinan" required>
                            <option>- Pilih -</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-info" placeholder="Tempat Lahir"  required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="pendidikan"><b>Pendidikan Terakhir</b></label>
                        <select name="pendidikan" id="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" required>
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
                        <label for="tgl_lahir"><b>Tanggal Lahir</b></label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-info" placeholder=""  required>
                    </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="baca_huruf"><b>Dapat Membaca Huruf</b></label>
                            <select name="baca_huruf" id="baca_huruf" class="form-control" placeholder="" required>
                            <option>- Pilih -</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        </div>
                    </div>


                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="agama"><b>Agama</b></label>
                        <select name="agama" id="agama" class="form-control" placeholder="Agama" required>
                            <option>- Pilih -</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghuchu</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pekerjaan"><b>Pekerjaan</b></label>
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-info " placeholder="Pekerjaan"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea class="form-control border-left-info" name="alamat" id="Alamat (Sesuai KTP)" rows="1"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="kdd_keluarga"><b>Kedudukan di Keluarga</b></label>
                            <input type="text" name="kdd_keluarga" id="kdd_keluarga" class="form-control border-left-info " placeholder="Kedudukan di Keluarga" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
                            <textarea class="form-control border-left-info" name="ket" id="ket" rows="3"></textarea>
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