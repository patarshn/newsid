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
                <span class="text-danger font-weight-bold">*</span>
                <small class="text-gray-900 font-weight-bold">Wajib Diisi<br></small>
                <br>
                
                <div class="form-row">
                <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="tahun">Tahun Kedatangan Penduduk</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="tahun" id="tahun" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" placeholder="Masukan tahun kedatangan penduduk, contoh: 2022" value="<?=$d->tahun?>" size="4" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nama">Nama Lengkap</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="nama" id="nama" class="form-control border-left-primary" placeholder="Nama lengkap" value="<?=$d->nama?>" size="50" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="no_identitas">Nomor Identitas/Tanda Pengenal)</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input type="text" name="no_identitas" id="no_identitas" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" placeholder="Nomor indentitas/tanda pengenal" value="<?=$d->no_identitas?>" size="16" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="jk">Jenis Kelamin</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <select name="jk" id="jk" class="form-control border-left-primary"  required>
                            <option><?=$d->jk?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control border-left-primary" placeholder="Tempat Lahir" value="<?=$d->tempat_lahir?>" size="50" required>
                    </div>
                    </div>

                    <div class="col-lg-2">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_lahir">Tanggal Lahir </label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control border-left-primary" placeholder="" value="<?=$d->tgl_lahir?>" required>
                    </div>
                    </div>

                    <div class="col-lg-1">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="umur">Umur </label>
                        <input type="text" name="umur" id="umur" class="form-control border-left-primary" onkeypress="return onlyNumberKey(event)" placeholder="Umur" size="3" value="<?=$d->umur?>" >
                    </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="pekerjaan">Pekerjaan</label>
                          <medium id="wajib" class="text-danger">*</medium>
                          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-left-primary " placeholder="Pekerjaan" value="<?=$d->pekerjaan?>" size="50" required>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="text-gray-900 font-weight-bold" for="kebangsaan">Kebangsaan</label>
                      <select name="kebangsaan" id="kebangsaan" class="form-control border-left-primary" placeholder="" value="<?=$d->kebangsaan?>" >
                            <option><?=$d->kebangsaan?></option>
                            <option value="WNI">WNI</option>
                        </select>
                        <medium id="jk" class="text-gray-700">note* : isi disini jika penduduk adalah WNI</medium>
                    </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="keturunan">Keturunan</label>
                            <input type="text" name="keturunan" id="keturunan" class="form-control border-left-primary " placeholder="Isi dengan nama negara asal" value="<?=$d->keturunan?>" size="50">
                            <medium id="jk" class="text-gray-700">note* : isi disini jika penduduk merupakan WNA </medium>
                        </div>
                    </div>
                                    
                    <div class="col-lg-6">
                      <div class="form-group">
                          <label class="text-gray-900 font-weight-bold" for="datang_dari">Datang Dari (Asal)</label>
                          <medium id="wajib" class="text-danger">*</medium>
                          <input type="text" name="datang_dari" id="datang_dari" class="form-control border-left-primary " placeholder="Lokasi / Tempat Kedatangan / Asal" value="<?=$d->datang_dari?>" size="100" required>
                      </div>
                    </div>                
                 
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="maksud_tujuan">Maksud dan Tujuan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <textarea class="form-control border-left-primary" name="maksud_tujuan" id="maksud_tujuan" placeholder="Jelaskan maksud dan tujujuan kedatangan" rows="3" size="150" required><?=$d->maksud_tujuan?></textarea>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="nama_yg_didatangi">Nama Penduduk yang Didatangi</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <input typr="text" class="form-control border-left-primary" name="nama_yg_didatangi" id="nama_yg_didatangi" value="<?=$d->nama_yg_didatangi?>" size="50" placeholder="Nama penduduk desa yang didatangi" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                        </div>  
                    </div>       

                    <div class="col-lg-6">
                    <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="alamat_yg_didatangi">Alamat Penduduk yang Didatangi</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <textarea class="form-control border-left-primary" name="alamat_yg_didatangi" id="alamat_yg_didatangi"  placeholder="Alamat penduduk desa yang didatangi" size="100" rows="1" required><?=$d->alamat_yg_didatangi?></textarea>
                        </div>  
                    </div>                         
                    
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_datang">Tanggal Kedaatangan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="tgl_datang" id="tgl_datang" class="form-control border-left-primary" placeholder="" value="<?=$d->tgl_datang?>" required>
                    </div>
                    </div>                  
                 
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="text-gray-900 font-weight-bold" for="tgl_pergi">Tanggal Kepergian</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="tgl_pergi" id="tgl_pergi" class="form-control border-left-primary" placeholder="" value="<?=$d->tgl_pergi?>" required>
                    </div>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-gray-900 font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" placeholder="Isi keterangan jika diperlukan"><?=$d->ket?></textarea>
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

<script>
    function onlyNumberKey(evt) {
      //Only ASCII character in that range allowed
      var ASCIICode = (evt.which)? evt.which : evt.keycode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;     
    
    }
</script>
