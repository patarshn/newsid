        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row ">
            <div class="col-xl-12 col-lg-12  ">
              <div class="card shadow mb-4 border-bottom-primary">
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
                    <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body  border-bottom-primary ">
                
                <?php 
                  echo form_open(base_url($folder.'/update'),'id="form"');
                  foreach($data as $d):
                ?>
                <h5 class="modal-title"><center>Data Penduduk Sementara : <?=$d->nama?></h5>
                <br>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>

                <div class="form-row">
                <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="bulan_tahun">Bulan dan Tahun Mutasi</label>
                        <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control border-left-primary" placeholder="" value="<?=$d->bulan_tahun?>" required>
                    </div>
                    </div>

                <div class="col-lg-12 ">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control border-left-primary" placeholder="Nama Lengkap Anda" value="<?=$d->nama?>" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option><?=$d->jk?></option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                        <small id="abb_apb_desa" class="text-gray-700">L = Laki-Laki <br> P = Perempuan</small>
                    </div> 
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-primary" value="<?=$d->tempat_lahir?>" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-primary" value="<?=$d->tgl_lahir?>" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="wn">Kewarganegaraan</label>
                        <select name="wn" id="wn" class="form-control border-left-primary" placeholder="" required>
                            <option><?=$d->wn?></option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h4>Penambahan</h4>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="datang">Datang Dari (Tempat/Alamat Asal)</label>
                        <input type="text" name="datang" id="datang" class="form-control border-left-primary" placeholder="Asal tempat dan alamat semula" value="<?=$d->datang?>" >
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_datang">Tanggal Datang</label>
                        <input type="date" name="tgl_datang" id="tgl_datang" class="form-control border-left-primary" placeholder="Tanggal datang ke desa" value="<?=$d->tgl_datang?>" >
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h4>Pengurangan</h4>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="pindah">Pindah Ke (Lokasi Tujuan)</label>
                        <input type="text" name="pindah" id="pindah" class="form-control border-left-primary" placeholder="Lokasi tujuan pindah" value="<?=$d->pindah?>" >
                    </div>
                    </div>


                    <div class="col-lg-6">
                    <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="tgl_pindah">Tanggal Pindah</label>
                          <input type="date" name="tgl_pindah" id="tgl_pindah" class="form-control border-left-primary" placeholder="Tanggal Kepindahan" value="<?=$d->tgl_pindah?>" >
                      </div>
                      </div>

                  
                      <div class="col-lg-6">
                      <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="meninggal">Tempat/Alamat Meninggal</label>
                          <input type="text" name="meninggal" id="meninggal" class="form-control border-left-primary" placeholder="Tempat/Alamat Meninggal" value="<?=$d->meninggal?>" >
                      </div>
                      </div>

                      <div class="col-lg-6">
                      <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="tgl_meninggal">Tanggal Meninggal</label>
                          <input type="date" name="tgl_meninggal" id="tgl_meninggal" class="form-control border-left-primary" placeholder="" value="<?=$d->tgl_meninggal?>" >
                      </div>
                      </div>

                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" placeholder="Isikan Keterangan jika diperlukan"><?=$d->ket?></textarea>
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

