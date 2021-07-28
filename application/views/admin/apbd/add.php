        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-primary">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?=$breadcrumb?>
                  </h6>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
          <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div> 
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body border-bottom-primary">
                <?=form_open_multipart(base_url('apbd/store'),'id="form"')?>
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                <div class="col-lg-6 mt-3">
                        <label for="tahun_anggaran"  class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <input type="numeric" maxlength="4" pattern="[0-9]" name="tahun_anggaran" id="tahun_anggaran" class="form-control border-left-primary" placeholder="Masukan tahun kegiatan, contoh: 2022" required>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label for="type" class="text-gray-900 font-weight-bold">Type</label>
                            <select name="type" id="type" class="form-control border-left-primary" onchange="kode_rekening()" required>
                                <option selected value="">- Pilih -</option>
                                <option value="PENDAPATAN">Pendapatan</option>
                                <option value="BELANJA">Belanja</option>
                            </select>
                        </div>
                    </div>

<div class="wizard-v1-content mx-auto">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <br>
                <form class="form-apbd" id="form-apbd" method="post">

                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <div class="content clearfix">
                        <section>
                            <div class="inner">
                                <table id="invoiceitems" class=" table order-list">
                                    <thead>
                                        <tr>
                                            <td>Kode Rekening</td>
                                            <td>Uraian</td>
                                            <td>Anggaran</td>
                                            <td>Keterangan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="apbd">
                                        <div class="form-row">
                                        <td width="40%">
                                          <div class="row">
                                            <div class="col-3">
                                              <input type="text" id="kode_rekening1" name="kode_rekening1[]" class="form-control border-left-primary kode_rekening1" diseable />
                                            </div>
                                            <div class="col-3">
                                              <input type="text" name="kode_rekening2[]" class="form-control border-left-primary" />
                                            </div>
                                            <div class="col-3">
                                              <input type="text" name="kode_rekening3[]" class="form-control border-left-primary" />
                                            </div>
                                            <div class="col-3">
                                              <input type="text" name="kode_rekening4[]" class="form-control border-left-primary" />
                                            </div>
                                          </div>
                                            </td>
                                            <td width="25%">
                                            <input type="text" name="uraian_apbd[]" id="uraian_apbd" class="form-control border-left-primary" required>
                                            <small id="apbd" class="text-gray-700">contoh : Pendapatan Asli Desa </small>
                                            </td>
                                            <td width="15%">
                                            <input type="text" name="anggaran[]" id="anggaran" class="form-control border-left-primary anggaran" onchange='total_anggaran()'  
                                            onkeypress="return onlyNumberKey(event)" required>
                                            <small id="apbd" class="text-gray-700">contoh : 20000 </small>
                                            </td>
                                            <td width="25%">
                                            <input type="text" name="keterangan[]" id="keterangan" class="form-control border-left-primary" required>
                                            <small id="apbd" class="text-gray-700">contoh : Pendapatan Asli Desa </small>
                                            </td>
                                            
                                            <td width="5%">
                                                <a class="deleteRow"></a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Total:</td>
                                            <td>
                                                Rp. <span class="grandtotal"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: left;">
                                                <input type="button" class="btn btn-lg btn-block " id="buttonadd" value="Tambah Anggaran" />
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                            </div>
                        </section>
                        <div class="d-flex mt-3">
                        <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/<?=$uri[2]?>/store','#form')">Simpan</button>
                        <div class="spinner-border m-1 align-self-center text-primary d-none" role="status" id="loading">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- tutup side -->
</div>




</section>

<script>

function kode_rekening(){
  var selected = document.getElementById("type");
  if(selected.selectedIndex == 1) {
    $('.kode_rekening1').val(1);
  }
  else if(selected.selectedIndex == 2) {
    $('.kode_rekening1').val(2);
  }
  
  $('.kode_rekening1'). prop("readonly", true);
}

function total_anggaran(){
  var anggaran = document.getElementsByName('anggaran[]');
  var sum_anggaran = 0;
  for (var i = 0; i < anggaran.length; i++){
    if(anggaran[i].value == ""){
      sub_total = 0;
    }
    else {
      sub_total = anggaran[i].value;
    }
    sum_anggaran = sum_anggaran + parseInt(sub_total);
  }
  $('.grandtotal').html(sum_anggaran)
  console.log('a');
}

$(document).ready(function () {
  $('#buttonadd').click(function () {
    $('#invoiceitems > tbody:last').append('<tr><td><div class="row">\
          <div class="col-3"><input type="text" id="kode_rekening1" name="kode_rekening1[]" class="form-control border-left-primary kode_rekening1" disable /></div>\
          <div class="col-3"><input type="text" name="kode_rekening2[]" class="form-control border-left-primary" /></div>\
          <div class="col-3"><input type="text" name="kode_rekening3[]" class="form-control border-left-primary" /></div>\
          <div class="col-3"><input type="text" name="kode_rekening4[]" class="form-control border-left-primary" /></div></div>\
          <td><input type="text" name="uraian_apbd[]" class="form-control border-left-primary" /></td>\
          <td><input type="text" name="anggaran[]" class="form-control border-left-primary" onchange="total_anggaran()" onkeypress="return onlyNumberKey(event)"/></td>\
          <td><input type="text" name="keterangan[]" class="form-control border-left-primary"/></td>\
          <td><input type="button" class="buttondelete btn btn-md btn-danger "  value="Hapus"></td></tr>');
    kode_rekening();
  });
  $('table#invoiceitems').on('click','.buttondelete',function () {
      if($('table#invoiceitems tbody tr').length==1){
          alert('Cant delete single row');
          return false;
      }
      $(this).closest('tr').remove();
      total_anggaran();
  });

});

</script>

<script>
    function onlyNumberKey(evt) {
      //Only ASCII character in that range allowed
      var ASCIICode = (evt.which)? evt.which : evt.keycode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;     
    
    }
</script>


<!--
@section('js')
    {{-- <script src="{{asset('investasi/mitra/js/jquery.steps.js')}}"></script> --}}
    {{-- <script src="{{asset('investasi/mitra/js/demo/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> --}}
    <script>
        $(document).ready(function () {
          $counter = 1;
          $('#buttonadd').click(function () {
              $counter++;
              $('#invoiceitems > tbody:last').append('<tr><td><div class="row"><div class="col-3"><input type="text" id="kode_rekening1" name="kode_rekening1[]" class="form-control border-left-primary" disable /></div>\
              <div class="col-3"><input type="text" name="kode_rekening1[]" class="form-control" /></div>\
              <div class="col-3"><input type="text" name="kode_rekening3[]" class="form-control" /></div>\
              <div class="col-3"><input type="text" name="kode_rekening4[]" class="form-control" /></div></div>\
              <td><input type="text" name="uraian_apbd[]" class="form-control" /></td>\
              <td><input type="text" name="anggaran[]" class="form-control" /></td>\
              <td><input type="text" name="keterangan[]" class="form-control"/></td>\
              <td><input type="button" class="buttondelete btn btn-md btn-danger "  value="Hapus"></td></tr>');
      
          });
          $('table#invoiceitems').on('keyup', '.quantity , .price',function () {
              UpdateTotals(this);
          });
      
          $counter = 1;
             $('table#invoiceitems').on('click','.buttondelete',function () {
              $counter++;
              if($('table#invoiceitems tbody tr').length==1){
                  alert('Cant delete single row');
                  return false;
              }
              $(this).closest('tr').remove();
          });
          CalculateSubTotals();
          CalculateTotal();
      });
      
      
      function UpdateTotals(elem) {
          // This will give the tr of the Element Which was changed
          var $container = $(elem).parent().parent();
          var quantity = $container.find('.quantity').val();
          var price = $container.find('.price').val();
          var subtotal = parseInt(quantity) * parseFloat(price);
          $container.find('.subtotal').text(subtotal.toFixed(2));
          CalculateTotal();
      }
      
      function CalculateSubTotals() {
          // Calculate the Subtotals when page loads for the 
          // first time
          var lineTotals = $('.subtotal');
          var quantity = $('.quantity');
          var price = $('.price');
          $.each(lineTotals, function (i) {
              var tot = parseInt($(quantity[i]).val()) * parseFloat($(price[i]).val());
              $(lineTotals[i]).text(tot.toFixed(2));
          });
      }
      
      function CalculateTotal() {
          // This will Itearate thru the subtotals and
          // claculate the grandTotal and Quantity here
          var lineTotals = $('.subtotal');
          var quantityTotal = $('.quantity');
          var grandTotal = 0.0;
          var totalQuantity = 0;
          $.each(lineTotals, function (i) {
              grandTotal += parseFloat($(lineTotals[i]).text());
              totalQuantity += parseInt($(quantityTotal[i]).val())
          });
          $('.totalquantity').text(totalQuantity);
          $('.grandtotal').text(parseFloat(grandTotal).toFixed(2));
      }

      function kode_rekening(){
        var selected = document.getElementById("type");
        if(selected.selectedIndex == 1) {
          document.getElementById('kode_rekening1').value = 1
        }
        else if(selected.selectedIndex == 2) {
          document.getElementById('kode_rekening1').value = 2
        }
      }
      </script>
@endsection
-->