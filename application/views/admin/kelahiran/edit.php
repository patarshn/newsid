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
                  <h6 class="m-0 font-weight-bold text-primary">Edit Kelahiran</h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form method="POST" id="form" action="<?=base_url('admin/kelahiran/update')?>">
                  <?php foreach($kelahiran as $k):?>
                    <div class="form-row">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$k->id_form_kelahiran;?>" >
                    <div class="col-lg-6">
                        <label for="kk">Nomor KK</label>
                        <input type="text" name="nkk" class="form-control" placeholder="Nomor KK" value="<?=$k->nkk?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$k->nama?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="rw">RW</label>
                        <select name="id_rw" class="form-control" id="rw">
                            <option>--Pilih--</option>
                            <option>001</option>
                            <option>002</option>
                            <option>003</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="rt">RT</label>
                        <select name="id_rt" class="form-control" id="rt">
                            <option>--Pilih--</option>
                            <option>001</option>
                            <option>002</option>
                            <option>003</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="mm/dd/yy" value="<?=$k->tanggal_lahir?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" class="form-control" id="jk">
                            <option>--Pilih--</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
                    </div>
                    <div class="col-lg-6">
                        <label for="anak">Anak Ke</label>
                        <input type="text" name="anak_ke" class="form-control" placeholder="Anak Ke">
                    </div>
                </div>
                  <?php endforeach;?>
                  </form>
                  <div class="d-flex mt-3">
                    <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/kelahiran/update','#form')">Simpan</button>
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

