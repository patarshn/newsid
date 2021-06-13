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
                  <h6 class="m-0 font-weight-bold text-primary">Edit <?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body  border-bottom-primary ">
                
                <?php 
                  echo form_open(base_url($folder.'/update'),'id="form"','enctype="multipart/form-data"');
                  foreach($data as $d):
                ?>
                <h5 class="modal-title"><center>Data Kegiatan Penduduk : <?=$d->nama_kegiatan?></h5>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>
                
                <div class="form-row">

                <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="tahun">Tahun Pelaksanaan Kegiatan</label>
                            <input type="number" name="tahun" id="tahun" class="form-control border-left-primary" placeholder="Masukan tahun kegiatan, contoh: 2022" value="<?=$d->tahun?>" required>
                    </div>
                    </div>

                <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="id_rencana">Nama Proyek/Kegiatan</label>
                            <select name="id_rencana" id="id_rencana" class="form-control">
                                <option><?=$d->nama_kegiatan?></option> 
                                
                                <?php foreach($data_option as $p) : ?>
                                  <option value="<?php echo $p->id;?>"> <?php echo $p->nama_proyek; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="volume">Volume</label>
                            <input type="text" name="volume" id="volume" class="form-control border-left-primary " placeholder="volume" value="<?=$d->volume?>" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="biaya_pemerintah">Biaya Pemerintah</label>
                        <input type="text" name="biaya_pemerintah" id="biaya_pemerintah" class="form-control border-left-primary" placeholder="biaya" value="<?=$d->biaya_pemerintah?>" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_prov">Biaya Provinsi</label>
                        <input type="text" name="biaya_prov" id="biaya_prov" class="form-control border-left-primary" placeholder="biaya" value="<?=$d->biaya_prov?>" required>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_kab">Biaya Kabupaten</label>
                        <input type="text" name="biaya_kab" id="biaya_kab" class="form-control border-left-primary" placeholder="biaya" value="<?=$d->biaya_kab?>" required>
                    </div>

                    <div class="col-lg-3">
                        <label class="text-gray-900 font-weight-bold" for="biaya_swadaya">Biaya Swadaya</label>
                        <input type="text" name="biaya_swadaya" id="biaya_swadaya" class="form-control border-left-primary" placeholder="biaya" value="<?=$d->biaya_swadaya?>" required>
                    </div>
                    <br>

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="jumlah">Jumlah Biaya</label>
                        <input type="text" name="jumlah_biaya" id="jumlah_biaya" class="form-control border-left-primary" placeholder="lokasi"  value="<?=$d->jumlah_biaya?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="waktu">Waktu Kegiatan</label>
                            <input type="text" name="waktu" id="waktu" class="form-control border-left-primary " placeholder="waktu" value="<?=$d->waktu?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="sifat_kegiatan">Sifat Kegiatan</label>
                            <select name="sifat_kegiatan" id="sifat_kegiatan" class="form-control border-left-primary" placeholder=" " required>
                            <option><?=$d->sifat_kegiatan?></option>
                            <option value="Baru">Baru</option>
                            <option value="Lanjutan">Lanjutan</option>
                        </select>
                        </div>
                    </div>   

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="pelaksana">Pelaksana Kegiatan</label>
                            <input type="text" name="pelaksana" id="pelaksana" class="form-control border-left-primary " placeholder="pelaksana" value="<?=$d->pelaksana?>" required>
                        </div>
                    </div>

                   
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3"><?=$d->ket?></textarea>
                        </div>                   
                    </div>
                </div>
                
      <script>
                $(document).ready(function(){
                  var id_rencana = "<?=$d->id_rencana?>";
                  console.log(id_rencana);
                  $('#id_rencana').val(id_rencana);
                });
                </script>
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

            