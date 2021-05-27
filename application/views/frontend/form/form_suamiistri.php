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
                <h5>Data Laki-laki/Suami (Pengaju)</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_l">NIK</label>
                        <input type="text" name="nik_l" id="nik_l" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_l">Nama</label>
                        <input type="text" name="nama_l" id="nama_l" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_l">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_l" id="tempat_lahir_l" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_l">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_l" id="tanggal_lahir_l" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="agama_l">Agama</label>
                        <select name="agama_l" id="agama_l" class="form-control" placeholder="Agama" required>
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
                        <label for="pekerjaan_l">Pekerjaan</label>
                        <input type="text" name="pekerjaan_l" id="pekerjaan_l" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_l">Alamat</label>
                            <textarea class="form-control" name="alamat_l" id="alamat_l" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_l">Pekon</label>
                        <input type="text" name="pekon_l" id="pekon_l" class="form-control" value="Wonodadi">
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_l">Kecamatan</label>
                        <input type="text" name="kecamatan_l" id="kecamatan_l" class="form-control" value="Gadingrejo">
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_l">Kabupaten</label>
                        <input type="text" name="kabupaten_l" id="kabupaten_l" class="form-control" value="Pringsewiu">
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_l">RT</label>
                        <input type="text" name="rt_l" id="rt_l" class="form-control" placeholder="RT">
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_l">RW</label>
                        <input type="text" name="rw_l" id="rw_l" class="form-control" placeholder="RW">
                    </div>
                </div>
                <h5>Data Perempuan/Istri</h5>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_p">NIK</label>
                        <input type="text" name="nik_p" id="nik_p" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_p">Nama</label>
                        <input type="text" name="nama_p" id="nama_p" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_p">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_p" id="tempat_lahir_p" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_p">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_p" id="tanggal_lahir_p" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="agama_p">Agama</label>
                        <select name="agama_p" id="agama_p" class="form-control" placeholder="Agama" required>
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
                        <label for="pekerjaan_p">Pekerjaan</label>
                        <input type="text" name="pekerjaan_p" id="pekerjaan_p" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="alamat_p">Alamat</label>
                            <textarea class="form-control" name="alamat_p" id="alamat_p" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekon_p">Pekon</label>
                        <input type="text" name="pekon_p" id="pekon_p" class="form-control" value="Wonodadi">
                    </div>
                    <div class="col-lg-6">
                        <label for="kecamatan_p">Kecamatan</label>
                        <input type="text" name="kecamatan_p" id="kecamatan_p" class="form-control" value="Gadingrejo">
                    </div>
                    <div class="col-lg-6">
                        <label for="kabupaten_p">Kabupaten</label>
                        <input type="text" name="kabupaten_p" id="kabupaten_p" class="form-control" value="Pringsewiu">
                    </div>
                    <div class="col-lg-3">
                        <label for="rt_p">RT</label>
                        <input type="text" name="rt_p" id="rt_p" class="form-control" placeholder="RT">
                    </div>
                    <div class="col-lg-3">
                        <label for="rw_p">RW</label>
                        <input type="text" name="rw_p" id="rw_p" class="form-control" placeholder="RW">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_ktp">Upload KTP Pengaju</label>
                            <input type="file" class="form-control-file" id="file_ktp" name="file_ktp">
                            <img id="file_ktp_preview" src="#" alt="your image" width="200"/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="file_kk">Upload KK Pengaju</label>
                            <input type="file" class="form-control-file" id="file_kk" name="file_kk">
                            <img id="file_kk_preview" src="#" alt="your image" width="200" />
                        </div>
                    </div>
                    <script>
                    
                        $('#file_ktp').change(function(){
                            var file_ktp_tmp = file_ktp.files[0]
                            if (file_ktp_tmp) {
                                file_ktp_preview.src = URL.createObjectURL(file_ktp_tmp)
                            }
                        });

                        $('#file_kk').change(function(){
                            var file_kk_tmp = file_kk.files[0]
                            if (file_kk_tmp) {
                                file_kk_preview.src = URL.createObjectURL(file_kk_tmp)
                            }
                        });
                    </script>
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
$('#nik_p').keyup(function(){
    var timer = null;
    var nik = $('#nik_p').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama_p').val(obj['data']['nama']);
        $('#alamat_p').html(obj['data']['alamat']);
        $('#tempat_lahir_p').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir_p').val(obj['data']['tanggal_lahir']);
        $('#agama_p').val(obj['data']['agama']);
        $('#jenis_kelamin_p').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan_p').val(obj['data']['pekerjaan']);
        $('#pendidikan_p').val(obj['data']['pendidikan']);
        $('#status_perkawinan_p').val(obj['data']['status_perkawinan']);
        $('#rt_p').val(obj['data']['rt']);
        $('#rw_p').val(obj['data']['rw']);
    }), 3000);
});

$('#nik_l').keyup(function(){
    var timer = null;
    var nik = $('#nik_l').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama_l').val(obj['data']['nama']);
        $('#alamat_l').html(obj['data']['alamat']);
        $('#tempat_lahir_l').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir_l').val(obj['data']['tanggal_lahir']);
        $('#agama_l').val(obj['data']['agama']);
        $('#jenis_kelamin_l').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan_l').val(obj['data']['pekerjaan']);
        $('#pendidikan_l').val(obj['data']['pendidikan']);
        $('#status_perkawinan_p').val(obj['data']['status_perkawinan']);
        $('#rt_l').val(obj['data']['rt']);
        $('#rw_l').val(obj['data']['rw']);
    }), 3000);
});

</script>