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
                <div class="form-row">
                  <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>
                    <div class="col-lg-6">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" value="<?=$d->nik?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?=$d->nama?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" required>
                            <option>-</option>
                            <option value="PEREMPUAN" <?= $d->jenis_kelamin == "PEREMPUAN" ? "selected": "" ?>>Perempuan</option>
                            <option value="LAKI-LAKI" <?= $d->jenis_kelamin == "LAKI-LAKI" ? "selected": "" ?>>Laki-Laki</option>
                        </select>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="nama">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" value="<?=$d->kewarganegaraan?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control" placeholder="Agama" required>
                            <option>-</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" name="status_perkawinan" id="status_perkawinan" class="form-control" placeholder="Status Perkawinan" value="<?=$d->status_perkawinan?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="golongan_darah">Golongan Darah</label>
                        <input type="text" name="golongan_darah" id="golongan_darah" class="form-control" placeholder="Golongan Darah" value="<?=$d->golongan_darah?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="<?=$d->pekerjaan?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?=$d->alamat?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="jenis_kelamin">Pekon</label>
                        <input type="text" name="pekon" id="pekon" class="form-control" value="<?=$d->pekon?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="<?=$d->kecamatan?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan">Kabupaten</label>
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="<?=$d->kabupaten?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" id="rt" class="form-control" placeholder="RT" value="<?=$d->rt?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" id="rw" class="form-control" placeholder="RW" value="<?=$d->rw?>" required>
                    </div>
                    <div class="col-lg-12">
                        <label for="masa_berlaku">Masa Berlaku</label>
                        <input type="text" name="masa_berlaku" id="masa_berlaku" class="form-control" placeholder="Masa Berlaku" value="<?=$d->masa_berlaku?>">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_ktp">Upload KTP Pengaju</label>
                            <input type="file" class="form-control-file" id="file_ktp" name="file_ktp">
                            <img id="file_ktp_preview" src="<?=base_url('uploads/form_belummenikah/'.$berkas->file_ktp)?>" width="200px">
                            <input type="hidden" class="form-control-file" id="file_ktp_old" name="file_ktp_old" value="<?=$berkas->file_ktp?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_kk">Upload KK Pengaju</label>
                            <input type="file" class="form-control-file" id="file_kk" name="file_kk">
                            <img id="file_kk_preview" src="<?=base_url('uploads/form_belummenikah/'.$berkas->file_kk)?>" width="200px">
                            <input type="hidden" class="form-control-file" id="file_kk_old" name="file_kk_old" value="<?=$berkas->file_kk?>">
                        </div>
                    </div>
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>"></script>
                    <div class="col-lg-12 form-inline">
                        <label for="status" class="mr-sm-2">Verifikasi Lurah : </label>
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
                  var agama = "<?=$d->agama?>";
                  $('#agama').val(agama);
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

