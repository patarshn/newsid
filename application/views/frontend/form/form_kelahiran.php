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
                        <label for="nama_anak">Nama</label>
                        <input type="text" name="nama_anak" id="nama_anak" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="jenis_kelamin_anak">Jenis Kelamin</label>
                        <select name="jenis_kelamin_anak" id="jenis_kelamin_anak" class="form-control" placeholder="Jenis Kelamin" required>
                            <option>-</option>
                            <option value="PEREMPUAN">Perempuan</option>
                            <option value="LAKI-LAKI">Laki-Laki</option>
                        </select>
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
                        <label for="agama_anak">Agama</label>
                        <select name="agama_anak" id="agama_anak" class="form-control" placeholder="Agama" required>
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
                        <label for="ke_anak">Anak Ke-</label>
                        <input type="text" name="ke_anak" id="ke_anak" class="form-control" placeholder="Anak ke-">
                    </div>
                </div>
                <h4>Data Ayah :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_ayah">NIK</label>
                        <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_ayah">Nama</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_ayah">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_ayah">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_ayah">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" value="Pekerjaan">
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_ayah">Agama</label>
                        <select name="agama_ayah" id="agama_ayah" class="form-control" placeholder="Agama" required>
                            <option>-</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <h4>Data Ibu :</h4>
                <div class="form-row">
                    <div class="col-lg-6">
                        <label for="nik_ibu">NIK</label>
                        <input type="text" name="nik_ibu" id="nik_ibu" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama_ibu">Nama</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tempat_lahir_ibu">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="tanggal_lahir_ibu">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" class="form-control" placeholder="mm/dd/yy" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pekerjaan_ibu">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" value="Pekerjaan">
                    </div>
                    <div class="col-lg-6">
                        <label for="agama_ibu">Agama</label>
                        <select name="agama_ibu" id="agama_ibu" class="form-control" placeholder="Agama" required>
                            <option>-</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <h4>Alamat :</h4>
                <div class="form-row">
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
$('#nik_ibu').keyup(function(){
    var timer = null;
    var nik = $('#nik_ibu').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama_ibu').val(obj['data']['nama']);
        $('#tempat_lahir_ibu').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir_ibu').val(obj['data']['tanggal_lahir']);
        $('#agama_ibu').val(obj['data']['agama']);
        $('#jenis_kelamin_ibu').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan_ibu').val(obj['data']['pekerjaan']);
        $('#pendidikan_ibu').val(obj['data']['pendidikan']);
        $('#status_perkawinan').val(obj['data']['status_perkawinan']);
    }), 3000);
});

$('#nik_ayah').keyup(function(){
    var timer = null;
    var nik = $('#nik_ayah').val();
    clearTimeout(timer); 
    timer = setTimeout($.get(base_url+'kependudukan/nik/'+nik, function(data){
        var obj = JSON.parse(data);
        $('#nama_ayah').val(obj['data']['nama']);
        $('#alamat').html(obj['data']['alamat']);
        $('#tempat_lahir_ayah').val(obj['data']['tempat_lahir']);
        $('#tanggal_lahir_ayah').val(obj['data']['tanggal_lahir']);
        $('#agama_ayah').val(obj['data']['agama']);
        $('#jenis_kelamin_ayah').val(obj['data']['jenis_kelamin']);
        $('#pekerjaan_ayah').val(obj['data']['pekerjaan']);
        $('#pendidikan_ayah').val(obj['data']['pendidikan']);
        $('#status_perkawinan').val(obj['data']['status_perkawinan']);
        $('#rt').val(obj['data']['rt']);
        $('#rw').val(obj['data']['rw']);
    }), 3000);
});
</script>