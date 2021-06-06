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

                <div class="form-row">

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="bulan_tahun"><b>Bulan dan Tahun Periode</b></label>
                        <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control border-left-primary" placeholder="" required>
                    </div>
                    </div>

                    <div class="col-lg-12 ">
                    <div class="form-group">
                        <label for="dusun"><b>Nam Dusun / Lingkungan</b></label>
                        <input type="text" name="dusun" id="dusun" class="form-control border-left-primary " placeholder="Nama dusun/lingkungan" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <h5 class="border-bottom-primary"></h5>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5><b><center>Jumlah Penduduk Awal Bulan</b><br></h5>
                    </div>
                    </div>
                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="awal_wna_l">WNA Laki-Laki</label>
                        <input type="number" name="awal_wna_l" id="awal_wna_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="awal_wna_p">WNA Perempuan</label>
                        <input type="number" name="awal_wna_p" id="awal_wna_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="awal_wni_l">WNI Laki-Laki</label>
                        <input type="number" name="awal_wni_l" id="awal_wni_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="awal_wni_p">WNI Perempuan</label>
                        <input type="number" name="awal_wni_p" id="awal_wni_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="awal_jml_kk">Jumlah Kartu Keluarga</label>
                        <input type="number" name="awal_jml_kk" id="awal_jml_kk" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="awal_jml_anggota_keluarga">Jumlah Anggota Keluarga</label>
                        <input type="number" name="awal_jml_anggota_keluarga" id="awal_jml_anggota_keluarga" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="awal_jml_jiwa">Jumlah Jiwa</label>
                        <input type="number" name="awal_jml_jiwa" id="awal_jml_jiwa" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <h5 class="border-bottom-primary"></h5>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5><b><center> Penambahan Penduduk (Kelahiran) </b></h5>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tambah_lahir_wna_l">WNA Laki-Laki</label>
                        <input type="number" name="tambah_lahir_wna_l" id="tambah_lahir_wna_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tambah_lahir_wna_p">WNA Perempuan</label>
                        <input type="number" name="tambah_lahir_wna_p" id="tambah_lahir_wna_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tambah_lahir_wni_l">WNI Laki-Laki</label>
                        <input type="number" name="tambah_lahir_wni_l" id="tambah_lahir_wni_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tambah_lahir_wni_p">WNI Perempuan</label>
                        <input type="number" name="tambah_lahir_wni_p" id="tambah_lahir_wni_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5><b><center>Penambahan Penduduk (Kedatangan) </b></h5>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tambah_datang_wna_l">WNA Laki-Laki</label>
                        <input type="number" name="tambah_datang_wna_l" id="tambah_datang_wna_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tambah_datang_wna_p">WNA Perempuan</label>
                        <input type="number" name="tambah_datang_wna_p" id="tambah_datang_wna_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tambah_datang_wni_l">WNI Laki-Laki</label>
                        <input type="number" name="tambah_datang_wni_l" id="tambah_datang_wni_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tambah_datang_wni_p">WNI Perempuan</label>
                        <input type="number" name="tambah_datang_wni_p" id="tambah_datang_wni_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <h5 class="border-bottom-primary"></h5>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5><b><center>Pengurangan Penduduk (Meninggal) </b></h5>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kurang_meninggal_wna_l">WNA Laki-Laki</label>
                        <input type="number" name="kurang_meninggal_wna_l" id="kurang_meninggal_wna_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kurang_meninggal_wna_p">WNA Perempuan</label>
                        <input type="number" name="kurang_meninggal_wna_p" id="kurang_meninggal_wna_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kurang_meninggal_wni_l">WNI Laki-Laki</label>
                        <input type="number" name="kurang_meninggal_wni_l" id="kurang_meninggal_wni_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kurang_meninggal_wni_p">WNI Perempuan</label>
                        <input type="number" name="kurang_meninggal_wni_p" id="kurang_meninggal_wni_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5><b><center>Pengurangan Penduduk (Pindah) </b></h5>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kurang_pindah_wna_l">WNA Laki-Laki</label>
                        <input type="number" name="kurang_pindah_wna_l" id="kurang_pindah_wna_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kurang_pindah_wna_p">WNA Perempuan</label>
                        <input type="number" name="kurang_pindah_wna_p" id="kurang_pindah_wna_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kurang_pindah_wni_l">WNI Laki-Laki</label>
                        <input type="number" name="kurang_pindah_wni_l" id="kurang_pindah_wni_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kurang_pindah_wni_p">WNI Perempuan</label>
                        <input type="number" name="kurang_pindah_wni_p" id="kurang_pindah_wni_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <h5 class="border-bottom-primary"></h5>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <h5><b><center>Jumlah Penduduk Akhir Bulan</b></h5>
                    </div>
                    </div>

                   
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="akhir_wna_l">WNA Laki-Laki</label>
                        <input type="number" name="akhir_wna_l" id="akhir_wna_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="akhir_wna_p">WNA Perempuan</label>
                        <input type="number" name="akhir_wna_p" id="akhir_wna_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="akhir_wni_l">WNI Laki-Laki</label>
                        <input type="number" name="akhir_wni_l" id="akhir_wni_l" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="akhir_wni_p">WNI Perempuan</label>
                        <input type="number" name="akhir_wni_p" id="akhir_wni_p" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="akhir_jml_kk">Jumlah Kartu Keluarga</label>
                        <input type="number" name="akhir_jml_kk" id="akhir_jml_kk" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="akhir_jml_anggota_keluarga">Jumlah Anggota Keluarga</label>
                        <input type="number" name="akhir_jml_anggota_keluarga" id="akhir_jml_anggota_keluarga" class="form-control border-left-primary" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="akhir_jml_jiwa">Jumlah Jiwa</label>
                        <input type="number" name="akhir_jml_jiwa" id="akhir_jml_jiwa" class="form-control border-left-primary" required>
                    </div>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
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
            