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
                <?=form_open(base_url('buku_rekap_penduduk/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>
                <span class="text-danger font-weight-bold">*</span>
                <small class="text-gray-900 font-weight-bold">Wajib Diisi<br></small>
                <br>
                <div class="form-row">

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="bulan_tahun">Bulan dan Tahun Periode</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control border-left-primary" placeholder="" required>
                    </div>
                    </div>

                    <div class="col-lg-12 ">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="dusun">Nam Dusun / Lingkungan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="dusun" id="dusun" class="form-control border-left-primary" placeholder="Nama dusun/lingkungan" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <h5 class="border-bottom-primary"></h5>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5 class="text-gray-900 font-weight-bold"><center> <br> Jumlah Penduduk Awal Bulan<br></h5>
                    <small id="wajib" class="text-gray-900 font-weight-bold">isi nol (0) jika tidak ada jumlah penduduk.</small>
                    </div>
                    </div>
                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="awal_wna_l">WNA Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="awal_wna_l" id="awal_wna_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="awal_wna_p">WNA Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="awal_wna_p" id="awal_wna_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="awal_wni_l">WNI Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="awal_wni_l" id="awal_wni_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="awal_wni_p">WNI Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="awal_wni_p" id="awal_wni_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="awal_jml_kk">Jumlah Kartu Keluarga</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="awal_jml_kk" id="awal_jml_kk" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="awal_jml_anggota_keluarga">Jumlah Anggota Keluarga</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="awal_jml_anggota_keluarga" id="awal_jml_anggota_keluarga" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="awal_jml_jiwa">Jumlah Jiwa</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="awal_jml_jiwa" id="awal_jml_jiwa" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <h5 class="border-bottom-primary"></h5>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5 class="text-gray-900 font-weight-bold"><center> <br> Penambahan Penduduk (Kelahiran) </h5>
                    <small id="wajib" class="text-gray-900 font-weight-bold">isi nol (0) jika tidak ada jumlah penduduk.</small>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tambah_lahir_wna_l">WNA Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tambah_lahir_wna_l" id="tambah_lahir_wna_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tambah_lahir_wna_p">WNA Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tambah_lahir_wna_p" id="tambah_lahir_wna_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tambah_lahir_wni_l">WNI Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tambah_lahir_wni_l" id="tambah_lahir_wni_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tambah_lahir_wni_p">WNI Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tambah_lahir_wni_p" id="tambah_lahir_wni_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5 class="text-gray-900 font-weight-bold"><center> <br>Penambahan Penduduk (Kedatangan) </h5>
                    <small id="wajib" class="text-gray-900 font-weight-bold">isi nol (0) jika tidak ada jumlah penduduk.</small>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tambah_datang_wna_l">WNA Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tambah_datang_wna_l" id="tambah_datang_wna_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tambah_datang_wna_p">WNA Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tambah_datang_wna_p" id="tambah_datang_wna_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tambah_datang_wni_l">WNI Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tambah_datang_wni_l" id="tambah_datang_wni_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tambah_datang_wni_p">WNI Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tambah_datang_wni_p" id="tambah_datang_wni_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <h5 class="border-bottom-primary"></h5>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5 class="text-gray-900 font-weight-bold"><center> <br>Pengurangan Penduduk (Meninggal) </h5>
                    <small id="wajib" class="text-gray-900 font-weight-bold">isi nol (0) jika tidak ada jumlah penduduk.</small>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="kurang_meninggal_wna_l">WNA Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="kurang_meninggal_wna_l" id="kurang_meninggal_wna_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="kurang_meninggal_wna_p">WNA Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="kurang_meninggal_wna_p" id="kurang_meninggal_wna_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="kurang_meninggal_wni_l">WNI Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="kurang_meninggal_wni_l" id="kurang_meninggal_wni_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="kurang_meninggal_wni_p">WNI Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="kurang_meninggal_wni_p" id="kurang_meninggal_wni_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5 class="text-gray-900 font-weight-bold"><center> <br>Pengurangan Penduduk (Pindah) </h5>
                    <small id="wajib" class="text-gray-900 font-weight-bold">isi nol (0) jika tidak ada jumlah penduduk.</small>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="kurang_pindah_wna_l">WNA Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="kurang_pindah_wna_l" id="kurang_pindah_wna_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="kurang_pindah_wna_p">WNA Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="kurang_pindah_wna_p" id="kurang_pindah_wna_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="kurang_pindah_wni_l">WNI Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="kurang_pindah_wni_l" id="kurang_pindah_wni_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="kurang_pindah_wni_p">WNI Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="kurang_pindah_wni_p" id="kurang_pindah_wni_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <h5 class="border-bottom-primary"></h5>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5 class="text-gray-900 font-weight-bold"><center> <br>Jumlah Penduduk Akhir Bulan</h5>
                    <small id="wajib" class="text-gray-900 font-weight-bold">isi nol (0) jika tidak ada jumlah penduduk.</small>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="akhir_wna_l">WNA Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="akhir_wna_l" id="akhir_wna_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="akhir_wna_p">WNA Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="akhir_wna_p" id="akhir_wna_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="akhir_wni_l">WNI Laki-Laki</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="akhir_wni_l" id="akhir_wni_l" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="akhir_wni_p">WNI Perempuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="akhir_wni_p" id="akhir_wni_p" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="akhir_jml_kk">Jumlah Kartu Keluarga</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="akhir_jml_kk" id="akhir_jml_kk" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="akhir_jml_anggota_keluarga">Jumlah Anggota Keluarga</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="akhir_jml_anggota_keluarga" id="akhir_jml_anggota_keluarga" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="akhir_jml_jiwa">Jumlah Jiwa</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="akhir_jml_jiwa" id="akhir_jml_jiwa" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" placeholder="Isikan Keterangan jika diperlukan"></textarea>
                        </div>                   
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
      
<script>
    function onlyNumberKey(evt) {
      //Only ASCII character in that range allowed
      var ASCIICode = (evt.which)? evt.which : evt.keycode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;     
    
    }
</script>   