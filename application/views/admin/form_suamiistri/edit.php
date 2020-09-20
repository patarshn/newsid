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
                
                <h5>Data Laki-laki/Suami (Pengaju)</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_l">NIK</label>
                        <input type="text" name="nik_l" id="nik_l" class="form-control" placeholder="NIK" value="<?=$d->nik_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_l">Nama</label>
                        <input type="text" name="nama_l" id="nama_l" class="form-control" placeholder="Nama" value="<?=$d->nama_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_l">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_l" id="tempat_lahir_l" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_l">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_l" id="tanggal_lahir_l" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_l?>" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="agama_l">Agama</label>
                        <input type="text" name="agama_l" id="agama_l" class="form-control" placeholder="bin/binti" value="<?=$d->agama_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_l">Pekerjaan</label>
                        <input type="text" name="pekerjaan_l" id="pekerjaan_l" class="form-control" placeholder="Pekerjaan" value="<?=$d->pekerjaan_l?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_l">Alamat</label>
                            <textarea class="form-control" name="alamat_l" id="alamat_l" rows="3"><?=$d->alamat_l?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_l">Pekon</label>
                        <input type="text" name="pekon_l" id="pekon_l" class="form-control" value="Wonodadi" value="<?=$d->pekon_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_l">Kecamatan</label>
                        <input type="text" name="kecamatan_l" id="kecamatan_l" class="form-control" value="Gadingrejo" value="<?=$d->kecamatan_l?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_l">Kabupaten</label>
                        <input type="text" name="kabupaten_l" id="kabupaten_l" class="form-control" value="Pringsewiu" value="<?=$d->kabupaten_l?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_l">RT</label>
                        <input type="text" name="rt_l" id="rt_l" class="form-control" placeholder="RT" value="<?=$d->rt_l?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_l">RW</label>
                        <input type="text" name="rw_l" id="rw_l" class="form-control" placeholder="RW" value="<?=$d->rw_l?>" required>
                    </div>
                    
                </div>
                <h5>Data Perempuan/Istri</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_p">NIK</label>
                        <input type="text" name="nik_p" id="nik_p" class="form-control" placeholder="NIK" value="<?=$d->nik_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_p">Nama</label>
                        <input type="text" name="nama_p" id="nama_p" class="form-control" placeholder="Nama" value="<?=$d->nama_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_p">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_p" id="tempat_lahir_p" class="form-control" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_p">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_p" id="tanggal_lahir_p" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir_p?>" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="agama_p">Agama</label>
                        <input type="text" name="agama_p" id="agama_p" class="form-control" placeholder="bin/binti" value="<?=$d->agama_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_p">Pekerjaan</label>
                        <input type="text" name="pekerjaan_p" id="pekerjaan_p" class="form-control" placeholder="Pekerjaan" value="<?=$d->pekerjaan_p?>" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_p">Alamat</label>
                            <textarea class="form-control" name="alamat_p" id="alamat_p" rows="3"><?=$d->alamat_p?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_p">Pekon</label>
                        <input type="text" name="pekon_p" id="pekon_p" class="form-control" value="Wonodadi" value="<?=$d->pekon_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_p">Kecamatan</label>
                        <input type="text" name="kecamatan_p" id="kecamatan_p" class="form-control" value="Gadingrejo" value="<?=$d->kecamatan_p?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_p">Kabupaten</label>
                        <input type="text" name="kabupaten_p" id="kabupaten_p" class="form-control" value="Pringsewiu" value="<?=$d->kabupaten_p?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_p">RT</label>
                        <input type="text" name="rt_p" id="rt_p" class="form-control" placeholder="RT" value="<?=$d->rt_p?>" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_p">RW</label>
                        <input type="text" name="rw_p" id="rw_p" class="form-control" placeholder="RW" value="<?=$d->rw_p?>" required>
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

