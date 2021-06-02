        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-primary">
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
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url()?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body border-bottom-primary">
                <?php echo form_open(base_url('apbd/update'),'id="form"');
                foreach($data as $d):
                ?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <input type="hidden" name="id" id="id" value="<?=$d->id?>"><div class="form-row">
                    <div class="col-lg-3 mt-2">
                        <label for="tahun_anggaran" class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <input type="date" name="tahun_anggaran" id="tahun_anggaran" class="form-control" value="<?=$d->tahun_anggaran?>" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="bidang" class="text-gray-900 font-weight-bold">Bidang</label>
                        <input type="text" name="bidang" id="bidang" class="form-control" value="<?=$d->bidang?>" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <div class="form-group">
                            <label for="kode_rekening" class="text-gray-900 font-weight-bold">Kode Rekening</label>
                            <select name="kode_rekening" id="kode_rekening" class="form-control" required>
                                <option>-</option>
                                
                                <?php   
                                foreach($data as $d):
                                    $kode = $d->kode_rekening1."-".$d->kode_rekening2."-".$d->kode_rekening3."-".$d->kode_rekening4;
                                    echo "<option value='$kode'>$kode</option>"; 
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 mt-2">
                        <label for="kegiatan" class="text-gray-900 font-weight-bold">Kegiatan</label>
                        <input type="text" name="kegiatan" id="kegiatan" class="form-control" value="<?=$d->kegiatan?>" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="waktu_pelaksanaan" class="text-gray-900 font-weight-bold">Waktu Pelaksanaan</label>
                        <input type="date" name="waktu_pelaksanaan" id="waktu_pelaksanaan" class="form-control" value="<?=$d->waktu_pelaksanaan?>" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="uraian" class="text-gray-900 font-weight-bold">Uraian</label>
                        <input type="text" name="uraian" id="uraian" class="form-control" value="<?=$d->uraian?>" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="volume" class="text-gray-900 font-weight-bold">Volume</label>
                        <input type="text" name="volume" id="volume" class="form-control" value="<?=$d->volume?>" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="harga_satuan" class="text-gray-900 font-weight-bold">Harga Satuan</label>
                        <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" value="<?=$d->harga_satuan?>" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="jumlah" class="text-gray-900 font-weight-bold">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?=$d->jumlah?>" required>
                    </div>

                    <div class="col-lg-12 form-inline">
                        <label for="status" class="mr-sm-2">Verifikasi Kepala Desa : </label>
                        <br>
                        <input type="hidden" name="ver_kepala_desa_old" value="<?=$d->ver_kepala_desa?>">
                        <div class="form-check form-check-inline">
                          <input type="radio" name="ver_kepala_desa" id="ver_kepala_desa1" value="Pending" class="form-control" <?php if($d->ver_kepala_desa == "Pending"){echo "checked";}?>>
                          <label class="form-check-label" for="ver_kepala_desa1">Pending</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="ver_kepala_desa" id="ver_kepala_desa2" value="Disetujui" class="form-control" <?php if($d->ver_kepala_desa == "Disetujui"){echo "checked";}?>>
                          <label class="form-check-label" for="ver_kepala_desa2">Disetujui</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="ver_kepala_desa" id="ver_kepala_desa3" value="Ditolak" class="form-control" <?php if($d->ver_kepala_desa == "Ditolak"){echo "checked";}?>>
                          <label class="form-check-label" for="ver_kepala_desa3">Ditolak</label>
                        </div>
                    </div>                    
                </div>
                    
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