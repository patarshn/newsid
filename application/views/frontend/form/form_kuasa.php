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
                <h5>Data Pemberi Kuasa (Pengaju)</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_1">NIK<span class="text-danger">*</span></label>
                        <input type="text" name="nik_1" id="nik_1" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_1">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama_1" id="nama_1" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_1">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir_1" id="tempat_lahir_1" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_1">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir_1" id="tanggal_lahir_1" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_1">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" name="pekerjaan_1" id="pekerjaan_1" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_1">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="alamat_1" id="alamat_1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_1">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon_1" id="pekon_1" class="form-control" value="Wonodadi">
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_1">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan_1" id="kecamatan_1" class="form-control" value="Gadingrejo">
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_1">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten_1" id="kabupaten_1" class="form-control" value="Pringsewu">
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_1">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt_1" id="rt_1" class="form-control" placeholder="RT">
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_1">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw_1" id="rw_1" class="form-control" placeholder="RW">
                    </div>
                </div>
                <h5>Data Penerima Kuasa</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_2">NIK<span class="text-danger">*</span></label>
                        <input type="text" name="nik_2" id="nik_2" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_2">Nama<span class="text-danger">*</span></label>
                        <input type="text" name="nama_2" id="nama_2" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_2">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir_2" id="tempat_lahir_2" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_2">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir_2" id="tanggal_lahir_2" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="pekerjaan_2">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" name="pekerjaan_2" id="pekerjaan_2" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_2">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="alamat_2" id="alamat_2" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_2">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon_2" id="pekon_2" class="form-control" value="Wonodadi">
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_2">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan_2" id="kecamatan_2" class="form-control" value="Gadingrejo">
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_2">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten_2" id="kabupaten_2" class="form-control" value="Pringsewu">
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_2">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt_2" id="rt_2" class="form-control" placeholder="RT">
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_2">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw_2" id="rw_2" class="form-control" placeholder="RW">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="keterangan">Keterangan<span class="text-danger">*</span></label>
                            <?php
$keterangan = "Contoh
Untuk pembayaran Pajak :
Nomor Polisi : BE 1234 SU
Warna TNKB : HITAM
Isi Silinder Hp : 108.2 CC
Merk/Type : HONDA/X1B02R07L0 A/T
NO. Rangka : AB1JFR12346789
No. Mesin : ABCDE-1234567
";
?>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="10" placeholder="<?=$keterangan?>"></textarea>
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
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>"></script>
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
$('#nik_1').keyup(function(){
    var timer = null;
    var nik = $('#nik_1').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama_1').val(obj['data']['nama']);
        $('#alamat_1').html(obj['data']['alamat']);
        $('#tempat_lahir_1').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir_1').val(obj['data']['tanggal_lahir']);
        $('#agama_1').val(obj['data']['agama']);
        $('#jenis_kelamin_1').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan_1').val(obj['data']['pekerjaan']);
        $('#pendidikan_1').val(obj['data']['pendidikan']);
        $('#status_perkawinan_p').val(obj['data']['status_perkawinan']);
        $('#rt_1').val(obj['data']['rt']);
        $('#rw_1').val(obj['data']['rw']);
    }), 3000);
});

$('#nik_2').keyup(function(){
    var timer = null;
    var nik = $('#nik_2').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama_2').val(obj['data']['nama']);
        $('#alamat_2').html(obj['data']['alamat']);
        $('#tempat_lahir_2').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir_2').val(obj['data']['tanggal_lahir']);
        $('#agama_2').val(obj['data']['agama']);
        $('#jenis_kelamin_2').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan_2').val(obj['data']['pekerjaan']);
        $('#pendidikan_2').val(obj['data']['pendidikan']);
        $('#status_perkawinan_p').val(obj['data']['status_perkawinan']);
        $('#rt_2').val(obj['data']['rt']);
        $('#rw_2').val(obj['data']['rw']);
    }), 3000);
});

</script>