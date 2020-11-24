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
                <?=form_open(base_url('penduduk_sementara/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>
                
                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nik"><b>Nomor Induk Penduduk (NIK)</b></label>
                            <input type="number" name="nik" id="nik" class="form-control border-left-info" placeholder="NIK" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pekerjaan"><b>Pekerjaan</b></label>
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-info " placeholder="Pekerjaan" required>
                        </div>
                    </div>
                
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama"><b>Nama Lengkap</b></label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-info" placeholder="Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="datang_dari"><b>Datang Dari (Asal)</b></label>
                            <input type="text" name="datang_dari" id="datang_dari" class="form-control border-left-info " placeholder="Asal Kedatangan" required>
                        </div>
                    </div>
                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jk"><b>Jenis Kelamin</b></label>
                            <input type="text" name="jk" id="jk" class="form-control border-left-info " placeholder="Jenis Kelamin"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="maksud_tujuan"><b>Maksud dan Tujuan</b></label>
                        <input type="text" name="maksud_tujuan" id="maksud_tujuan" class="form-control border-left-info" placeholder="Maksud dan Tujuan Kedatangan"required>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tmpt_tgl_lahir"><b>Tempat dan Tanggal Lahir</b></label>
                        <input type="text" name="tmpt_tgl_lahir" id="tmpt_tgl_lahir" class="form-control border-left-info" placeholder="Tempat dan Tanggal Lahir"required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="kebangsaan"><b>Kebangsaan</b></label>
                        <input type="text" name="kebangsaan" id="kebangsaan" class="form-control border-left-info" placeholder="kebangsaan terahir"  required>
                        </div>
                    
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_datang"><b>Tanggal Datang</b></label>
                        <input type="date" name="tgl_datang" id="tgl_datang" class="form-control border-left-info" placeholder="" required>
                    </div>
                    </div>
                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="keturunan"><b>Keturunan</b></label>
                            <input type="text" name="keturunan" id="keturunan" class="form-control border-left-info " placeholder=""  required>
                        </div>
                    </div>


                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_pergi"><b>Tanggal Pergi</b></label>
                        <input type="date" name="tgl_pergi" id="tgl_pergi" class="form-control border-left-info" placeholder=""  required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama_alamat_datang"><b>Nama dan Alamat yang Didatangi</b></label>
                            <textarea class="form-control border-left-info" name="nama_alamat_datang" id="nama_alamat_datang" rows="1"></textarea>
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