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
                        <label for="jenis_form">Jenis Form</label>
                        <select name="jenis_form" id="jenis_form" class="form-control" placeholder="Jenis Form" required>
                            <option>Jenis Form</option>
                            <option value="form_kematian">Form Kematian</option>
                            <option value="form_janda">Form Janda</option>
                            <option value="form_ktpsementara">Form KTP Sementara</option>
                            <option value="form_penghasilan">Form Penghasilan</option>
                            <option value="form_belummenikah">Belum Menikah</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
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
