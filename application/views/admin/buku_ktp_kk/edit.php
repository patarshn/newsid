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
                  <h6 class="m-0 font-weight-bold text-primary"> <?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body  border-bottom-primary ">
                
                <?php 
                  echo form_open(base_url($folder.'/update'),'id="form"');
                  foreach($data as $d):
                ?>
                  <h5 class="modal-title"><center>Data Penduduk Sementara : <?=$d->nama?></h5>
                <br>
                <input type="hidden" name="id" id="id" class="form-control" value="<?=$d->id?>" required>

                <div class="form-row">
                <div class="col-lg-12">
                        <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tahun_ektp">Tahun Pembuatan E-KTP</label>
                        <input type="number" name="tahun_ektp" id="tahun_ektp" class="form-control border-left-primary"  placeholder="Tahun Pembuatan E-KTP"   value="<?=$d->tahun_ektp?>"  required>
                    </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nik">Nomor Induk Penduduk (NIK)</label>
                            <input type="number" name="nik" id="nik" class="form-control border-left-primary" placeholder="Masukan 16 digit nomoe NIK" value="<?=$d->nik?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nkk">Nomor Kartu Keluarga</label>
                            <input type="text" name="nkk" id="nkk" class="form-control border-left-primary"  placeholder="Masukan 16 digit nomor KK" value="<?=$d->nkk?>"required>
                        </div>
                        </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nama">Nama Lengkap/Panggilan</label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-primary" placeholder="Nama Lengkap atau panggilan" value="<?=$d->nama?>" required>
                        </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ayah">Nama Ayah</label>
                            <input type="text" name="ayah" id="ayah" class="form-control border-left-primary"  placeholder="Nama Ayah" value="<?=$d->ayah?>" required>
                        </div>
                        </div>

                        <div class="col-lg-3">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ibu">Nama Ibu</label>
                            <input type="text" name="ibu" id="ibu" class="form-control border-left-primary" placeholder="Nama Ibu"  value="<?=$d->ibu?>" required>
                        </div>
                        </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control border-left-primary" placeholder="Jenis Kelamin" required>
                            <option><?=$d->jenis_kelamin?></option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                        <small id="abb_apb_desa" class="text-gray-700">L = Laki-Laki <br> P = Perempuan</small>
                        </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-primary"  placeholder="Tempat Lahir" value="<?=$d->tempat_lahir?>" required>
                    </div>
                    </div>

                <div class="col-lg-3">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control border-left-primary"  placeholder="Tanggal Lahir" value="<?=$d->tanggal_lahir?>" required>
                        </div>
                        </div>

                <div class="col-lg-3">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="goldar">Golongan Darah</label>
                            <select name="goldar" id="goldar" class="form-control border-left-primary" required>
                            <option><?=$d->goldar?></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        </div>
                    </div>
                                                     
                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control border-left-primary" required>
                            <option><?=$d->agama?></option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Khatolik">Khatolik</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghuchu">Konghuchu</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="pendidikan">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control border-left-primary" required>
                            <option><?=$d->pendidikan?></option> 
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

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-primary" placeholder="Pekerjaan" value="<?=$d->pekerjaan?>" required>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat">Alamat</label>
                            <textarea class="form-control border-left-primary" name="alamat" placeholder="Alamat" id="alamat" rows="2" required><?=$d->alamat?></textarea>
                     </div>
                     </div>

                     <div class="col-lg-1">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="rt">RT</label>
                            <input type="number" class="form-control border-left-primary" name="rt" id="rt"  placeholder="RT" value="<?=$d->rt?>" required>
                     </div>
                     </div>

                     <div class="col-lg-1">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="rw">RW</label>
                            <input type="number" class="form-control border-left-primary" name="rw" id="rw" placeholder="RW" value="<?=$d->rw?>" required>
                     </div>
                     </div>

                     <div class="col-lg-4">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="dusun">Nama Dusun</label>
                            <input type="text" class="form-control border-left-primary" name="dusun" id="dusun" placeholder="Nama Dusun"  value="<?=$d->dusun?>" required>
                     </div>
                     </div>

                     <div class="col-lg-6">
                     <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="status_perkawinan">Status Perkawinan</label>
                            <select name="status_perkawinan" id="status_perkawinan" class="form-control border-left-primary" value="<?=$d->status_perkawinan?>" required>
                            <option><?=$d->status_perkawinan?></option>
                            <option value="K">K</option>
                            <option value="BK">BK</option>
                            <option value="JD">JD</option>
                            <option value="DD">DD</option>
                        </select>
                        <small id="abb_apb_desa" class="text-gray-700 t">K = Kawin ; JD = Janda ; BK = Belum Kawin ; DD = Duda</small>
                        
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="hub_keluarga">Status Hubungan Keluarga</label>
                            <select name="hub_keluarga" id="hub_keluarga" class="form-control border-left-primary" placeholder="" value="<?=$d->hub_keluarga?>" required>
                            <option><?=$d->hub_keluarga?></option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Menantu">Menantu</option>
                            <option value="Cucu">Cucu</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Mertua">Mertua</option>
                            <option value="Famili Lain">Famili Lain</option>
                            <option value="Pembantu">Pembantu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="wn">Kewarganegaraan</b></label>
                        <select name="wn" id="wn" class="form-control border-left-primary" required>
                            <option><?=$d->wn?></option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                    </div>
                   
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" class="text-gray-900 font-weight-bold" for="baca_huruf">Dapat Baca Huruf</b></label>
                        <select name="baca_huruf" id="baca_huruf" class="form-control border-left-primary" required>
                            <option><?=$d->baca_huruf?></option>
                            <option value="L">L</option>
                            <option value="D">D</option>
                            <option value="A">A</option>
                            <option value="AL">AL</option>
                            <option value="AD">AD</option>
                            <option value="ALD">ALD</option>
                        </select>
                        <small id="abb_apb_desa" class="text-gray-700 t">L = Latin ; D = Daerah ; A = Arab ; AL = Arab, Latin ; <br> AD = Arab, Daerah ; ALD = Arab, Latin, Daerah</small>
                    </div>
                   </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_tinggal_desa">Tanggal Tinggal di Desa</b></label>
                        <input type="date" name="tgl_tinggal_desa" id="tgl_tinggal_desa" class="form-control border-left-primary" value="<?=$d->tgl_tinggal_desa?>" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tmpt_ektp_dikeluarkan">Tempat Keluarnya E-KTP</b></label>
                        <input type="text" name="tmpt_ektp_dikeluarkan" id="tmpt_ektp_dikeluarkan" class="form-control border-left-primary" placeholder="Tempat Keluarnya E-KTP" value="<?=$d->tmpt_ektp_dikeluarkan?>" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_ektp_dikeluarkan">Tanggal Keluarnya E-KTP</b></label>
                        <input type="date" name="tgl_ektp_dikeluarkan" id="tgl_ektp_dikeluarkan" class="form-control border-left-primary" placeholder="Tanggal Keluarnya E-KTP" value="<?=$d->tgl_ektp_dikeluarkan?>" required>
                    </div>
                    </div>      
                    

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</b></label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3"><?=$d->ket?></textarea>
                        </div>                   
                    </div>
                </div>
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

