<!-- CONTENT -->
<div class="container mt-3">
    <div class="row" style="margin-left:0; margin-right:0;">
        <div class="col-lg-8 col-12 konten-form">
            <div class="row">
            <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div>
            <?=form_open(base_url($filename.'/store'),'id="form"')?>
                <h3><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" required>
                            <option>-</option>
                            <option value="PEREMPUAN">Perempuan</option>
                            <option value="LAKI-LAKI">Laki-Laki</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="agama">Agama</label>
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
                    <div class="col-lg-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="nama">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" value="Indonesia">
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
                            <label for="alamat">Peruntukkan</label>
                            <textarea class="form-control" name="persyaratan" id="persyaratan" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="notelp">No Telp/WA</label>
                        <input type="text" name="notelp" id="notelp" class="form-control" placeholder="6281245586699">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_ktp">Upload KTP Pengaju</label>
                            <input type="file" class="form-control-file" accept="image/jpeg,image/png" id="file_ktp" name="file_ktp">
                            <img id="file_ktp_preview" src="#" alt="your image" width="200"/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_kk">Upload KK Pengaju</label>
                            <input type="file" class="form-control-file" accept="image/jpeg,image/png" id="file_kk" name="file_kk">
                            <img id="file_kk_preview" src="#" alt="your image" width="200" />
                        </div>
                    </div>
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>"></script>
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