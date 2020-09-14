        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
          
          

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
            <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div>
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?php
                  $segment = $this->uri->segment_array();
                  $uri = base_url();
                  $uriCount = count($segment);
                  $i = 1;
                  foreach ($segment as $s)
                  {
                    //echo $s;
                    //echo '<br />';
                    $uri = $uri.$s.'/';
                    echo '<a href="'.$uri.'">'.ucfirst($s).'</a>';
                    if($i != $uriCount){
                      echo " » ";
                    }
                    $i++;
                  }
                  ?>
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
                  <h6 class="m-0 font-weight-bold text-primary">Edit KK</h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <form method="POST" id="form" action="<?=base_url('admin/kk/update')?>">
                  <?php foreach($kk as $k):?>
                    <div class="form-row">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$k->id_form_kk?>" >
                        <div class="col-lg-6">
                            <label for="nik">NIK</label>
                            <input type="text"  class="form-control" placeholder="NIK" value="<?=$k->nik?>" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" placeholder="Nama" value="<?=$k->nama?>" readonly>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" readonly><?=$k->alamat?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text"  class="form-control" placeholder="Tempat Lahir" value="<?=$k->tempat_lahir?>" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="mm/dd/yy" value="<?=$k->tanggal_lahir?>" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="agama">Agama</label>
                            <input type="text"  class="form-control" placeholder="Agama" value="<?=$k->agama?>" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text"  class="form-control" placeholder="Jenis Kelamin" value="<?=$k->jenis_kelamin?>" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" placeholder="Pekerjaan" value="<?=$k->pekerjaan?>" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" placeholder="Pendidikan" value="<?=$k->pendidikan?>" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="status">Status Pernikahan</label>
                            <input type="text"  class="form-control" placeholder="Status Pernikahan" value="<?=$k->status_perkawinan?>" readonly>
                        </div>
                        <div class="col-lg-3">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" placeholder="RW" value="<?=$k->rt?>" readonly>
                        </div>
                        <div class="col-lg-3">
                            <label for="rw">RT</label>
                            <input type="text"  class="form-control" placeholder="RT" value="<?=$k->rw?>" readonly>
                        </div>
                        <div class="col-lg-6 form-inline">
                            <label for="status" class="mr-sm-2">Verifikasi RT : </label>
                            <br>
                            
                            <div class="form-check form-check-inline">
                              <input type="radio" name="verifikasi_rt" id="verifikasi_rt1" value="Pending" class="form-control" <?php if($k->verifikasi_rt == "Pending"){echo "checked";}?>>
                              <label class="form-check-label" for="verifikasi_rt1">Pending</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="verifikasi_rt" id="verifikasi_rt2" value="Disetujui" class="form-control" <?php if($k->verifikasi_rt == "Disetujui"){echo "checked";}?>>
                              <label class="form-check-label" for="verifikasi_rt2">Disetujui</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="verifikasi_rt" id="verifikasi_rt3" value="Ditolak" class="form-control" <?php if($k->verifikasi_rt == "Ditolak"){echo "checked";}?>>
                              <label class="form-check-label" for="verifikasi_rt3">Ditolak</label>
                            </div>
                        </div>
                        <div class="col-lg-6 form-inline">
                            <label for="status" class="mr-sm-2">Verifikasi RW : </label>
                            <br>
                            
                            <div class="form-check form-check-inline">
                              <input type="radio" name="verifikasi_rw" id="verifikasi_rw1" value="Pending" class="form-control" <?php if($k->verifikasi_rw == "Pending"){echo "checked";}?>>
                              <label class="form-check-label" for="verifikasi_rw1">Pending</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="verifikasi_rw" id="verifikasi_rw2" value="Disetujui" class="form-control" <?php if($k->verifikasi_rw == "Disetujui"){echo "checked";}?>>
                              <label class="form-check-label" for="verifikasi_rw2">Disetujui</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="verifikasi_rw" id="verifikasi_rw3" value="Ditolak" class="form-control" <?php if($k->verifikasi_rw == "Ditolak"){echo "checked";}?>>
                              <label class="form-check-label" for="verifikasi_rw3">Ditolak</label>
                            </div>
                        </div>
                    </div>
                  <?php endforeach;?>
                  </form>
                  <div class="d-flex mt-3">
                    <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/kk/update','#form')">Simpan</button>
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

