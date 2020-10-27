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
                <?php echo form_open(base_url('data_kependudukan/store'),'id="form"');
                foreach($data as $d):
                ?>
                <h3><?=$title?></h3>
                <input type="hidden" name="id" id="id" value="<?=$d->id?>">
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nkk">NKK</label>
                        <input type="text" name="nkk" id="nkk" class="form-control" placeholder="NKK" value="<?=$d->nkk?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" value="<?=$d->nik?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?=$d->nama?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" required>
                            <option>-</option>
                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                            <option value="PEREMPUAN">PEREMPUAN</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?=$d->tempat_lahir?>" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="mm/dd/yy" value="<?=$d->tanggal_lahir?>" required>
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
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="<?=$d->pekerjaan?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" name="pendidikan" id="pendidikan" class="form-control" value="<?=$d->pendidikan?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="status_perkawinan">Status Perkawinan</label>
                        <select name="status_perkawinan" id="status_perkawinan" class="form-control" placeholder="Agama" required>
                            <option>-</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Janda/Duda">Janda/Duda</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?=$d->alamat?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" id="rt" class="form-control" placeholder="RT" value="<?=$d->rt?>" required>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" id="rw" class="form-control" placeholder="RW" value="<?=$d->rw?>" required>
                    </div>
                </div>
                    
                <script>
                $(document).ready(function(){
                  var agama = "<?=$d->agama?>";
                  var status_perkawinan = "<?=$d->status_perkawinan?>";
                  var jenis_kelamin = "<?=$d->jenis_kelamin?>";
                  $('#agama').val(agama);
                  $('#status_perkawinan').val(status_perkawinan);
                  $('#jenis_kelamin').val(jenis_kelamin);
                });
                
                </script>

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
