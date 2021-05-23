        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row ">
            <div class="col-xl-12 col-lg-12  ">
              <div class="card shadow mb-4 border-bottom-info">
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
            <div class="col-xl-12 col-lg-12 ">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> <?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body  border-bottom-info ">
                
                <?php 
                  echo form_open(base_url($folder.'/update'),'id="form"');
                  foreach($data as $d):
                ?>
                <h4 class="m-0 font-weight-bold text-primary"><center>Data Mutasi Sementara : <?=$d->nama?></center></h4>
                <br>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>

                <div class="form-row">
                <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama"><b>Nama Lengkap/Panggilan</b></label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-info" placeholder="Nama Lengkap" value="<?=$d->nama?>"required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="datang_dari"><b>Datang Dari (Asal)</b></label>
                            <input type="text" name="datang_dari" id="datang_dari" class="form-control border-left-info " placeholder="Asal Kedatangan" value="<?=$d->datang_dari?>">
                        </div>
                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jk"><b>Jenis Kelamin</b></label>
                            <input type="text" name="jk" id="jk" class="form-control border-left-info " placeholder="Jenis Kelamin" value="<?=$d->jk?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="tgl_datang"><b>Tanggal Datang</b></label>
                        <input type="date" name="tgl_datang" id="tgl_datang" class="form-control border-left-info" placeholder="" value="<?=$d->tgl_datang?>">
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-info" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir?>" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="pindah"><b>Pindah Ke</b></label>
                            <input type="text" name="pindah" id="pindah" class="form-control border-left-info " placeholder="Asal Kedatangan" value="<?=$d->pindah?>">
                        </div>


                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_lahir"><b>Tanggal Lahir</b></label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-info" placeholder="Tanggal Lahir" value="<?=$d->tgl_lahir?>"required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="tgl_pindah"><b>Tanggal Pindah</b></label>
                        <input type="date" name="tgl_pindah" id="tgl_pindah" class="form-control border-left-info" placeholder="" value="<?=$d->tgl_pindah?>">
                    </div>
                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="wn"><b>Kewarganegaraan</b></label>
                            <input type="text" name="wn" id="wn" class="form-control border-left-info " placeholder="Kewarganegaraan" value="<?=$d->wn?>" required>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="meninggal"><b>Tempat Meninggal</b></label>
                        <input type="text" name="meninggal" id="meninggal" class="form-control border-left-info" placeholder="Tempat Meninggal" value="<?=$d->meninggal?>">
                    </div>

                    <div class="col-lg-3">
                        <label for="tgl_meninggal"><b>Tanggal Meninggal</b></label>
                        <input type="date" name="tgl_meninggal" id="tgl_meninggal" class="form-control border-left-info" placeholder="Tanggal Meninggal" value="<?=$d->tgl_meninggal?>">
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
                            <textarea class="form-control border-left-info" name="ket" id="ket" rows="3" value="<?=$d->ket?>"></textarea>
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

