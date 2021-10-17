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
                <div class="form-row">
                  <input type="hidden" name="id" id="id" class="form-control border-left-primary" value="<?=$d->id?>" required>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nik">NIK<span class="text-danger">*</span></label>
                        <input type="text" name="nik" id="nik" class="form-control border-left-primary" placeholder="NIK" value="<?=$d->nik?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nama">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control border-left-primary" placeholder="Nama" value="<?=$d->nama?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control border-left-primary" placeholder="Jenis Kelamin" required>
                            <option value="">-</option>
                            <option value="PEREMPUAN" <?= $d->jenis_kelamin == "PEREMPUAN" ? "selected": "" ?>>Perempuan</option>
                            <option value="LAKI-LAKI" <?= $d->jenis_kelamin == "LAKI-LAKI" ? "selected": "" ?>>Laki-Laki</option>
                        </select>
                    </div>
                    
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nama">Kewarganegaraan<span class="text-danger">*</span></label>
                        <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control border-left-primary" value="<?=$d->kewarganegaraan?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-primary" value="<?=$d->pekerjaan?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control border-left-primary" name="alamat" id="alamat" rows="3" required><?=$d->alamat?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="jenis_kelamin">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon" id="pekon" class="form-control border-left-primary" value="<?=$d->pekon?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control border-left-primary" value="<?=$d->kecamatan?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control border-left-primary" value="<?=$d->kabupaten?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rt">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt" id="rt" class="form-control border-left-primary" placeholder="RT" value="<?=$d->rt?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rw">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw" id="rw" class="form-control border-left-primary" placeholder="RW" value="<?=$d->rw?>" required>
                    </div>
                </div>
                <h5>Detail Usaha</h5>
                <div class="form-row">
                    <div class="col-lg-12">
                        <label class="text-gray-900 font-weight-bold" for="nama_usaha">Nama Usaha<span class="text-danger">*</span></label>
                        <input type="text" name="nama_usaha" id="nama_usaha" class="form-control border-left-primary" value="<?=$d->nama_usaha?>" placeholder="Nama Usaha">
                    </div>     
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat_usaha">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control border-left-primary" name="alamat_usaha" id="alamat_usaha" rows="3"><?=$d->alamat_usaha?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekon_usaha">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon_usaha" id="pekon_usaha" class="form-control border-left-primary" value="<?=$d->pekon_usaha?>">
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kecamatan_usaha">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan_usaha" id="kecamatan_usaha" class="form-control border-left-primary" value="<?=$d->kecamatan_usaha?>">
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kabupaten_usaha">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten_usaha" id="kabupaten_usaha" class="form-control border-left-primary" value="<?=$d->kabupaten_usaha?>">
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rt_usaha">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt_usaha" id="rt_usaha" class="form-control border-left-primary" value="<?=$d->rt_usaha?>" placeholder="RT">
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rw_usaha">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw_usaha" id="rw_usaha" class="form-control border-left-primary" value="<?=$d->rw_usaha?>" placeholder="RW">
                    </div>     
                    <div class="col-lg-12">
                        <label class="text-gray-900 font-weight-bold" for="persyaratan">Persyaratan<span class="text-danger">*</span></label>
                        <input type="text" name="persyaratan" id="persyaratan" class="form-control border-left-primary" placeholder="Masa Berlaku" value="<?=$d->persyaratan?>">
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="notelp">No Telp/WA<span class="text-danger">*</span></label>
                        <input type="text" name="notelp" id="notelp" class="form-control border-left-primary" placeholder="6281245586699" value="<?=$d->notelp?>">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="file_ktp">Upload KTP Pengaju</label>
                            <input type="file" accept="image/jpeg,image/png" class="form-control-file" id="file_ktp" name="file_ktp">
                            <img id="file_ktp_preview" src="<?=base_url('uploads/'.$folder.'/'.$berkas->file_ktp)?>" width="200px">
                            <input type="hidden" class="form-control-file" id="file_ktp_old" name="file_ktp_old" value="<?=$berkas->file_ktp?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="file_kk">Upload KK Pengaju</label>
                            <input type="file" accept="image/jpeg,image/png" class="form-control-file" id="file_kk" name="file_kk">
                            <img id="file_kk_preview" src="<?=base_url('uploads/'.$folder.'/'.$berkas->file_kk)?>" width="200px">
                            <input type="hidden" class="form-control-file" id="file_kk_old" name="file_kk_old" value="<?=$berkas->file_kk?>">
                        </div>
                    </div>
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>"></script>
                    <div class="col-lg-12 form-inline">
                        <label class="text-gray-900 font-weight-bold" for="status" class="mr-sm-2">Verifikasi Lurah : </label>
                        <br>
                        
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

