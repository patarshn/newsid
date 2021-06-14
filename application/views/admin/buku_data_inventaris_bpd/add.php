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
                <?=form_open_multipart(base_url('buku_data_inventaris_bpd/store'),'id="form"')?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-6 mt-3">
                        <label for="jenis_brng_bangunan" class="text-gray-900 font-weight-bold">Jenis Barang atau Bangunan</label>
                        <input type="text" name="jenis_brng_bangunan" id="jenis_brng_bangunan" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                    <label class="text-gray-900 font-weight-bold">Upload Berkas</label>
                      <div class="custom-file">
                          <label for="berkas" class="custom-file-label border-left-primary">Pilih Berkas</label>
                          <input type="file" class="custom-file-input" id="berkas" name="berkas" accept=".pdf">
                          <small id="berkas" class="text-gray-700">Berkas berformat .pdf</small>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Asal Barang atau Bangunan</label>
                      <div class="form-row">
                        <div class="col-lg-2">
                          <input type="text" name="abb_apb_desa" id="abb_apb_desa" class="form-control border-left-primary" required>
                          <small id="abb_apb_desa" class="text-gray-700">APB Desa</small>
                        </div>
                        
                        <div class="col-lg-2">
                          <input type="text" name="bantuan_pemerintah" id="bantuan_pemerintah" class="form-control border-left-primary" required>
                          <small id="bantuan_pemerintah" class="text-gray-700">Bantuan Pemerintah</small>
                        </div>

                        <div class="col-lg-2">
                          <input type="text" name="bantuan_prov" id="bantuan_prov" class="form-control border-left-primary" required>
                          <small id="bantuan_prov" class="text-gray-700">Bantuan Provinsi</small>
                        </div>
                        
                        <div class="col-lg-2">
                          <input type="text" name="bantuan_kab_kota" id="bantuan_kab_kota" class="form-control border-left-primary" required>
                          <small id="bantuan_kab_kota" class="text-gray-700">Bantuan Kab/Kota</small>
                        </div>
                        
                        <div class="col-lg-2">
                          <input type="text" name="abb_sumbangan" id="abb_sumbangan" class="form-control border-left-primary" required>
                          <small id="abb_sumbangan" class="text-gray-700">Sumbangan</small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Keadaan Barang atau Bangunan Awal Tahun</label>
                      <div class="form-row">
                          <div class="col-lg-3">
                              <input type="text" name="awalthn_baik" id="awalthn_baik" class="form-control border-left-primary" required>
                              <small id="awalthn_baik" class="text-gray-700">Baik</small>
                          </div>
                          
                          <div class="col-lg-3">
                              <input type="text" name="awalthn_rusak" id="awalthn_rusak" class="form-control border-left-primary" required>
                              <small id="awalthn_rusak" class="text-gray-700">Rusak</small>
                          </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Penghapusan Barang dan Bangunan</label>
                      <div class="form-row">
                        <div class="col-lg-2">
                        <input type="text" name="hps_rusak" id="hps_rusak" class="form-control border-left-primary" required>
                        <small id="hps_rusak" class="text-gray-700">Rusak</small>
                        </div>
                        
                        <div class="col-lg-2">
                        <input type="text" name="hps_dijual" id="hps_dijual" class="form-control border-left-primary" required>
                        <small id="hps_dijual" class="text-gray-700">Dijual</small>
                        </div>

                        <div class="col-lg-2">
                        <input type="text" name="hps_disumbangkan" id="hps_disumbangkan" class="form-control border-left-primary" required>
                        <small id="hps_disumbangkan" class="text-gray-700">Disumbangkan</small>
                        </div>
                        
                        <div class="col-lg-4">
                        <input type="date" name="tgl_hapus" id="tgl_hapus" class="form-control border-left-primary" required>
                        <small id="tgl_hapus" class="text-gray-700">Tanggal Penghapusan</small>
                        </div>
                      </div>
                    </div>

                    

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Keadaan Barang atau Bangunan Akhir Tahun</label>
                      <div class="form-row">
                        <div class="col-lg-3">
                          <input type="text" name="akhirthn_baik" id="akhirthn_baik" class="form-control border-left-primary" required>
                          <small id="akhirthn_baik" class="text-gray-700">Baik</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="akhirthn_rusak" id="akhirthn_rusak" class="form-control border-left-primary" required>
                          <small id="akhirthn_rusak" class="text-gray-700">Rusak</small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <div class="form-group">
                            <label for="ket" class="text-gray-900 font-weight-bold">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" required></textarea>
                            <small id="ket" class="text-gray-700">Diisi dengan catatan-catatan lain yang dianggap perlu</small>
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

