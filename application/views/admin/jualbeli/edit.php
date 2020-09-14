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
                  <h6 class="m-0 font-weight-bold text-primary">Edit Jualbeli</h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form method="POST" id="form" action="<?=base_url('admin/jualbeli/update')?>">
                  <?php foreach($jualbeli as $j):?>
                    <div class="form-row">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$j->id_form_ketjualbeli?>" >
                        <div class="col-lg-6">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" class="form-control" placeholder="NIK" value="<?=$j->nik?>">
                        </div>
                        <div class="col-lg-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$j->nama_penjual?>">
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"><?=$j->alamat?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?=$j->tempat_lahir?>" >
                        </div>
                        <div class="col-lg-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" placeholder="mm/dd/yy" value="<?=$j->tanggal_lahir?>" >
                        </div>
                        <div class="col-lg-6">
                            <label for="agama">Agama</label>
                            <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?=$j->agama?>">
                        </div>
                        <div class="col-lg-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" value="<?=$j->jenis_kelamin?>">
                        </div>
                        <div class="col-lg-6">
                            <label for="goldar">Golongan Darah</label>
                            <input type="text" name="golongan_darah" class="form-control" placeholder="Golongan Darah" value="<?=$j->golongan_darah?>">
                        </div>
                        <div class="col-lg-6">
                            <label for="kebangsaan">Kebangsaan</label>
                            <input type="text" name="kebangsaan" class="form-control" placeholder="Kebangsaan" value="<?=$j->kebangsaan?>">
                        </div>
                        <div class="col-lg-6">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?=$j->pekerjaan?>">
                        </div>
                        <div class="col-lg-6">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" value="<?=$j->pendidikan?>">
                        </div>
                        <div class="col-lg-6">
                            <label for="status">Status Pernikahan</label>
                            <input type="text" name="status_kawin" class="form-control" placeholder="Status Pernikahan" value="<?=$j->status_kawin?>">
                        </div>
                        <div class="col-lg-3">
                            <label for="rw">RW</label>
                            <input type="text" name="id_rw" class="form-control" placeholder="RW" value="<?=$j->id_rt?>">
                        </div>
                        <div class="col-lg-3">
                            <label for="rw">RT</label>
                            <input type="text" name="id_rt" class="form-control" placeholder="RT" value="<?=$j->id_rw?>">
                        </div>
                    </div>
                  <?php endforeach;?>
                  </form>
                  <div class="d-flex mt-3">
                    <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/jualbeli/update','#form')">Simpan</button>
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

