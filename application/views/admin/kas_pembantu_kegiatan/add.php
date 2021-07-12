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
                <?=form_open_multipart(base_url('apbd/store'),'id="form"')?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-4 mt-2">
                        <label for="tahun_anggaran" class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <input type="text" name="tahun_anggaran" id="tahun_anggaran" class="form-control border-left-primary" placeholder="Tahun kegiatan, co: 2021" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="bidang" class="text-gray-900 font-weight-bold">Bidang</label>
                        <input type="text" name="bidang" id="bidang" class="form-control border-left-primary" placeholder="Nama Bidang" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                            <label for="kode_rekening" class="text-gray-900 font-weight-bold">Kegiatan</label>
                            <select name="kode_rekening" id="kode_rekening" class="form-control border-left-primary" required>
                                <option>-</option>
                                
                                <?php   
                                foreach($data as $d):
                                    $kode = $d->kode_rekening1."-".$d->kode_rekening2."-".$d->kode_rekening3."-".$d->kode_rekening4;
                                    echo "<option value='$kode'>$kode</option>"; 
                                endforeach;
                                ?>
                            </select>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="tanggal" class="text-gray-900 font-weight-bold">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control border-left-primary" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="uraian" class="text-gray-900 font-weight-bold">Uraian</label>
                        <input type="text" name="uraian" id="uraian" class="form-control border-left-primary" placeholder="Uraian Transaksi" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="penerimaan_bendahara" class="text-gray-900 font-weight-bold">Penerimaan Dari Bendahara</label>
                        <input type="number" name="penerimaan_bendahara" id="penerimaan_bendahara" class="form-control border-left-primary" placeholder="Penerimaan dari Bendahara" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="penerimaan_sdm" class="text-gray-900 font-weight-bold">Penerimaan Swadaya Masyarakat</label>
                        <input type="number" name="penerimaan_sdm" id="penerimaan_sdm" class="form-control border-left-primary" placeholder="Penerimaan Swadaya Masyarakat" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="no_bukti" class="text-gray-900 font-weight-bold">No Bukti</label>
                        <input type="text" name="no_bukti" id="no_bukti" class="form-control border-left-primary" placeholder="Nomor Bukti" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="pengeluaran_bbj" class="text-gray-900 font-weight-bold">Pengeluaran Belanja Barang dan Jasa</label>
                        <input type="number" name="pengeluaran_bbj" id="pengeluaran_bbj" class="form-control border-left-primary" placeholder="Belanja Barang dan Jasa" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="pengeluaran_bm" class="text-gray-900 font-weight-bold">Pengeluaran Belanja Modal</label>
                        <input type="number" name="pengeluaran_bm" id="pengeluaran_bm" class="form-control border-left-primary" placeholder="Belanja Modal" required>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label for="jumlah" class="text-gray-900 font-weight-bold">Jumlah Pengembalian</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control border-left-primary" placeholder="Jumlah Pengembalian" required>
                    </div>
                    
                        <div class="d-flex mt-3">
                        <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/<?=$uri[2]?>/store','#form')">Simpan</button>
                        <div class="spinner-border m-1 align-self-center text-primary d-none" role="status" id="loading">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- tutup side -->
</div>
</section>