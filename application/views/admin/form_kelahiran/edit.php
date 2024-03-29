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
                <h4>Data Anak :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                    <input type="hidden" name="id" id="id" class="form-control border-left-primary" value="<?=$d->id?>" required>
                        <label class="text-gray-900 font-weight-bold" for="nama_anak">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama_anak" id="nama_anak" class="form-control border-left-primary" placeholder="Nama"  value="<?=$d->nama_anak?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir_anak">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir_anak" id="tempat_lahir_anak" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_anak?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tanggal_lahir_anak">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir_anak" id="tanggal_lahir_anak" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_anak?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="jenis_kelamin_anak">Jenis Kelamin<span class="text-danger">*</span></label>
                        <select name="jenis_kelamin_anak" id="jenis_kelamin_anak" class="form-control border-left-primary" placeholder="Jenis Kelamin" required>
                            <option value="">-</option>
                            <option value="PEREMPUAN" <?= $d->jenis_kelamin_anak == "PEREMPUAN" ? "selected": "" ?>>Perempuan</option>
                            <option value="LAKI-LAKI" <?= $d->jenis_kelamin_anak == "LAKI-LAKI" ? "selected": "" ?>>Laki-Laki</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="agama_anak">Agama<span class="text-danger">*</span></label>
                        <select name="agama_anak" id="agama_anak" class="form-control border-left-primary" placeholder="Agama" required>
                            <option value="">-</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="ke_anak">Anak Ke-<span class="text-danger">*</span></label>
                        <input type="text" name="ke_anak" id="ke_anak" class="form-control border-left-primary" value="<?=$d->ke_anak?>" required>
                    </div>
                </div>
                <h4>Data Ayah :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nik_ayah">NIK<span class="text-danger">*</span></label>
                        <input type="text" name="nik_ayah" id="nik_ayah" class="form-control border-left-primary" placeholder="NIK" value="<?=$d->nik_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nama_ayah">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control border-left-primary" placeholder="Nama" value="<?=$d->nama_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir_ayah">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tanggal_lahir_ayah">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan_ayah">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control border-left-primary" value="<?=$d->pekerjaan_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="agama_ayah">Agama<span class="text-danger">*</span></label>
                        <select name="agama_ayah" id="agama_ayah" class="form-control border-left-primary" placeholder="Agama" required>
                            <option value="">-</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <h4>Data Ibu :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nik_ibu">NIK<span class="text-danger">*</span></label>
                        <input type="text" name="nik_ibu" id="nik_ibu" class="form-control border-left-primary" placeholder="NIK" value="<?=$d->nik_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="nama_ibu">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control border-left-primary" placeholder="Nama" value="<?=$d->nama_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir_ibu">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="tanggal_lahir_ibu">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan_ibu">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control border-left-primary" value="<?=$d->pekerjaan_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="agama_ibu">Agama<span class="text-danger">*</span></label>
                        <select name="agama_ibu" id="agama_ibu" class="form-control border-left-primary" placeholder="Agama" required>
                            <option value="">-</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <h4>Alamat :</h4>
                <div class="form-row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control border-left-primary" name="alamat" id="alamat" rows="3"><?=$d->alamat?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="pekon">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon" id="pekon" class="form-control border-left-primary" value="<?=$d->pekon?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kecamatan">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control border-left-primary" value="<?=$d->kecamatan?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-gray-900 font-weight-bold" for="kabupaten">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control border-left-primary" value="<?=$d->kabupaten?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rt">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt" id="rt" class="form-control border-left-primary" value="<?=$d->rt?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="rw">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw" id="rw" class="form-control border-left-primary" value="<?=$d->rw?>" required>
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
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>?<?= date('l jS \of F Y h:i:s A'); ?>"></script>
                
                    <div class="col-lg-12 form-inline">
                        <label class="text-gray-900 font-weight-bold" for="status" class="mr-sm-2">Verifikasi Lurah : </label>
                        <input type="hidden" name="verif_lurah_old"  value="<?=$d->verif_lurah?>" class="form-control border-left-primary">
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

                <script>
                    var agama_anak = "<?=$d->agama_anak?>";
                    var agama_ayah = "<?=$d->agama_ayah?>";
                    var agama_ibu = "<?=$d->agama_ibu?>";
                    $(document).ready(function(){
                        $('#agama_anak').val(agama_anak);
                        $('#agama_ayah').val(agama_ayah);
                        $('#agama_ibu').val(agama_ibu);
                    });
                </script>

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
