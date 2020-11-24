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
                <?=form_open(base_url('ktp_kk/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>
                
                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nik"><b>Nomor Induk Penduduk (NIK)</b></label>
                            <input type="number" name="nik" id="nik" class="form-control border-left-info" placeholder="NIK"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="ayah"><b>Nama Ayah</b></label>
                            <input type="text" name="ayah" id="ayah" class="form-control border-left-info " placeholder="ayah" required>
                        </div>

                        <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nokk"><b>Nomor Kartu Keluarga</b></label>
                            <input type="text" name="nokk" id="nokk" class="form-control border-left-info " placeholder="nokk" required>
                        </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="ibu"><b>Nama Ibu</b></label>
                            <input type="text" name="ibu" id="ibu" class="form-control border-left-info " placeholder="ibu"  required>
                        </div>
                
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama"><b>Nama Lengkap</b></label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-info" placeholder="Nama Lengkat"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="stkawin"><b>Status Perkawinan</b></label>
                            <input type="text" name="stkawin" id="stkawin" class="form-control border-left-info " placeholder="Asal Kedatangan" required>
                        </div>
                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jk"><b>Jenis Kelamin</b></label>
                            <input type="text" name="jk" id="jk" class="form-control border-left-info " placeholder="Jenis Kelamin"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="pendidikan"><bPendidikan</b></label>
                        <input type="text" name="pendidikan" id="pendidikan" class="form-control border-left-info" placeholder="Maksud dan Tujuan Kedatangan" required>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-info" placeholder="Tempat Lahir" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="pekerjaan"><b>Pekerjaan</b></label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-info" placeholder=""required>
                    </div>
                    
                    <div class="col-lg-6">
                    <div class="form-group">
                            <label for="tgl_lahir"><b>Tanggal Lahir</b></label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-info " placeholder=""  required>
                        </div>
                        </div>

                    <div class="col-lg-6">
                        <label for="hub_keluarga"><b>Hubungan Keluarga</b></label>
                        <input type="text" name="hub_keluarga" id="hub_keluarga" class="form-control border-left-info" placeholder="" required>
                    </div>


                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="agama"><b>Agama</b></label>
                        <input type="text" name="agama" id="agama" class="form-control border-left-info" placeholder=""  required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea class="form-control border-left-info" name="alamat" id="alamat" rows="1"></textarea>
                        </div>
                
                    <div class="col-lg-6">
                    <div class="form-group">
                            <label for="goldar"><b>Golongan Darah</b></label>
                            <input type="text" class="form-control border-left-info" name="goldar" id="goldar" placeholder="" required>
                        </div>
                        </div>

                    <div class="col-lg-6">
                        <label for="tgl_tinggal_desa"><b>Tanggal Tinggal di Desa</b></label>
                        <input type="date" name="tgl_tinggal_desa" id="tgl_tinggal_desa" class="form-control border-left-info" placeholder=""  required>
                    </div>
                    
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="wn"><b>Kewarganegaraan</b></label>
                        <input type="text" name="wn" id="wn" class="form-control border-left-info" placeholder="" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                            <label for="tmpt_tgl_dikeluarkan"><b>Golongan Darah</b></label>
                            <input type="text" class="form-control border-left-info" name="tmpt_tgl_dikeluarkan" id="tmpt_tgl_dikeluarkan" placeholder=""  required>
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