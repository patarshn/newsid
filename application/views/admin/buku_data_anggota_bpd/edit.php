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
                <?php echo form_open(base_url('buku_data_anggota_bpd/update'),'id="form"');
                foreach($data as $d):
                ?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <input type="hidden" name="id" id="id" value="<?=$d->id?>">
                <div class="form-row">
                    <div class="col-lg-6 mt-3">
                        <label for="nama" class="text-gray-900 font-weight-bold">Nama</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="nama" id="nama" class="form-control border-left-primary" value="<?=$d->nama?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="nip" class="text-gray-900 font-weight-bold">NIP</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="number" name="nip" id="nip" class="form-control border-left-primary" value="<?=$d->nip?>" size="18" required>
                        <small id="nip" class="text-gray-700">Diisi dengan nomor induk anggota </small>
                    </div>


                    <div class="col-lg-6 mt-2">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="jenis_kelamin">Jenis Kelamin</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control border-left-primary" placeholder="Jenis Kelamin" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="agama">Agama</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <select name="agama" id="agama" class="form-control border-left-primary" required>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Khatolik">Khatolik</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghuchu">Konghuchu</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="tempat_lahir" class="text-gray-900 font-weight-bold">Tempat Lahir</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-primary" value="<?=$d->tempat_lahir?>" required>
                    </div>

                    <div class="col-lg-6">
                        <label for="tgl_lahir" class="text-gray-900 font-weight-bold">Tanggal Lahir</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-primary" value="<?=$d->tgl_lahir?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="jabatan" class="text-gray-900 font-weight-bold">Jabatan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="jabatan" id="jabatan" class="form-control border-left-primary" value="<?=$d->jabatan?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="pendidikan_terakhir">Pendidikan Terakhir</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control border-left-primary" required>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP/SLTP Sederajat</option>
                            <option value="SMA">SMA/STA Sederajat</option>
                            <option value="SMK">SMK</option>
                            <option value="Sarjana (S1)">Sarjana (S1)</option>
                            <option value="Magister (S2)">Magister (S2)</option>
                            <option value="Doktor (S3)">Doktor (S3)</option>
                            <option value="Tidak Sekolah"> Tidak Sekolah</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-12 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Nomor dan Tanggal Keputusan Pengangkatan</label>
                      <medium id="wajib" class="text-danger">*</medium>
                      <div class="form-row">
                        <div class="col-lg-6">
                          <input type="text" name="no_keputusan_pengangkatan" id="no_keputusan_pengangkatan" class="form-control border-left-primary" value="<?=$d->no_keputusan_pengangkatan?>" required>
                          <small id="no_keputusan_pengangkatan" class="text-gray-700">Nomor Keputusan Pengangkatan</small>
                        </div>

                        <div class="col-lg-6">                        
                          <input type="date" name="tgl_keputusan_pengangkatan" id="tgl_keputusan_pengangkatan" class="form-control border-left-primary" placeholder="mm/dd/yyyy" value="<?=$d->tgl_keputusan_pengangkatan?>" required>
                          <small id="tgl_keputusan_pengangkatan" class="text-gray-700">Tanggal Keputusan Pengangkatan</small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Nomor dan Tanggal Keputusan Pemberhentian</label>
                      <medium id="wajib" class="text-danger">*</medium>
                      <div class="form-row">
                        <div class="col-lg-6">
                          <input type="text" name="no_keputusan_pemberhentian" id="no_keputusan_pemberhentian" class="form-control border-left-primary" value="<?=$d->no_keputusan_pemberhentian?>" required>
                          <small id="no_keputusan_pemberhentian" class="text-gray-700">Nomor Keputusan Pemberhentian</small>
                        </div>

                        <div class="col-lg-6">                        
                          <input type="date" name="tgl_keputusan_pemberhentian" id="tgl_keputusan_pemberhentian" class="form-control border-left-primary" placeholder="mm/dd/yyyy" value="<?=$d->tgl_keputusan_pemberhentian?>" required>
                          <small id="tgl_keputusan_pemberhentian" class="text-gray-700">Tanggal Keputusan Pemberhentian</small>
                        </div>
                      </div>
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

                    <div class="col-lg-12 mt-3">
                        <div class="form-group">
                            <label for="ket" class="text-gray-900 font-weight-bold">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" required><?=$d->ket?></textarea>
                            <small id="ket" class="text-gray-700">Diisi dengan catatan-catatan lain yang dianggap perlu</small>
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

                <script>
                    var agama = "<?=$d->agama?>";
                    $(document).ready(function(){
                        $('#agama').val(agama);
                    });
                </script>


                    
                <?php
                endforeach;
                echo form_close();
                ?>
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
