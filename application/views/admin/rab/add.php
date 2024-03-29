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
                <?=form_open_multipart(base_url('rab/store'),'id="form"')?>
                <h4 class="text-gray-900">Rincian Anggaran Biaya</h4>
                <div class="form-row">
                    <div class="col-lg-3 mt-2">
                        <label for="tahun_anggaran" class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="tahun_anggaran" id="tahun_anggaran" class="form-control border-left-primary" placeholder="Tahun kegiatan, co: 2021" onkeypress="return onlyNumberKey(event)" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="bidang" class="text-gray-900 font-weight-bold">Bidang</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="text" name="bidang" id="bidang" class="form-control border-left-primary" placeholder="Nama Bidang"required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <div class="form-group">
                            <label for="uraian_apbd" class="text-gray-900 font-weight-bold">Kegiatan</label>
                            <medium id="wajib" class="text-danger">*</medium>
                            <select name="uraian_apbd" id="uraian_apbd" class="form-control border-left-primary" required>
                                <option>-</option>
                                <?php   
                                foreach($data as $d):
                                    $kode = $d->uraian_apbd;
                                    echo "<option value='$kode'>$kode</option>"; 
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 mt-2">
                        <label for="waktu_pelaksanaan" class="text-gray-900 font-weight-bold">Waktu Pelaksanaan</label>
                        <medium id="wajib" class="text-danger">*</medium>
                        <input type="date" name="waktu_pelaksanaan" id="waktu_pelaksanaan" class="form-control border-left-primary" required>
                    </div>


<div class="wizard-v1-content mx-auto">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <br>
                <form class="form-rab" id="form-rab" method="post">

                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <div class="content clearfix">
                        <section>
                            <div class="inner">
                                <table id="invoiceitems" class=" table order-list">
                                    <thead>
                                        <tr>
                                            <td>Uraian</td>
                                            <td>Volume</td>
                                            <td>Harga Satuan (Rp.)</td>
                                            <td>Jumlah (Rp.)</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="rab">
                                            <td width="15%">
                                            <input type="text" name="uraian[]" id="uraian" class="form-control border-left-primary" required>
                                            <small id="rab" class="text-gray-700">contoh : Kursi </small>
                                            </td>
                                            <td width="15%">
                                            <input type="text" name="volume[]" onchange="jumlah_rp(0)" id="volume" class="form-control border-left-primary volume-0" required>
                                            <small id="rab" class="text-gray-700">contoh : 1 set </small>
                                            </td>
                                            <td width="15%">
                                            <input type="text" name="harga_satuan[]" id="harga_satuan" onchange="jumlah_rp(0)" class="form-control border-left-primary harga_satuan-0" onkeypress="return onlyNumberKey(event)" required>
                                            <small id="rab" class="text-gray-700">contoh : 50000 </small>
                                            </td>
                                            <td width="10%">
                                            <input type="text" name="jumlah[]" id="jumlah" onchange="total_jumlah()" class="form-control border-left-primary jumlah-0" readonly required>
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
                                            <td>Jumlah:</td>
                                            <td>
                                                Rp. <span class="grandtotal"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: left;">
                                                <input type="button" class="btn btn-lg btn-block " id="buttonadd" value="Tambah Rincian" />
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

  function jumlah_rp(x){
    var volume = $('.volume-'+x).val();
    var harga_satuan = $('.harga_satuan-'+x).val();
    if(volume == ""){
      volume = 0;
    }
    if(harga_satuan == ""){
      harga_satuan = 0;
    }
    var sum = parseInt(volume) * parseInt(harga_satuan);
    $('.jumlah-'+x).val(sum);
    total_jumlah();
  }

  function total_jumlah(){
    var jumlah = document.getElementsByName('jumlah[]');
    var sum_jumlah = 0;
    for (var i = 0; i < jumlah.length; i++){
      if(jumlah[i].value == ""){
        sub_total = 0;
      }
      else {
        sub_total = jumlah[i].value;
      }
      sum_jumlah = sum_jumlah + parseInt(sub_total);
    }
    $('.grandtotal').html(sum_jumlah)
    console.log('a');
  }

$(document).ready(function () {
  var countadd = 1;
  $('#buttonadd').click(function () {
    
    $('#invoiceitems > tbody:last').append('<tr class="rab">\
          <td><input type="text" name="uraian[]" class="form-control border-left-primary" /></td>\
          <td><input type="text" name="volume[]" class="form-control border-left-primary volume-'+countadd+'" onchange="jumlah_rp('+countadd+')"/></td>\
          <td><input type="text" name="harga_satuan[]" class="form-control border-left-primary harga_satuan-'+countadd+'" onchange="jumlah_rp('+countadd+')" onkeypress="return onlyNumberKey(event)"/></td>\
          <td><input type="text" name="jumlah[]" class="form-control border-left-primary jumlah-'+countadd+'" readonly/></td>\
          <td><input type="button" class="buttondelete btn btn-md btn-danger "  value="Hapus"></td></tr>');
    countadd = countadd + 1;
    total_jumlah();
  });
  $('table#invoiceitems').on('click','.buttondelete',function () {
      if($('table#invoiceitems tbody tr').length==1){
          alert('Cant delete single row');
          return false;
      }
      $(this).closest('tr').remove();
      total_jumlah();
  });
$('#jumlah').change(function(){
  total_jumlah();
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