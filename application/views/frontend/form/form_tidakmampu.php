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
            <h4>Data Anak :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_anak">NIK</label>
                        <input type="text" name="nik_anak" id="nik_anak" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_anak">Nama</label>
                        <input type="text" name="nama_anak" id="nama_anak" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_anak">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_anak" id="tempat_lahir_anak" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_anak">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_anak" id="tanggal_lahir_anak" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kewarganegaraan_anak">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan_anak" id="kewarganegaraan_anak" class="form-control" value="Indonesia">
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_anak">Agama</label>
                        <input type="text" name="agama_anak" id="agama_anak" class="form-control" value="Agama">
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_anak">Pekerjaan</label>
                        <input type="text" name="pekerjaan_anak" id="pekerjaan_anak" class="form-control" value="Pekerjaan">
                    </div>
                </div>
                <h4>Data Orangtua :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_orangtua">NIK</label>
                        <input type="text" name="nik_orangtua" id="nik_orangtua" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_orangtua">Nama</label>
                        <input type="text" name="nama_orangtua" id="nama_orangtua" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_orangtua">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_orangtua" id="tempat_lahir_orangtua" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_orangtua">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_orangtua" id="tanggal_lahir_orangtua" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="kewarganegaraan_orangtua">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan_orangtua" id="kewarganegaraan_orangtua" class="form-control" value="Indonesia">
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_orangtua">Agama</label>
                        <input type="text" name="agama_orangtua" id="agama_orangtua" class="form-control" value="Agama">
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_orangtua">Pekerjaan</label>
                        <input type="text" name="pekerjaan_orangtua" id="pekerjaan_orangtua" class="form-control" value="Pekerjaan">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon">Pekon</label>
                        <input type="text" name="pekon" id="pekon" class="form-control" value="Wonodadi">
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="Gadingrejo">
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="Pringsewiu">
                    </div>
                    <div class="col-lg-3">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" id="rt" class="form-control" placeholder="RT">
                    </div>
                    <div class="col-lg-3">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" id="rw" class="form-control" placeholder="RW">
                    </div>
                   
                    
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat">Persyaratan</label>
                            <textarea class="form-control" name="persyaratan" id="persyaratan" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            <?=form_close()?>
                
            <div class="d-flex">
            <button type="button" class="btn btn-primary active-button align-self-center" onclick="store(base_url+'<?=$filename?>/store','#form')">Simpan</button>
                <div class="spinner-border m-1 align-self-center text-primary d-none" role="status" id="loading">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

<script>
$('#nik_anak').keyup(function(){
    var timer = null;
    var nik = $('#nik_anak').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama_anak').val(obj['data']['nama']);
        $('#alamat_anak').html(obj['data']['alamat']);
        $('#tempat_lahir_anak').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir_anak').val(obj['data']['tanggal_lahir']);
        $('#agama_anak').val(obj['data']['agama']);
        $('#jenis_kelamin_anak').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan_anak').val(obj['data']['pekerjaan']);
        $('#pendidikan_anak').val(obj['data']['pendidikan']);
        $('#status_perkawinan_anak').val(obj['data']['status_perkawinan']);
        $('#rt_anak').val(obj['data']['rt']);
        $('#rw_anak').val(obj['data']['rw']);
    }), 3000);
});

$('#nik_orangtua').keyup(function(){
    var timer = null;
    var nik = $('#nik_orangtua').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama_orangtua').val(obj['data']['nama']);
        $('#alamat').html(obj['data']['alamat']);
        $('#tempat_lahir_orangtua').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir_orangtua').val(obj['data']['tanggal_lahir']);
        $('#agama_orangtua').val(obj['data']['agama']);
        $('#jenis_kelamin_orangtua').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan_orangtua').val(obj['data']['pekerjaan']);
        $('#pendidikan_orangtua').val(obj['data']['pendidikan']);
        $('#status_perkawinan').val(obj['data']['status_perkawinan']);
        $('#rt').val(obj['data']['rt']);
        $('#rw').val(obj['data']['rw']);
    }), 3000);
});
</script>