/*

$('#about-1').on('click', function() { 
    $('div.show-item').removeClass('show-item').addClass('hide-item');
    $('a.active-button').removeClass('active-button');
    $('#history').removeClass('hide-item').addClass('show-item');
    $('#about-1').addClass('active-button');
});
$('#about-2').on('click', function() { 
    $('div.show-item').removeClass('show-item').addClass('hide-item');
    $('a.active-button').removeClass('active-button');
    $('#vision').removeClass('hide-item').addClass('show-item');
    $('#about-2').addClass('active-button');
});
$('#about-3').on('click', function() { 
    $('div.show-item').removeClass('show-item').addClass('hide-item');
    $('a.active-button').removeClass('active-button');
    $('#management').removeClass('hide-item').addClass('show-item');
    $('#about-3').addClass('active-button');
});
*/

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }



function store(url,formID){
    //$('#loading').removeClass('d-none');
    

    if($('#loading').length){
      $('#loading').removeClass('d-none');
      $('#loading').addClass('d-flex align-items-center');
      console.log("loading exist");
      if($('#btn-submit').length){
        $('#btn-submit').attr('disabled', 'disabled');
        console.log("btn submit exist");
      }
    }
    $.ajax({
        type: "POST",
        url: url,
        data: new FormData($(formID)[0]),
        dataType: 'json',
        async : false,
        contentType: false,
        processData: false,
        cache:false,
        success: function(data){
           if(data.status == 'error'){
                if($('#success-message').length){
                  $('#success-message').hide();
                }
                $('#error-message').removeClass('d-none');
                $('#error-message').html(data.message);
                $("html, body").animate({scrollTop:$("#error-message").offset().top - 50}, 500);
           }
           else if(data.status == 'success'){
                window.location.href = data.redirect;
           }     
        },
    });
    
    if($('#loading').length){
      $('#loading').removeClass('d-flex align-items-center');
      $('#loading').addClass('d-none');
      if($('#btn-submit').length){
        $('#btn-submit').removeAttr('disabled');
      }
    }
}

function alertModal(message){
    $("#alertModal #alertModalMessage").html(message);
    $("#alertModal").modal("show");
    
}



$('#deletebtn').click(function(){
  var len = $('[name="rowdelete[]"]:checked').length;
  if(len <= 0){
      alertModal("Tidak ada data yang dipilih");
  }
  else{
      $("#deleteModal #alertModalMessage").html(len + " Data yang akan dihapus tidak dapat dikembalikan lagi, konfirmasi untuk menghapus data.");
      $("#deleteModal").modal("show");
  }
});

$('#setujubtn').click(function(){
  var len = $('[name="rowdelete[]"]:checked').length;
  if(len <= 0){
      alertModal("Tidak ada data yang dipilih");
  }
  else{
      $("#setujuModal #alertModalMessage").html(len + " Data yang akan disetujui, konfirmasi untuk menyetujui data.");
      $("#setujuModal").modal("show");
  }
  });

$('#tolakbtn').click(function(){
  var len = $('[name="rowdelete[]"]:checked').length;
  if(len <= 0){
      alertModal("Tidak ada data yang dipilih");
  }
  else{
      $("#tolakModal #alertModalMessage").html(len + " Data yang akan ditolak, konfirmasi untuk menolak data.");
      $("#tolakModal").modal("show");
  }
  });

$('.time').focusin(function() {
  $('.timeinfo').removeClass('d-none');
});

$('.time').focusout(function() {
  $('.timeinfo').addClass('d-none');
});

$("#selectAll").click(function(){
  $(".rowdelete").prop('checked', $(this).prop('checked'));
  var len = $('[name="rowdelete[]"]:checked').length;
    if(len <= 0){
      $('#aksibtn').html("Aksi");
    }
    else{
      $('#aksibtn').html("Aksi ("+len+" data)");
    }
});

$('.rowdelete').click(function(){
  var len = $('[name="rowdelete[]"]:checked').length;
  if(len <= 0){
    //$('#deletebtn').html("Delete");
    $('#aksibtn').html("Aksi");
  }
  else{
    //$('#deletebtn').html("Delete ("+len+" data)");
    $('#aksibtn').html("Aksi ("+len+" data)");
  }
});

// Call the dataTables jQuery plugin

$(document).ready(function() {
  $('#dataTable').DataTable( {
      dom: 
      '<"row"<"col-6"<"d-flex justify-content-start"lB>><"col-6"f>>rtip',
      "aLengthMenu": [[10, 25, 50, 100], [10, 25, 50, "All"]],
      "iDisplayLength": 10,
      "columnDefs": [
        { "orderable": false, "targets": 0 }
      ]
  } );
} );

$(document).ready(function() {

    //datatables
    var table = $('#dataTablePenduduk').DataTable({ 

        "processing": true, 
        "serverSide": true, 
        "order": [], 
         
        "ajax": {
            "url": base_url+'admin/buku_ktp_kk/get_data_user',
            "type": "POST"
        },

         
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false, 
        },
        ],

    });

});

