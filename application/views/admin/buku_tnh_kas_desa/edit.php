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
                <?php echo form_open(base_url('buku_inventaris_kekayaan_desa/update'),'id="form"');
                foreach($data as $d):
                ?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <input type="hidden" name="id" id="id" value="<?=$d->id?>">
                <div class="form-row">
                    <div class="col-lg-6 mt-3">
                        <label for="asal_tnh_kas" class="text-gray-900 font-weight-bold">Asal Tanah Kas Desa</label>
                        <input type="text" name="asal_tnh_kas" id="asal_tnh_kas" class="form-control border-left-primary" value="<?=$d->asal_tnh_kas?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="no_serti_letterc_persil" class="text-gray-900 font-weight-bold">Nomor Sertifikat Buku Letter C/Persil</label>
                        <input type="text" name="no_serti_letterc_persil" id="no_serti_letterc_persil" class="form-control border-left-primary" value="<?=$d->no_serti_letterc_persil?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="luas" class="text-gray-900 font-weight-bold">Luas</label>
                        <input type="text" name="luas" id="luas" class="form-control border-left-primary" value="<?=$d->luas?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="kelas" class="text-gray-900 font-weight-bold">Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control border-left-primary" value="<?=$d->kelas?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Perolehan TKD</label>
                      <div class="form-row">
                        <div class="col-lg-3">
                          <input type="text" name="peroleh_asli_milik_desa" id="peroleh_asli_milik_desa" class="form-control border-left-primary" value="<?=$d->peroleh_asli_milik_desa?>" required>
                          <small id="peroleh_asli_milik_desa" class="text-gray-700">Asli Milik Desa</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="bantuan_pem" id="bantuan_pem" class="form-control border-left-primary" value="<?=$d->bantuan_pem?>" required>
                          <small id="bantuan_pem" class="text-gray-700">Bantuan Pemerintah</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="bantuan_prov" id="bantuan_prov" class="form-control border-left-primary" value="<?=$d->bantuan_prov?>" required>
                          <small id="bantuan_prov" class="text-gray-700">Bantuan Provinsi</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="bantuan_kab_kota" id="bantuan_kab_kota" class="form-control border-left-primary" value="<?=$d->bantuan_kab_kota?>" required>
                          <small id="bantuan_kab_kota" class="text-gray-700">Bantuan Kab/Kota</small>
                        </div>

                        <div class="col-lg-3 mt-2">                        
                          <input type="text" name="peroleh_lain" id="peroleh_lain" class="form-control border-left-primary" value="<?=$d->peroleh_lain?>" required>
                          <small id="peroleh_lain" class="text-gray-700">Lain-Lain</small>
                        </div>

                        <div class="col-lg-4 mt-2">                        
                          <input type="date" name="tgl_peroleh" id="tgl_peroleh" class="form-control border-left-primary" value="<?=$d->tgl_peroleh?>" required>
                          <small id="tgl_peroleh" class="text-gray-700">Tanggal Perolehan</small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Jenis TKD</label>
                      <div class="form-row">
                        <div class="col-lg-3">
                          <input type="text" name="jenis_sawah" id="jenis_sawah" class="form-control border-left-primary" value="<?=$d->jenis_sawah?>" required>
                          <small id="jenis_sawah" class="text-gray-700">Sawah</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="jenis_tegal" id="jenis_tegal" class="form-control border-left-primary" value="<?=$d->jenis_tegal?>" required>
                          <small id="jenis_tegal" class="text-gray-700">Tegal</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="jenis_kebun" id="jenis_kebun" class="form-control border-left-primary" value="<?=$d->jenis_kebun?>" required>
                          <small id="jenis_kebun" class="text-gray-700">Kebun</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="jenis_tambak" id="jenis_tambak" class="form-control border-left-primary" value="<?=$d->jenis_tambak?>" required>
                          <small id="jenis_tambak" class="text-gray-700">Tambak/Kolam</small>
                        </div>

                        <div class="col-lg-3 mt-2">                        
                          <input type="text" name="jenis_darat" id="jenis_darat" class="form-control border-left-primary" value="<?=$d->jenis_darat?>" required>
                          <small id="jenis_darat" class="text-gray-700">Tanah Kering/Darat</small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Patok Tanda Batas</label>
                      <div class="form-row">
                        <div class="col-lg-3">
                          <input type="text" name="patok_ada" id="patok_ada" class="form-control border-left-primary" value="<?=$d->patok_ada?>" required>
                          <small id="patok_ada" class="text-gray-700">Ada</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="patok_tdkada" id="patok_tdkada" class="form-control border-left-primary" value="<?=$d->patok_tdkada?>" required>
                          <small id="patok_tdkada" class="text-gray-700">Tidak Ada</small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                      <label class="text-gray-900 font-weight-bold" >Papan Nama</label>
                      <div class="form-row">
                        <div class="col-lg-3">
                          <input type="text" name="papan_ada" id="papan_ada" class="form-control border-left-primary" value="<?=$d->papan_ada?>" required>
                          <small id="papan_ada" class="text-gray-700">Ada</small>
                        </div>

                        <div class="col-lg-3">                        
                          <input type="text" name="papan_tdkada" id="papan_tdkada" class="form-control border-left-primary" value="<?=$d->papan_tdkada?>" required>
                          <small id="papan_tdkada" class="text-gray-700">Tidak Ada</small>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="lokasi" class="text-gray-900 font-weight-bold">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control border-left-primary" value="<?=$d->lokasi?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="peruntukkan" class="text-gray-900 font-weight-bold">Peruntukkan</label>
                        <input type="text" name="peruntukkan" id="peruntukkan" class="form-control border-left-primary" value="<?=$d->peruntukkan?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="mutasi" class="text-gray-900 font-weight-bold">Mutasi</label>
                        <input type="date" name="mutasi" id="mutasi" class="form-control border-left-primary" value="<?=$d->mutasi?>" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                    <input type="hidden" name="old_file" value=<?=$d->berkas?>>
                    <label class="text-gray-900 font-weight-bold">Upload Berkas</label>
                      <div class="custom-file">
                          <label for="berkas" class="custom-file-label border-left-primary"><?=$d->berkas?></label>
                          <input type="file" class="custom-file-input" id="berkas" name="berkas" accept=".pdf">
                      </div>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <div class="form-group">
                            <label for="ket" class="text-gray-900 font-weight-bold border-left-primary">Keterangan</label>
                            <textarea class="form-control" name="ket" id="ket" rows="3" required><?=$d->ket?></textarea>
                        </div>
                    </div>
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
