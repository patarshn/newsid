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
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body border-bottom-primary">
                <?=form_open_multipart(base_url('kas_umum/store'),'id="form"')?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-3 mt-2">
                        <label for="tanggal" class="text-gray-900 font-weight-bold">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="kode_rekening" class="text-gray-900 font-weight-bold">Kode Rekening</label>
                        <input type="text" name="kode_rekening" id="kode_rekening" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="uraian" class="text-gray-900 font-weight-bold">Uraian</label>
                        <input type="text" name="uraian" id="uraian" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="penerimaan" class="text-gray-900 font-weight-bold">Penerimaan</label>
                        <input type="text" name="penerimaan" id="penerimaan" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="pengeluaran" class="text-gray-900 font-weight-bold">Pengeluaran</label>
                        <input type="text" name="pengeluaran" id="pengeluaran" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="no_bukti" class="text-gray-900 font-weight-bold">No Bukti</label>
                        <input type="text" name="no_bukti" id="no_bukti" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="jumlah_komulatif" class="text-gray-900 font-weight-bold">Jumlah Pengeluaran Komulatif</label>
                        <input type="text" name="jumlah_komulatif" id="jumlah_komulatif" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="saldo" class="text-gray-900 font-weight-bold">Saldo</label>
                        <input type="text" name="saldo" id="saldo" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="tahun_anggaran" class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <input type="date" name="tahun_anggaran" id="tahun_anggaran" class="form-control" required>
                    </div>
                </div>
                <?=form_close()?>
                
                <div class="d-flex mt-2">
                    <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/<?=$uri[2]?>/store','#form')">Simpan</button>
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