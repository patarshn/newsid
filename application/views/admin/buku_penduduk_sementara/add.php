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
                <?=form_open(base_url('buku_penduduk_sementara/store'),'id="form"')?>
                <h3 class="text-gray-900"></h3>
                
                <div class="form-row">
                <div class="col-lg-12">
                        <div class="form-group">
                            <label for="tahun"><b>Tahun Kedatangan Penduduk</b></label>
                            <input type="number" name="tahun" id="tahun" class="form-control border-left-primary" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="no_identitas"><b>Nomor Induk Penduduk (no_identitas)</b></label>
                            <input type="number" name="no_identitas" id="no_identitas" class="form-control border-left-primary" placeholder="Nomor identitas/tanda pengenal"  required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama"><b>Nama</b></label>
                            <input type="text" name="nama" id="nama" class="form-control border-left-primary" placeholder="Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jk"><b>Jenis Kelamin</b></label>
                            <select name="jk" id="jk" class="form-control border-left-primary" placeholder="Jenis Kelamin" required>
                            <option>- Pilih -</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                        <small id="jk" class="text-gray-700">L = Laki-Laki ; P = Perempuan</small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-primary" placeholder="Tempat Lahir"  required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir </label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-primary" placeholder=""  required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label for="umur">Umur </label>
                        <input type="number" name="umur" id="umur" class="form-control border-left-primary" placeholder="Umur" required>
                    </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                          <label for="pekerjaan"><b>Pekerjaan</b></label>
                          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-primary " placeholder="Pekerjaan"  required>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="kebangsaan"><b>Kebangsaan</b></label>
                      <select name="kebangsaan" id="kebangsaan" class="form-control border-left-primary" placeholder="" >
                            <option>- Isi disini jika penduduk adalah WNI -</option>
                            <option value="WNI">WNI</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                            <label for="keturunan"><b>Keturunan</b></label>
                            <input type="text" name="keturunan" id="keturunan" class="form-control border-left-primary " placeholder="isi disini jika penduduk merupakan WNA" >
                            <small id="jk" class="text-gray-700">note* : isi dengan nama negara asal</small>
                        </div>
                    </div>
                                    
                    <div class="col-lg-12">
                      <div class="form-group">
                          <label for="datang_dari"><b>Datang Dari (Asal)</b></label>
                          <input type="text" name="datang_dari" id="datang_dari" class="form-control border-left-primary " placeholder="Lokasi/tempat kedatangan asal" required>
                          
                      </div>
                    </div>                
                 
                    <div class="col-lg-12">
                    <div class="form-group">
                        <label for="maksud_tujuan"><b>Maksud dan Tujuan</b></label>
                        <textarea class="form-control border-left-primary" name="maksud_tujuan" id="maksud_tujuan" placeholder="Jelaskan maksud dan tujujuan kedatangan" rows="2"></textarea>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                            <label for="nama_yg_didatangi"><b>Nama Penduduk yang Didatangi</b></label>
                            <input typr="text" class="form-control border-left-primary" name="nama_yg_didatangi" id="nama_yg_didatangi" placeholder="Nama penduduk desa yang didatangi" required>
                        </div>  
                    </div>       

                    <div class="col-lg-6">
                    <div class="form-group">
                            <label for="alamat_yg_didatangi"><b>Alamat Penduduk yang Didatangi</b></label>
                            <textarea class="form-control border-left-primary" name="alamat_yg_didatangi" id="alamat_yg_didatangi" placeholder="Alamat penduduk desa yang didatangi" rows="1" required></textarea>
                        </div>  
                    </div>                         
                    
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_datang"><b>Tanggal Kedaatangan</b></label>
                        <input type="date" name="tgl_datang" id="tgl_datang" class="form-control border-left-primary" placeholder="" required>
                    </div>
                    </div>                  
                 
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_pergi"><b>Tanggal Kepergian</b></label>
                        <input type="date" name="tgl_pergi" id="tgl_pergi" class="form-control border-left-primary" placeholder="" required>
                    </div>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket"><b>Keterangan</b></label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" placeholder="Isi keterangan jika diperlukan" rows="3">></textarea>
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