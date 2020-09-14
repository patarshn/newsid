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
                  <h6 class="m-0 font-weight-bold text-primary">Edit Kematian</h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form method="POST" id="form" action="<?=base_url('admin/kematian/update')?>">
                  <?php foreach($kematian as $k):?>
                    <div class="form-row">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$k->id_form_kematian;?>" >
                    <div class="col-lg-6">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" placeholder="NIK" required value="<?=$k->nik?>">
                    </div>
                    <div class="col-lg-6">
                          <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" readonly value="<?=$k->nama?>">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="3" required><?=$k->alamat?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="rw">RW</label>
                        <input type="text" name="id_rw" class="form-control" placeholder="RW" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="rt">RT</label>
                        <input type="text" name="id_rt" class="form-control" placeholder="RT" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="mm/dd/yy" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="agama">Agama</label>
                        <input type="text" name="agama" class="form-control" placeholder="Agama" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_kematian">Tanggal Kematian</label>
                        <input type="date" name="tanggal_kematian" class="form-control" placeholder="mm/dd/yy">
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_kematian">Tempat Kematian</label>
                        <input type="text" name="tempat_kematian" class="form-control" placeholder="Tempat Kematian">
                    </div>
                    <div class="col-lg-6">
                        <label for="penyebab">Penyebab Kematian</label>
                        <input type="text" name="penyebab_kematian" class="form-control" placeholder="Penyebab Kematian">
                    </div>
                </div>
                  <?php endforeach;?>
                  </form>
                  <div class="d-flex mt-3">
                    <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/kematian/update','#form')">Simpan</button>
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

