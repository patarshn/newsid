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
                <h4>Data Anak :</h4>
                <div class="form-row">
                  <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>
                  <div class="col-lg-6">
                        <label for="nik_anak">NIK</label>
                        <input type="text" name="nik_anak" id="nik_anak" class="form-control" placeholder="NIK" value="<?=$d->nik_anak?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_anak">Nama</label>
                        <input type="text" name="nama_anak" id="nama_anak" class="form-control" placeholder="Nama" value="<?=$d->nama_anak?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_anak">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_anak" id="tempat_lahir_anak" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_anak?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_anak">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_anak" id="tanggal_lahir_anak" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_anak?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kewarganegaraan_anak">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan_anak" id="kewarganegaraan_anak" class="form-control" value="<?=$d->kewarganegaraan_anak?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_anak">Agama</label>
                        <input type="text" name="agama_anak" id="agama_anak" class="form-control" value="<?=$d->agama_anak?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_anak">Pekerjaan</label>
                        <input type="text" name="pekerjaan_anak" id="pekerjaan_anak" class="form-control" value="<?=$d->pekerjaan_anak?>">
                    </div>
                </div>
                <h4>Data Orangtua :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_orangtua">NIK</label>
                        <input type="text" name="nik_orangtua" id="nik_orangtua" class="form-control" placeholder="NIK" value="<?=$d->nik_orangtua?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_orangtua">Nama</label>
                        <input type="text" name="nama_orangtua" id="nama_orangtua" class="form-control" placeholder="Nama" value="<?=$d->nama_orangtua?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_orangtua">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_orangtua" id="tempat_lahir_orangtua" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_orangtua?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_orangtua">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_orangtua" id="tanggal_lahir_orangtua" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_orangtua?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kewarganegaraan_orangtua">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan_orangtua" id="kewarganegaraan_orangtua" class="form-control" value="<?=$d->kewarganegaraan_orangtua?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_orangtua">Agama</label>
                        <input type="text" name="agama_orangtua" id="agama_orangtua" class="form-control" value="<?=$d->agama_orangtua?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_orangtua">Pekerjaan</label>
                        <input type="text" name="pekerjaan_orangtua" id="pekerjaan_orangtua" class="form-control" value="<?=$d->pekerjaan_orangtua?>">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"><?=$d->alamat?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon">Pekon</label>
                        <input type="text" name="pekon" id="pekon" class="form-control" value="<?=$d->pekon?>" value="Wonodadi">
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="<?=$d->kecamatan?>" value="Gadingrejo">
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="<?=$d->kabupaten?>" value="Pringsewiu">
                    </div>
                    <div class="col-lg-3">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" id="rt" class="form-control" placeholder="RT" value="<?=$d->rw?>">
                    </div>
                    <div class="col-lg-3">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" id="rw" class="form-control" placeholder="RW" value="<?=$d->rt?>">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Persyaratan</label>
                            <textarea class="form-control" name="persyaratan" id="persyaratan" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_ktp">Upload KTP Pengaju</label>
                            <input type="file" class="form-control-file" id="file_ktp" name="file_ktp">
                            <img id="file_ktp_preview" src="<?=base_url('uploads/'.$folder.'/'.$berkas->file_ktp)?>" width="200px">
                            <input type="hidden" class="form-control-file" id="file_ktp_old" name="file_ktp_old" value="<?=$berkas->file_ktp?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_kk">Upload KK Pengaju</label>
                            <input type="file" class="form-control-file" id="file_kk" name="file_kk">
                            <img id="file_kk_preview" src="<?=base_url('uploads/'.$folder.'/'.$berkas->file_kk)?>" width="200px">
                            <input type="hidden" class="form-control-file" id="file_kk_old" name="file_kk_old" value="<?=$berkas->file_kk?>">
                        </div>
                    </div>
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>"></script>
                    <div class="col-lg-12 form-inline">
                        <label for="status" class="mr-sm-2">Verifikasi Lurah : </label>
                        <input type="hidden" name="verif_lurah_old"  value="<?=$d->verif_lurah?>" class="form-control">
                        <br>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_lurah" id="verif_lurah1" value="Pending" class="form-control" <?php if($d->verif_lurah == "Pending"){echo "checked";}?>>
                          <label class="form-check-label" for="verif_lurah1">Pending</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_lurah" id="verif_lurah2" value="Disetujui" class="form-control" <?php if($d->verif_lurah == "Disetujui"){echo "checked";}?>>
                          <label class="form-check-label" for="verif_lurah2">Disetujui</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_lurah" id="verif_lurah3" value="Ditolak" class="form-control" <?php if($d->verif_lurah == "Ditolak"){echo "checked";}?>>
                          <label class="form-check-label" for="verif_lurah3">Ditolak</label>
                        </div>
                    </div>
                </div>
                <script>
                  $(document).ready(function(){
                    var agama_anak = "<?=$d->agama_anak?>";
                    var agama_orangtua = "<?=$d->agama_orangtua?>";
                    $('#agama_anak').val(agama_anak);
                    $('#agama_orangtua').val(agama_orangtua);
                  });
                </script>
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

