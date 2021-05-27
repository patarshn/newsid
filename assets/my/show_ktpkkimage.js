$('#file_ktp').change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#file_ktp_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

$('#file_kk').change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#file_kk_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
});