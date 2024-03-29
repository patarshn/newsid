<!-- CONTENT -->
<div class="container mt-3">
    <div class="row" style="margin-left:0; margin-right:0;">
        <div class="col-lg-8 col-12 konten-form">
            <div class="row">
            <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div>
            <?=form_open(base_url('form_belummenikah/store'),'id="form"')?>
                <h3><?=$title?></h3>
                <span class="text-danger font-weight-bold">*</span> <small class="text-gray-900 font-weight-bold">Wajib Diisi</small>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik">NIK<span class="text-danger">*</span></label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="usia">Usia<span class="text-danger">*</span></label>
                        <input type="number" name="usia" id="usia" class="form-control" placeholder="Usia dalam tahun" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="agama">Agama<span class="text-danger">*</span></label>
                        <select name="agama" id="agama" class="form-control" placeholder="Agama" required>
                            <option>-</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon" id="pekon" class="form-control" value="Wonodadi">
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="Gadingrejo">
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="Pringsewu">
                    </div>
                    <div class="col-lg-3">
                        <label for="rt">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt" id="rt" class="form-control" placeholder="RT">
                    </div>
                    <div class="col-lg-3">
                        <label for="rw">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw" id="rw" class="form-control" placeholder="RW">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h4>Orang tersebut diatas benar-benar telah meninggal dunia pada :</h4>  
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="tanggal_kematian">Tanggal Kematian<span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_kematian" id="tanggal_kematian" class="form-control" placeholder="mm/dd/yy" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="waktu_kematian">Waktu Kematian<span class="text-danger">*</span></label>
                                <input type="time" name="waktu_kematian" id="waktu_kematian" class="form-control mb-0 time" step="2" required >
                                <small class="timeinfo d-none">00.00-11.59 AM = 00.00-11.59<br>00.00-11.59 PM = 12.00-23.59</small>
                            </div>
                            <div class="col-lg-6">
                                <label for="tempat_kematian">Lokasi Kematian<span class="text-danger">*</span></label>
                                <input type="text" name="tempat_kematian" id="tempat_kematian" class="form-control" placeholder="Lokasi Kematian" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="penyebab_kematian">Penyebab Kematian<span class="text-danger">*</span></label>
                                <input type="text" name="penyebab_kematian" id="penyebab_kematian" class="form-control" placeholder="Penyebab Kematian" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h4>Jenazah Almarhum/Almarhumah dimakamkan :</h4>  
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="tanggal_pemakaman">Tanggal Pemakaman<span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_pemakaman" id="tanggal_pemakaman" class="form-control" placeholder="mm/dd/yy" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="waktu_pemakaman">Waktu Pemakaman<span class="text-danger">*</span></label>
                                <input type="time" name="waktu_pemakaman" id="waktu_pemakaman" class="form-control mb-0 time" step="2" required >
                                <small class="timeinfo d-none">00.00-11.59 AM = 00.00-11.59<br>00.00-11.59 PM = 12.00-23.59</small>
                            </div>
                            <div class="col-lg-6">
                                <label for="tempat_pemakaman">Lokasi Pemakaman<span class="text-danger">*</span></label>
                                <input type="text" name="tempat_pemakaman" id="tempat_pemakaman" class="form-control" placeholder="Lokasi pemakaman" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="notelp">No Telp/WA<span class="text-danger">*</span></label>
                        <input type="text" name="notelp" id="notelp" class="form-control" placeholder="6281245586699">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_ktp">Upload KTP Pengaju</label>
                            <input type="file" accept="image/jpeg,image/png" class="form-control-file" accept="image/jpeg,image/png" id="file_ktp" name="file_ktp">
                            <img id="file_ktp_preview" src="#" alt="your image" width="200"/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_kk">Upload KK Pengaju</label>
                            <input type="file" accept="image/jpeg,image/png" class="form-control-file" accept="image/jpeg,image/png" id="file_kk" name="file_kk">
                            <img id="file_kk_preview" src="#" alt="your image" width="200" />
                        </div>
                    </div>
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>?<?= date('l jS \of F Y h:i:s A'); ?>"></script>
                    
                    
                </div>
            <?=form_close()?>
                
            <div class="d-flex">
                <button type="button" id="btn-submit" class="btn btn-primary active-button align-self-center" onclick="store(base_url+'<?=$filename?>/store','#form')">Simpan</button>
                <div id="loading" class="d-none">
                    <div class="spinner-border m-1 align-self-center text-primary" role="status" ></div>  
                    <span>Loading...</span>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

<script>


$('#nik').keyup(function(){
    var timer = null;
    var nik = $('#nik').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama').val(obj['data']['nama']);
        $('#alamat').html(obj['data']['alamat']);
        $('#tempat_lahir').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir').val(obj['data']['tanggal_lahir']);
        $('#agama').val(obj['data']['agama']);
        $('#jenis_kelamin').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan').val(obj['data']['pekerjaan']);
        $('#pendidikan').val(obj['data']['pendidikan']);
        $('#status_perkawinan').val(obj['data']['status_perkawinan']);
        $('#rt').val(obj['data']['rt']);
        $('#rw').val(obj['data']['rw']);
    }), 3000);
});
</script>