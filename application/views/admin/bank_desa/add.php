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
                <?=form_open_multipart(base_url('bank_desa/store'),'id="form"')?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-6 mt-3">
                        <label for="tahun_anggaran" class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <input type="text" name="tahun_anggaran" id="tahun_anggaran" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="bulan" class="text-gray-900 font-weight-bold">Bulan</label>
                        <input type="text" name="bulan" id="bulan" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="bank_cabang" class="text-gray-900 font-weight-bold">Bank Cabang</label>
                        <input type="text" name="bank_cabang" id="bank_cabang" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="rekening" class="text-gray-900 font-weight-bold">Rekening. No</label>
                        <input type="text" name="rekening" id="rekening" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="tgl_trans" class="text-gray-900 font-weight-bold">Tanggal Transaksi</label>
                        <input type="date" name="tgl_trans" id="tgl_trans" class="form-control border-left-primary" placeholder="mm/dd/yy"  required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="uraian_trans" class="text-gray-900 font-weight-bold">Uraian Transaksi</label>
                        <input type="text" name="uraian_trans" id="uraian_trans" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                    <label class="text-gray-900 font-weight-bold">Upload Berkas</label>
                      <div class="custom-file">
                          <label for="bukti_trans" class="custom-file-label border-left-primary">Pilih Bukti Transaksi</label>
                          <input type="file" class="custom-file-input" id="bukti_trans" name="bukti_trans">
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="pmskn_setoran" class="text-gray-900 font-weight-bold">Setoran</label>
                        <input type="text" name="pmskn_setoran" id="pmskn_setoran" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="pmskn_bungabank" class="text-gray-900 font-weight-bold">Bunga Bank</label>
                        <input type="text" name="pmskn_bungabank" id="pmskn_bungabank" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="pngl_penarikan" class="text-gray-900 font-weight-bold">Penarikan</label>
                        <input type="text" name="pngl_penarikan" id="pngl_penarikan" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="pngl_pajak" class="text-gray-900 font-weight-bold">Pajak</label>
                        <input type="text" name="pngl_pajak" id="pngl_pajak" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="pngl_biaya_adm" class="text-gray-900 font-weight-bold">Biaya Administrasi</label>
                        <input type="text" name="pngl_biaya_adm" id="pngl_biaya_adm" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="saldo" class="text-gray-900 font-weight-bold">Saldo</label>
                        <input type="text" name="saldo" id="saldo" class="form-control border-left-primary" required>
                    </div>
                </div>
                <?=form_close()?>
                
                  <div class="d-flex mt-3">
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