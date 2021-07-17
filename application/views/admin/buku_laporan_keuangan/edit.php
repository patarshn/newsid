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
                <?php echo form_open(base_url('buku_laporan_keuangan/update'),'id="form"');
                foreach($data as $d):
                ?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <input type="hidden" name="id" id="id" value="<?=$d->id?>">
                <div class="form-row">
                    <div class="col-lg-6 mt-3">
                        <label for="tgl" class="text-gray-900 font-weight-bold">Tanggal</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="tgl" id="tgl" class="form-control border-left-primary" placeholder="mm/dd/yy" value="<?=$d->tgl?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="uraian" class="text-gray-900 font-weight-bold">Uraian</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="uraian" id="uraian" class="form-control border-left-primary" value="<?=$d->uraian?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="penerimaan" class="text-gray-900 font-weight-bold">Jumlah Penerimaan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="number" name="penerimaan" id="penerimaan" class="form-control border-left-primary" value="<?=$d->penerimaan?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="pengeluaran" class="text-gray-900 font-weight-bold">Jumlah Pengeluaran</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="number" name="pengeluaran" id="pengeluaran" class="form-control border-left-primary" value="<?=$d->pengeluaran?>" required>
                    </div>
                    
                    <div class="col-lg-6 mt-3">
                    <input type="hidden" name="old_file" value=<?=$d->berkas?>>
                    <label class="text-gray-900 font-weight-bold">Upload Berkas</label>
                      <div class="custom-file">
                      <label for="berkas" class="custom-file-label border-left-primary">
                          <?php if ($d->berkas !=null && file_exists (FCPATH. "administrasilainnya/".$folder."/".$d->berkas)):?>
                          <?=$d->berkas?>
                          <?php else :?>
                          Berkas Tidak Ada
                          <?php endif; ?>
                          </label>
                          <input type="file" class="custom-file-input" id="berkas" name="berkas" accept=".pdf">
                          <small id="berkas" class="text-gray-700">Berkas berformat .pdf</small>
                      </div>
                    </div>

                    <div class="col-lg-12 form-inline">
                        <label for="status" class="mr-sm-2">Verifikasi Kepala BPD : </label>
                        <br>
                        <input type="hidden" name="verif_bpd_old" value="<?=$d->verif_bpd?>">
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_bpd" id="verif_bpd1" value="Pending" class="form-control" <?php if($d->verif_bpd == "Pending"){echo "checked";}?>>
                          <label class="form-check-label" for="verif_bpd1">Pending</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_bpd" id="verif_bpd2" value="Disetujui" class="form-control" <?php if($d->verif_bpd == "Disetujui"){echo "checked";}?>>
                          <label class="form-check-label" for="verif_bpd2">Disetujui</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input type="radio" name="verif_bpd" id="verif_bpd3" value="Ditolak" class="form-control" <?php if($d->verif_bpd == "Ditolak"){echo "checked";}?>>
                          <label class="form-check-label" for="verif_bpd3">Ditolak</label>
                        </div>
                    </div>
                </div>


                    
                <?php
                endforeach;
                echo form_close();?>
                <medium id="wajib" class="text-danger">* Wajib diisi</medium> <br>
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
