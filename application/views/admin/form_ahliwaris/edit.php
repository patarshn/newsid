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
                ?>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>
                
                <h5>Data Penerima Kuasa (Pengaju)</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_1">NIK</label>
                        <input type="text" name="nik_1" id="nik_1" class="form-control" placeholder="NIK" value="<?=$d->nik_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_1">Nama</label>
                        <input type="text" name="nama_1" id="nama_1" class="form-control" placeholder="Nama" value="<?=$d->nama_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_1" id="tempat_lahir_1" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_1" id="tanggal_lahir_1" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_1?>" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="agama_1">Agama</label>
                        <select name="agama_1" id="agama_1" class="form-control" placeholder="Agama" required>
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
                        <label for="pekerjaan_1">Pekerjaan</label>
                        <input type="text" name="pekerjaan_1" id="pekerjaan_1" class="form-control" placeholder="Pekerjaan" value="<?=$d->pekerjaan_1?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_1">Alamat</label>
                            <textarea class="form-control" name="alamat_1" id="alamat_1" rows="3"><?=$d->alamat_1?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_1">Pekon</label>
                        <input type="text" name="pekon_1" id="pekon_1" class="form-control" value="Wonodadi" value="<?=$d->pekon_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_1">Kecamatan</label>
                        <input type="text" name="kecamatan_1" id="kecamatan_1" class="form-control" value="Gadingrejo" value="<?=$d->kecamatan_1?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_1">Kabupaten</label>
                        <input type="text" name="kabupaten_1" id="kabupaten_1" class="form-control" value="Pringsewiu" value="<?=$d->kabupaten_1?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_1">RT</label>
                        <input type="text" name="rt_1" id="rt_1" class="form-control" placeholder="RT" value="<?=$d->rt_1?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_1">RW</label>
                        <input type="text" name="rw_1" id="rw_1" class="form-control" placeholder="RW" value="<?=$d->rw_1?>" required>
                    </div>
                    
                </div>
                <h5>Data Pemberi Kuasa</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_2">NIK</label>
                        <input type="text" name="nik_2" id="nik_2" class="form-control" placeholder="NIK" value="<?=$d->nik_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_2">Nama</label>
                        <input type="text" name="nama_2" id="nama_2" class="form-control" placeholder="Nama" value="<?=$d->nama_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_2" id="tempat_lahir_2" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_2" id="tanggal_lahir_2" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_2?>" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="agama_2">Agama</label>
                        <select name="agama_2" id="agama_2" class="form-control" placeholder="Agama" required>
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
                        <label for="pekerjaan_2">Pekerjaan</label>
                        <input type="text" name="pekerjaan_2" id="pekerjaan_2" class="form-control" placeholder="Pekerjaan" value="<?=$d->pekerjaan_2?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_2">Alamat</label>
                            <textarea class="form-control" name="alamat_2" id="alamat_2" rows="3"><?=$d->alamat_2?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_2">Pekon</label>
                        <input type="text" name="pekon_2" id="pekon_2" class="form-control" value="Wonodadi" value="<?=$d->pekon_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_2">Kecamatan</label>
                        <input type="text" name="kecamatan_2" id="kecamatan_2" class="form-control" value="Gadingrejo" value="<?=$d->kecamatan_2?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_2">Kabupaten</label>
                        <input type="text" name="kabupaten_2" id="kabupaten_2" class="form-control" value="Pringsewiu" value="<?=$d->kabupaten_2?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_2">RT</label>
                        <input type="text" name="rt_2" id="rt_2" class="form-control" placeholder="RT" value="<?=$d->rt_2?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_2">RW</label>
                        <input type="text" name="rw_2" id="rw_2" class="form-control" placeholder="RW" value="<?=$d->rw_2?>" required>
                    </div>
                    <div class="col-lg-12 form-inline">
                        <label for="status" class="mr-sm-2">Verifikasi Lurah : </label>
                        <br>
                        <input type="hidden" name="verif_lurah_old" value="<?=$d->verif_lurah?>">
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
                  var agama_1 = "<?=$d->agama_1?>";
                  var agama_2 = "<?=$d->agama_2?>";
                  $('#agama_1').val(agama_1);
                  $('#agama_2').val(agama_2);
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

