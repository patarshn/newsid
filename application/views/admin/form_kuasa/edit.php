        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
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
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit <?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <h3><?=$title?></h3>
                <?php 
                  echo form_open(base_url($folder.'/update'),'id="form"');
                  foreach($data as $d):
                    $berkas = json_decode($d->berkas);
                ?>
                <input type="hidden" name="id" id="id" class="form-control border-left-primary" value="<?=$d->id?>" required>
                
                <h5>Data Pemberi Kuasa (Pengaju)</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nik_1">NIK</label>
                        <input type="text" name="nik_1" id="nik_1" class="form-control border-left-primary" placeholder="NIK" value="<?=$d->nik_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nama_1">Nama</label>
                        <input type="text" name="nama_1" id="nama_1" class="form-control border-left-primary" placeholder="Nama" value="<?=$d->nama_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir_1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_1" id="tempat_lahir_1" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tanggal_lahir_1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_1" id="tanggal_lahir_1" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan_1">Pekerjaan</label>
                        <input type="text" name="pekerjaan_1" id="pekerjaan_1" class="form-control border-left-primary" placeholder="Pekerjaan" value="<?=$d->pekerjaan_1?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat_1">Alamat</label>
                            <textarea class="form-control border-left-primary" name="alamat_1" id="alamat_1" rows="3"><?=$d->alamat_1?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekon_1">Pekon</label>
                        <input type="text" name="pekon_1" id="pekon_1" class="form-control border-left-primary" value="Wonodadi" value="<?=$d->pekon_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kecamatan_1">Kecamatan</label>
                        <input type="text" name="kecamatan_1" id="kecamatan_1" class="form-control border-left-primary" value="Gadingrejo" value="<?=$d->kecamatan_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kabupaten_1">Kabupaten</label>
                        <input type="text" name="kabupaten_1" id="kabupaten_1" class="form-control border-left-primary" value="Pringsewiu" value="<?=$d->kabupaten_1?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rt_1">RT</label>
                        <input type="text" name="rt_1" id="rt_1" class="form-control border-left-primary" placeholder="RT" value="<?=$d->rt_1?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rw_1">RW</label>
                        <input type="text" name="rw_1" id="rw_1" class="form-control border-left-primary" placeholder="RW" value="<?=$d->rw_1?>" required>
                    </div>
                    
                </div>
                <h5>Data Penerima Kuasa</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nik_2">NIK</label>
                        <input type="text" name="nik_2" id="nik_2" class="form-control border-left-primary" placeholder="NIK" value="<?=$d->nik_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nama_2">Nama</label>
                        <input type="text" name="nama_2" id="nama_2" class="form-control border-left-primary" placeholder="Nama" value="<?=$d->nama_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir_2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_2" id="tempat_lahir_2" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tanggal_lahir_2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_2" id="tanggal_lahir_2" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan_2">Pekerjaan</label>
                        <input type="text" name="pekerjaan_2" id="pekerjaan_2" class="form-control border-left-primary" placeholder="Pekerjaan" value="<?=$d->pekerjaan_2?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat_2">Alamat</label>
                            <textarea class="form-control border-left-primary" name="alamat_2" id="alamat_2" rows="3"><?=$d->alamat_2?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekon_2">Pekon</label>
                        <input type="text" name="pekon_2" id="pekon_2" class="form-control border-left-primary" value="Wonodadi" value="<?=$d->pekon_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kecamatan_2">Kecamatan</label>
                        <input type="text" name="kecamatan_2" id="kecamatan_2" class="form-control border-left-primary" value="Gadingrejo" value="<?=$d->kecamatan_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kabupaten_2">Kabupaten</label>
                        <input type="text" name="kabupaten_2" id="kabupaten_2" class="form-control border-left-primary" value="Pringsewiu" value="<?=$d->kabupaten_2?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rt_2">RT</label>
                        <input type="text" name="rt_2" id="rt_2" class="form-control border-left-primary" placeholder="RT" value="<?=$d->rt_2?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rw_2">RW</label>
                        <input type="text" name="rw_2" id="rw_2" class="form-control border-left-primary" placeholder="RW" value="<?=$d->rw_2?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="keterangan">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="keterangan" id="keterangan" rows="3"><?=$d->keterangan?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="notelp">No Telp/WA</label>
                        <input type="text" name="notelp" id="notelp" class="form-control border-left-primary" placeholder="6281245586699" value="<?=$d->notelp?>">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="file_ktp">Upload KTP Pengaju</label>
                            <input type="file" class="form-control-file" id="file_ktp" name="file_ktp">
                            <img id="file_ktp_preview" src="<?=base_url('uploads/'.$folder.'/'.$berkas->file_ktp)?>" width="200px">
                            <input type="hidden" class="form-control-file" id="file_ktp_old" name="file_ktp_old" value="<?=$berkas->file_ktp?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="file_kk">Upload KK Pengaju</label>
                            <input type="file" class="form-control-file" id="file_kk" name="file_kk">
                            <img id="file_kk_preview" src="<?=base_url('uploads/'.$folder.'/'.$berkas->file_kk)?>" width="200px">
                            <input type="hidden" class="form-control-file" id="file_kk_old" name="file_kk_old" value="<?=$berkas->file_kk?>">
                        </div>
                    </div>
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>"></script>
                    <div class="col-lg-12 form-inline">
                        <label class="text-gray-900 font-weight-bold" for="status" class="mr-sm-2">Verifikasi Lurah : </label>
                        <br>
                        <input type="hidden" name="verif_lurah_old" value="<?=$d->verif_lurah?>">
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_lurah" id="verif_lurah1" value="Pending" class="form-control border-left-primary" <?php if($d->verif_lurah == "Pending"){echo "checked";}?>>
                          <label class="text-gray-900 font-weight-bold" class="form-check-label" for="verif_lurah1">Pending</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_lurah" id="verif_lurah2" value="Disetujui" class="form-control border-left-primary" <?php if($d->verif_lurah == "Disetujui"){echo "checked";}?>>
                          <label class="text-gray-900 font-weight-bold" class="form-check-label" for="verif_lurah2">Disetujui</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_lurah" id="verif_lurah3" value="Ditolak" class="form-control border-left-primary" <?php if($d->verif_lurah == "Ditolak"){echo "checked";}?>>
                          <label class="text-gray-900 font-weight-bold" class="form-check-label" for="verif_lurah3">Ditolak</label>
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

