$('#file_ktp').change(function(){
    if (this.files && this.files[0]) {
        var file_ktp_mime = this.files[0].type;
        if(this.files[0].size > 15360000){
            alert("File harus lebih kecil dari 15 mb");
            this.value = "";
        }
        else if(file_ktp_mime != "image/jpeg" || file_ktp_mime != "image/png"){
            alert("File harus berekstensi jpeg/jpg/png");
            this.value = "";
        }
        else{
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#file_ktp_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }

        
    }
});

$('#file_kk').change(function(){
    if (this.files && this.files[0]) {
        var file_kk_mime = this.files[0].type;
        if(this.files[0].size > 15360000){
            alert("File harus lebih kecil dari 15 mb");
            this.value = "";
        }
        else if(file_kk_mime != "image/jpeg" || file_kk_mime != "image/png"){
            alert("File harus berekstensi jpeg/jpg/png");
            this.value = "";
        }
        else{
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#file_kk_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    }
});