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