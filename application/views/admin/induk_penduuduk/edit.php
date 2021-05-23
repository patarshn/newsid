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
                  <h6 class="m-0 font-weight-bold text-primary"> <?=$title?></h6>
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
                <h4 class="m-0 font-weight-bold text-primary"><center>Induk Penduduk : <?=$d->nama?></center></h4>
                <br>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>

                <div class="form-row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nik"><b>Nomor Induk Penduduk (NIK)</b></label>
                            <input type="number" name="nik" id="nik" class="form-control border-left-info" placeholder="NIK" value="<?=$d->nik?>" maxlength="16" required>
                        </div>
                    </div> 

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nokk"><b>Nomor Kartu Keluarga (KK)</b></label>
                            <input type="number" name="nokk" id="nokk" class="form-control border-left-info " placeholder="No. KK" value="<?=$d->nokk?>" required>
                        </div>
                    </div>
                
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama"><b>Nama Lengkap/Panggilan</b></label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-info" placeholder="Nama" value="<?=$d->nama?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="wn"><b>Kewarganegaraan</b></label>
                            <input type="text" name="wn" id="wn" class="form-control border-left-info " placeholder="satatus kewarganegaraan" value="<?=$d->wn?>" required>
                        </div>
                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jk"><b>Jenis Kelamin</b></label>
                            <select name="jk" id="jk" class="form-control" placeholder="Jenis Kelamin" required>
                                <option><?=$d->jk?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="stkawin"><b>Startus Perkawinan</b></label>
                        
                        <select name="stkawin" id="stkawin" class="form-control" placeholder="Status Perkawinan" required>
                            <option><?=$d->stkawin?></option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-info" placeholder="" value="<?=$d->tempat_lahir?>" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="pendidikan"><b>Pendidikan Terakhir</b></label>
                        <select name="pendidikan" id="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" required>
                            <option><?=$d->pendidikan?></option>
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
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-info" placeholder="" value="<?=$d->tgl_lahir?>" required>
                    </div>
                    </div>
                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="baca_huruf"><b>Dapat Membaca Huruf</b></label>
                            <select name="baca_huruf" id="baca_huruf" class="form-control" placeholder="" required>
                                <option><?=$d->baca_huruf?></option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                        </select>
                        </div>
                    </div>


                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="agama"><b>Agama</b></label>
                        <select name="agama" id="agama" class="form-control" placeholder="Agama" required>
                            <option><?=$d->agama?></option>
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
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-info " placeholder="kedudukan di keluarga" value="<?=$d->pekerjaan?>" required>
                        </div>
                    </div>
                
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea class="form-control border-left-info" name="alamat" id="alamat" rows="1"><?=$d->alamat?></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="kdd_keluarga"><b>Kedudukan di Keluarga</b></label>
                            <input type="text" name="kdd_keluarga" id="kdd_keluarga" class="form-control border-left-info " placeholder="kedudukan di keluarga" value="<?=$d->kdd_keluarga?>" required>
                        </div>
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

