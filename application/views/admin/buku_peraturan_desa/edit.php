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
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body border-bottom-primary">
                <?php echo form_open(base_url('buku_peraturan_desa/update'),'id="form"');
                foreach($data as $d):
                ?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <input type="hidden" name="id" id="id" value="<?=$d->id?>">
                <div class="form-row">
                  <div class="col-lg-6 mt-3">
                        <label for="jenis_peraturan_desa" class="text-gray-900 font-weight-bold">Jenis Peraturan Desa</label>
                        <input type="text" name="jenis_peraturan_desa" id="jenis_peraturan_desa" class="form-control" placeholder="Jenis Peraturan Desa" value="<?=$d->jenis_peraturan_desa?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="no_dan_tgl_ditetapkan" class="text-gray-900 font-weight-bold">Nomor dan Tanggal ditetapkan</label>
                        <input type="text" name="no_dan_tgl_ditetapkan" id="no_dan_tgl_ditetapkan" class="form-control" placeholder="Nomor dan Tanggal ditetapkan" value="<?=$d->no_dan_tgl_ditetapkan?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="tentang" class="text-gray-900 font-weight-bold">Tentang</label>
                        <input type="text" name="tentang" id="tentang" class="form-control" placeholder="tentang" value="<?=$d->tentang?>" required>
                    </div>
                    
                    <div class="col-lg-12 mt-3">
                        <div class="form-group">
                            <label for="uraian_singkat" class="text-gray-900 font-weight-bold">Uraian Singkat</label>
                            <textarea class="form-control" name="uraian_singkat" id="uraian_singkat" rows="3" required><?=$d->uraian_singkat?></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="tgl_kesepakatan_peraturan_desa" class="text-gray-900 font-weight-bold">Tanggal Kesepakatan Peraturan Desa</label>
                        <input type="date" name="tgl_kesepakatan_peraturan_desa" id="tgl_kesepakatan_peraturan_desa" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tgl_kesepakatan_peraturan_desa?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="no_dan_tgl_dilaporkan" class="text-gray-900 font-weight-bold">Nomor dan Tanggal Dilaporkan</label>
                        <input type="text" name="no_dan_tgl_dilaporkan" id="no_dan_tgl_dilaporkan" class="form-control" placeholder="Nomor dan Tanggal Dilaporkan" value="<?=$d->no_dan_tgl_dilaporkan?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="no_dan_tgl_diundangkan_dalam_lembaran_desa" class="text-gray-900 font-weight-bold">Nomor dan Tanggal Diundangkan Dalam Lembaran Desa</label>
                        <input type="text" name="no_dan_tgl_diundangkan_dalam_lembaran_desa" id="no_dan_tgl_diundangkan_dalam_lembaran_desa" class="form-control" placeholder="Nomor dan Tanggal Diundangkan Dalam Lembaran Desa" value="<?=$d->no_dan_tgl_diundangkan_dalam_lembaran_desa?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="no_dan_tgl_diundangkan_dalam_berita_desa" class="text-gray-900 font-weight-bold">Nomor dan Tanggal Diundangkan Dalam Berita Desa</label>
                        <input type="text" name="no_dan_tgl_diundangkan_dalam_berita_desa" id="no_dan_tgl_diundangkan_dalam_berita_desa" class="form-control" placeholder="Nomor dan Tanggal Diundangkan Dalam Berita Desa" value="<?=$d->no_dan_tgl_diundangkan_dalam_berita_desa?>" required>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <div class="form-group">
                            <label for="ket" class="text-gray-900 font-weight-bold">Keterangan</label>
                            <textarea class="form-control" name="ket" id="ket" rows="3" required><?=$d->ket?></textarea>
                        </div>
                    </div>
                </div>
                    
                <?php
                endforeach;
                echo form_close();?>
                
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
