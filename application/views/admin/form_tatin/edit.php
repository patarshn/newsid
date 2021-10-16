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
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?=base_url('admin/'.$folder);?>" class="btn btn-warning">Batal</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <h3><?=$title?></h3>
                <span class="text-danger font-weight-bold">*</span> <small class="text-gray-900 font-weight-bold">Wajib Diisi</small>
                <?php 
                  echo form_open(base_url($folder.'/update'),'id="form"');
                  foreach($data as $d):
                    $berkas = json_decode($d->berkas);
                ?>
                <input type="hidden" name="id" id="id" class="form-control border-left-primary" value="<?=$d->id?>" required>
                <h5>Data Perempuan (Pengaju)/Istri</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nik_p">NIK<span class="text-danger">*</span></label>
                        <input type="text" name="nik_p" id="nik_p" class="form-control border-left-primary" placeholder="NIK" value="<?=$d->nik_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nama_p">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama_p" id="nama_p" class="form-control border-left-primary" placeholder="Nama" value="<?=$d->nama_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir_p">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir_p" id="tempat_lahir_p" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tanggal_lahir_p">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir_p" id="tanggal_lahir_p" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_p?>" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="binbinti_p">Bin/Binti<span class="text-danger">*</span></label>
                        <input type="text" name="binbinti_p" id="binbinti_p" class="form-control border-left-primary" placeholder="bin/binti" value="<?=$d->binbinti_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan_p">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" name="pekerjaan_p" id="pekerjaan_p" class="form-control border-left-primary" placeholder="Pekerjaan" value="<?=$d->pekerjaan_p?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat_p">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control border-left-primary" name="alamat_p" id="alamat_p" rows="3"><?=$d->alamat_p?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekon_p">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon_p" id="pekon_p" class="form-control border-left-primary" value="Wonodadi" value="<?=$d->pekon_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kecamatan_p">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan_p" id="kecamatan_p" class="form-control border-left-primary" value="Gadingrejo" value="<?=$d->kecamatan_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kabupaten_p">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten_p" id="kabupaten_p" class="form-control border-left-primary" value="Pringsewiu" value="<?=$d->kabupaten_p?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rt_p">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt_p" id="rt_p" class="form-control border-left-primary" placeholder="RT" value="<?=$d->rt_p?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rw_p">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw_p" id="rw_p" class="form-control border-left-primary" placeholder="RW" value="<?=$d->rw_p?>" required>
                    </div>
                </div>
                <h5>Data Laki-laki/Suami</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nik_l">NIK<span class="text-danger">*</span></label>
                        <input type="text" name="nik_l" id="nik_l" class="form-control border-left-primary" placeholder="NIK" value="<?=$d->nik_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nama_l">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama_l" id="nama_l" class="form-control border-left-primary" placeholder="Nama" value="<?=$d->nama_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir_l">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir_l" id="tempat_lahir_l" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tanggal_lahir_l">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir_l" id="tanggal_lahir_l" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_l?>" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="binbinti_l">Bin/Binti<span class="text-danger">*</span></label>
                        <input type="text" name="binbinti_l" id="binbinti_l" class="form-control border-left-primary" placeholder="bin/binti" value="<?=$d->binbinti_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan_l">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" name="pekerjaan_l" id="pekerjaan_l" class="form-control border-left-primary" placeholder="Pekerjaan" value="<?=$d->pekerjaan_l?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat_l">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control border-left-primary" name="alamat_l" id="alamat_l" rows="3"><?=$d->alamat_l?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekon_l">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon_l" id="pekon_l" class="form-control border-left-primary" value="Wonodadi" value="<?=$d->pekon_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kecamatan_l">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan_l" id="kecamatan_l" class="form-control border-left-primary" value="Gadingrejo" value="<?=$d->kecamatan_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kabupaten_l">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten_l" id="kabupaten_l" class="form-control border-left-primary" value="Pringsewiu" value="<?=$d->kabupaten_l?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rt_l">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt_l" id="rt_l" class="form-control border-left-primary" placeholder="RT" value="<?=$d->rt_l?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rw_l">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw_l" id="rw_l" class="form-control border-left-primary" placeholder="RW" value="<?=$d->rw_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="notelp">No Telp/WA<span class="text-danger">*</span></label>
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
                    <button type="button" id="btn-submit" class="btn btn-primary active-button align-self-center" onclick="store(base_url+'admin/<?=$uri[2]?>/update','#form')">Simpan</button>
                    <div id="loading" class="d-none">
                        <div class="spinner-border m-1 align-self-center text-primary" role="status" ></div>  
                        <span>Loading...</span>
                    </div>
                    
                    
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

