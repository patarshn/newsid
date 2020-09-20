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
                ?>
                <h4>Data Anak :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                    <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>
                        <label for="nama_anak">Nama</label>
                        <input type="text" name="nama_anak" id="nama_anak" class="form-control" placeholder="Nama"  value="<?=$d->nama_anak?>" required>
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
                        <label for="jenis_kelamin_anak">Jenis Kelamin</label>
                        <select name="jenis_kelamin_anak" id="jenis_kelamin_anak" class="form-control" placeholder="Jenis Kelamin" required>
                            <option>-</option>
                            <option value="PEREMPUAN" <?= $d->jenis_kelamin_anak == "PEREMPUAN" ? "selected": "" ?>>Perempuan</option>
                            <option value="LAKI-LAKI" <?= $d->jenis_kelamin_anak == "LAKI-LAKI" ? "selected": "" ?>>Laki-Laki</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_anak">Agama</label>
                        <input type="text" name="agama_anak" id="agama_anak" class="form-control" value="<?=$d->agama_anak?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="ke_anak">Anak Ke-</label>
                        <input type="text" name="ke_anak" id="ke_anak" class="form-control" value="<?=$d->ke_anak?>" required>
                    </div>
                </div>
                <h4>Data Ayah :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_ayah">NIK</label>
                        <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" placeholder="NIK" value="<?=$d->nik_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_ayah">Nama</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" placeholder="Nama" value="<?=$d->nama_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_ayah">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_ayah">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_ayah">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" value="<?=$d->pekerjaan_ayah?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_ayah">Agama</label>
                        <input type="text" name="agama_ayah" id="agama_ayah" class="form-control" value="<?=$d->agama_ayah?>" required>
                    </div>
                </div>
                <h4>Data Ibu :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_ibu">NIK</label>
                        <input type="text" name="nik_ibu" id="nik_ibu" class="form-control" placeholder="NIK" value="<?=$d->nik_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_ibu">Nama</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Nama" value="<?=$d->nama_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_ibu">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_ibu">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_ibu">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" value="<?=$d->pekerjaan_ibu?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_ibu">Agama</label>
                        <input type="text" name="agama_ibu" id="agama_ibu" class="form-control" value="<?=$d->agama_ibu?>" required>
                    </div>
                </div>
                <h4>Alamat :</h4>
                <div class="form-row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"><?=$d->alamat?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon">Pekon</label>
                        <input type="text" name="pekon" id="pekon" class="form-control" value="<?=$d->pekon?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="<?=$d->kecamatan?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="<?=$d->kabupaten?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" id="rt" class="form-control" value="<?=$d->rt?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" id="rw" class="form-control" value="<?=$d->rw?>" required>
                    </div>

                
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

