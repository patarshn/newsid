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
                <h3 class="text-gray-900"><?=$title?></h3>
                <div class="form-row">
                    <div class="col-lg-3 mt-2">
                        <label for="tahun_anggaran" class="text-gray-900 font-weight-bold">Tahun Anggaran</label>
                        <input type="date" name="tahun_anggaran" id="tahun_anggaran" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label for="bidang" class="text-gray-900 font-weight-bold">Bidang</label>
                        <input type="text" name="bidang" id="bidang" class="form-control" required>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <div class="form-group">
                            <label for="kode_rekening" class="text-gray-900 font-weight-bold">Kode Rekening</label>
                            <select name="kode_rekening" id="kode_rekening" class="form-control" required>
                                <option>-</option>
                                
                                <?php   
                                foreach($data as $d):
                                    $kode = $d->kode_rekening1."-".$d->kode_rekening2."-".$d->kode_rekening3."-".$d->kode_rekening4;
                                    echo "<option value='$kode'>$kode</option>"; 
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 mt-2">
                        <label for="waktu_pelaksanaan" class="text-gray-900 font-weight-bold">Waktu Pelaksanaan</label>
                        <input type="date" name="waktu_pelaksanaan" id="waktu_pelaksanaan" class="form-control" required>
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
                                            <input type="text" name="uraian[]" id="uraian" class="form-control" required>
                                            <small id="rab" class="text-gray-700">contoh : Pendapatan Asli Desa </small>
                                            </td>
                                            <td width="15%">
                                            <input type="text" name="volume[]" onchange="jumlah_rp(0)" id="volume" class="form-control volume-0" required>
                                            <small id="rab" class="text-gray-700">contoh : Kursi </small>
                                            </td>
                                            <td width="15%">
                                            <input type="number" name="harga_satuan[]" id="harga_satuan" onchange="jumlah_rp(0)" class="form-control harga_satuan-0" required>
                                            </td>
                                            <td width="10%">
                                            <input type="text" name="jumlah[]" id="jumlah" class="form-control jumlah-0" readonly required>
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
}

$(document).ready(function () {
  var countadd = 1;
  $('#buttonadd').click(function () {
    
    $('#invoiceitems > tbody:last').append('<tr class="rab">\
          <td><input type="text" name="uraian[]" class="form-control" /></td>\
          <td><input type="text" name="volume[]" class="form-control volume-'+countadd+'" onchange="jumlah_rp('+countadd+')"/></td>\
          <td><input type="number" name="harga_satuan[]" class="form-control harga_satuan-'+countadd+'" onchange="jumlah_rp('+countadd+')"/></td>\
          <td><input type="text" name="jumlah[]" class="form-control jumlah-'+countadd+'" readonly/></td>\
          <td><input type="button" class="buttondelete btn btn-md btn-danger "  value="Hapus"></td></tr>');
    countadd = countadd + 1;
  });
  $('table#invoiceitems').on('click','.buttondelete',function () {
      if($('table#invoiceitems tbody tr').length==1){
          alert('Cant delete single row');
          return false;
      }
      $(this).closest('tr').remove();
      total_jumlah();
  });

});

</script>