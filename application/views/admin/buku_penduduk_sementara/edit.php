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
                            <label class="text-gray-900 font-weight-bold" for="tahun">Tahun Kedatangan Penduduk</label>
                            <input type="number" name="tahun" id="tahun" class="form-control border-left-primary" placeholder="" value="<?=$d->tahun?>" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="no_identitas">Nomor Induk Penduduk (no_identitas)</label>
                            <input type="number" name="no_identitas" id="no_identitas" class="form-control border-left-primary" placeholder="Nomor indentitas/tanda pengenal" value="<?=$d->no_identitas?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-primary" placeholder="Nama lengkap" value="<?=$d->nama?>" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control border-left-primary"  required>
                            <option><?=$d->jk?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <small id="jk" class="text-gray-700">L = Laki-Laki ; P = Perempuan</small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-primary" placeholder="Tempat dan Tanggal Lahir" value="<?=$d->tempat_lahir?>" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_lahir">Tanggal Lahir </label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-primary" placeholder="" value="<?=$d->tgl_lahir?>" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="umur">Umur </label>
                        <input type="number" name="umur" id="umur" class="form-control border-left-primary" placeholder="Umur" value="<?=$d->umur?>" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="pekerjaan">Pekerjaan</label>
                          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-primary " placeholder="Pekerjaan" value="<?=$d->pekerjaan?>" required>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="text-gray-900 font-weight-bold" for="kebangsaan">Kebangsaan</label>
                      <select name="kebangsaan" id="kebangsaan" class="form-control border-left-primary" placeholder="" value="<?=$d->kebangsaan?>" >
                            <option><?=$d->kebangsaan?></option>
                            <option value="WNI">WNI</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="keturunan">Keturunan</label>
                            <input type="text" name="keturunan" id="keturunan" class="form-control border-left-primary " placeholder="isi disini jika penduduk merupakan WNA" value="<?=$d->keturunan?>" >
                            <small id="jk" class="text-gray-700">note* : isi dengan nama negara asal</small>
                        </div>
                    </div>
                                    
                    <div class="col-lg-12">
                      <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="datang_dari">Datang Dari (Asal)</label>
                          <input type="text" name="datang_dari" id="datang_dari" class="form-control border-left-primary " placeholder="Lokasi/tempat kedatangan asal" value="<?=$d->datang_dari?>" required>
                      </div>
                    </div>                
                 
                    <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="maksud_tujuan">Maksud dan Tujuan</label>
                        <textarea class="form-control border-left-primary" name="maksud_tujuan" id="maksud_tujuan" placeholder="Jelaskan maksud dan tujujuan kedatangan" rows="2" required><?=$d->maksud_tujuan?></textarea>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nama_yg_didatangi">Nama Penduduk yang Didatangi</label>
                            <input typr="text" class="form-control border-left-primary" name="nama_yg_didatangi" id="nama_yg_didatangi" value="<?=$d->nama_yg_didatangi?>"  placeholder="Nama penduduk desa yang didatangi" required>
                        </div>  
                    </div>       

                    <div class="col-lg-6">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat_yg_didatangi">Alamat Penduduk yang Didatangi</label>
                            <textarea class="form-control border-left-primary" name="alamat_yg_didatangi" id="alamat_yg_didatangi"  placeholder="Alamat penduduk desa yang didatangi" rows="1" required><?=$d->alamat_yg_didatangi?></textarea>
                        </div>  
                    </div>                         
                    
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_datang">Tanggal Kedaatangan</label>
                        <input type="date" name="tgl_datang" id="tgl_datang" class="form-control border-left-primary" placeholder="" value="<?=$d->tgl_datang?>" required>
                    </div>
                    </div>                  
                 
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_pergi">Tanggal Kepergian</label>
                        <input type="date" name="tgl_pergi" id="tgl_pergi" class="form-control border-left-primary" placeholder="" value="<?=$d->tgl_pergi?>" required>
                    </div>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
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

