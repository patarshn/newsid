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
                <?=form_open(base_url('buku_mutasi_penduduk/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>

                <div class="form-row">

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="bulan_tahun">Bulan dan Tahun Mutasi</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control border-left-primary" placeholder="" required>
                    </div>
                    </div>

                    <div class="col-lg-6 ">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="nama">Nama</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="nama" id="nama" class="form-control border-left-primary" placeholder="Nama Lengkap Anda" size="50" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="jk">Jenis Kelamin</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <select name="jk" id="jk" class="form-control border-left-primary" placeholder="Jenis Kelamin" required>
                            <option selected value="">- Pilih -</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div> 
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="wn">Kewarganegaraan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <select name="wn" id="wn" class="form-control border-left-primary" placeholder="" required>
                            <option selected value="">- Pilih -</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-primary" placeholder="Tempat Lahir" size="50" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_lahir">Tanggal Lahir</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-primary" placeholder="Tanggal Lahir" required>
                    </div>
                    </div>     

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h4 class="text-gray-900 font-weight-bold"> <br> Penambahan</h4>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="datang">Datang Dari (Tempat/Alamat Asal)</label>
                        <input type="text" name="datang" id="datang" class="form-control border-left-primary" placeholder="Asal tempat dan alamat semula" size="100">
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_datang">Tanggal Datang</label>
                        <input type="date" name="tgl_datang" id="tgl_datang" class="form-control border-left-primary" placeholder="Tanggal datang ke desa"  >
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h4 class="text-gray-900 font-weight-bold"> <br> Pengurangan</h4>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="pindah">Pindah Ke (Lokasi Tujuan)</label>
                        <input type="text" name="pindah" id="pindah" class="form-control border-left-primary" placeholder="Lokasi tujuan pindah" size="100" >
                    </div>
                    </div>


                    <div class="col-lg-6">
                    <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="tgl_pindah">Tanggal Pindah</label>
                          <input type="date" name="tgl_pindah" id="tgl_pindah" class="form-control border-left-primary" placeholder="Tanggal Kepindahan" >
                      </div>
                      </div>

                  
                      <div class="col-lg-6">
                      <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="meninggal">Tempat/Alamat Meninggal</label>
                          <input type="text" name="meninggal" id="meninggal" class="form-control border-left-primary" placeholder="Tempat/Alamat Meninggal" size="100" >
                      </div>
                      </div>

                      <div class="col-lg-6">
                      <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="tgl_meninggal">Tanggal Meninggal</label>
                          <input type="date" name="tgl_meninggal" id="tgl_meninggal" class="form-control border-left-primary" placeholder="" >
                      </div>
                      </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" placeholder="Isikan Keterangan jika diperlukan"></textarea>
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

            