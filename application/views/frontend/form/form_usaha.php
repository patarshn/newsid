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
                        <label for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" required>
                            <option>-</option>
                            <option value="PEREMPUAN">Perempuan</option>
                            <option value="LAKI-LAKI">Laki-Laki</option>
                        </select>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="nama">Kewarganegaraan<span class="text-danger">*</span></label>
                        <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" value="Indonesia">
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Pekerjaan">
                    </div>
                </div>
                <div class="form-row">
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
                </div>
                <h5>Detail Usaha</h5>
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="nama_usaha">Nama Usaha<span class="text-danger">*</span></label>
                        <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" placeholder="Nama Usaha">
                    </div>     
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_usaha">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="alamat_usaha" id="alamat_usaha" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_usaha">Pekon<span class="text-danger">*</span></label>
                        <input type="text" name="pekon_usaha" id="pekon_usaha" class="form-control" value="Wonodadi">
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_usaha">Kecamatan<span class="text-danger">*</span></label>
                        <input type="text" name="kecamatan_usaha" id="kecamatan_usaha" class="form-control" value="Gadingrejo">
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_usaha">Kabupaten<span class="text-danger">*</span></label>
                        <input type="text" name="kabupaten_usaha" id="kabupaten_usaha" class="form-control" value="Pringsewu">
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_usaha">RT<span class="text-danger">*</span></label>
                        <input type="text" name="rt_usaha" id="rt_usaha" class="form-control" placeholder="RT">
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_usaha">RW<span class="text-danger">*</span></label>
                        <input type="text" name="rw_usaha" id="rw_usaha" class="form-control" placeholder="RW">
                    </div>               
                    <div class="col-lg-12">
                        <label for="persyaratan">Peruntukkan<span class="text-danger">*</span></label>
                        <input type="text" name="persyaratan" id="persyaratan" class="form-control" placeholder="Peruntukkan">
                    </div>
                    <div class="col-lg-6">
                        <label for="notelp">No Telp/WA<span class="text-danger">*</span></label>
                        <input type="text" name="notelp" id="notelp" class="form-control" placeholder="6281245586699">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_ktp">Upload KTP Pengaju</label>
                            <input type="file" accept="image/jpeg,image/png" class="form-control-file" id="file_ktp" name="file_ktp">
                            <img id="file_ktp_preview" src="#" alt="your image" width="200"/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_kk">Upload KK Pengaju</label>
                            <input type="file" accept="image/jpeg,image/png" class="form-control-file" id="file_kk" name="file_kk">
                            <img id="file_kk_preview" src="#" alt="your image" width="200" />
                        </div>
                    </div>
                    <script src="<?=base_url('assets/my/show_ktpkkimage.js');?>?<?= date('l jS \of F Y h:i:s A'); ?>"></script>
                    </script>
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