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
                <h4 class="m-0 font-weight-bold text-primary"><center>Data Penduduk Sementara : <?=$d->nama?></center></h4>
                <br>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>

                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nik"><b>Nomor Induk Penduduk (NIK)</b></label>
                            <input type="number" name="nik" id="nik" class="form-control border-left-info" placeholder="NIK" value="<?=$d->nik?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="pekerjaan"><b>Pekerjaan</b></label>
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-info " placeholder="Pekerjaan" value="<?=$d->pekerjaan?>" required>
                        </div>
                
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama"><b>Nama Lengkap</b></label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-info" placeholder="Nama Lengkat" value="<?=$d->nama?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <label for="datang_dari"><b>Datang Dari (Asal)</b></label>
                            <input type="text" name="datang_dari" id="datang_dari" class="form-control border-left-info " placeholder="Asal Kedatangan" value="<?=$d->datang_dari?>" required>
                        </div>
                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jk"><b>Jenis Kelamin</b></label>
                            <input type="text" name="jk" id="jk" class="form-control border-left-info " placeholder="Jenis Kelamin" value="<?=$d->jk?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="maksud_tujuan"><b>Maksud dan Tujuan</b></label>
                        <input type="text" name="maksud_tujuan" id="maksud_tujuan" class="form-control border-left-info" placeholder="Maksud dan Tujuan Kedatangan" value="<?=$d->maksud_tujuan?>" required>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tmpt_tgl_lahir"><b>Tempat dan Tanggal Lahir</b></label>
                        <input type="text" name="tmpt_tgl_lahir" id="tmpt_tgl_lahir" class="form-control border-left-info" placeholder="Tempat dan Tanggal Lahir" value="<?=$d->tmpt_tgl_lahir?>" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="kebangsaan"><b>Kebangsaan</b></label>
                        <input type="text" name="kebangsaan" id="kebangsaan" class="form-control border-left-info" placeholder="kebangsaan"  value="<?=$d->kebangsaan?>" required>
                        </div>
                    
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_datang"><b>Tanggal Datang</b></label>
                        <input type="date" name="tgl_datang" id="tgl_datang" class="form-control border-left-info" placeholder="" value="<?=$d->tgl_datang?>" required>
                    </div>
                    </div>
                    

                    <div class="col-lg-6">
                            <label for="keturunan"><b>Keturunan</b></label>
                            <input type="text" name="keturunan" id="keturunan" class="form-control border-left-info " placeholder="" value="<?=$d->keturunan?>" required>
                        </div>


                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_pergi"><b>Tanggal Pergi</b></label>
                        <input type="date" name="tgl_pergi" id="tgl_pergi" class="form-control border-left-info" placeholder="" value="<?=$d->tgl_pergi?>" required>
                    </div>
                    </div>
                
                    <div class="col-lg-6">
                            <label for="nama_alamat_datang"><b>Nama dan Alamat yang Didatangi</b></label>
                            <textarea class="form-control border-left-info" name="nama_alamat_datang" id="nama_alamat_datang" rows="1"><?=$d->nama_alamat_datang?></textarea>
                        </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
                            <textarea class="form-control border-left-info" name="ket" id="ket" rows="3"><?=$d->ket?></textarea>
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

