<!-- Begin Page Content -->
<div class="container-fluid">
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <<div class="col-xl-12 col-lg-12">
            
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-primary">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?=$breadcrumb?>
                  </h6>
                </div>
              </div>
            </div>
            <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div>
          </div>
        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
              <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
              <div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-success" href="<?=base_url('admin/'.$uri[2].'/add/');?>">Tambah Data</a>
                    <a class="btn btn-warning"  data-toggle="modal" data-target="#myModal" >Cetak</a>
<!-- Modal -->
                      <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <!-- konten modal-->
                              <div class="modal-content">
                              <!-- heading modal -->
                              <div class="modal-header border-bottom-primary">
                                  <h8 class="modal-title"><b>Cetak Buku Anggaran Pendapatan dan Belanja Desa</b></h8>
                              </div>
                              <!-- body modal -->
                              <div class="modal-body">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="card mb-4 py-3 border-bottom-primary">
                                            <div class="card-body">
                                              <div class="form-group">
                                                <form method="get" action="apbd/cetak">
                                                <label for="tahun_anggaran"><b>Masukan Periode Tahun</b></label>
                                                <input type="text" name="tahun_anggaran" id="tahun_anggaran" class="form-control border-left-primary" placeholder="contoh: 2019" onkeypress="return onlyNumberKey(event)" required>
                                                
                                                <div class="d-flex mt-3">
                                                <button type="submit" class="btn btn-success active-button align-self-center">Cetak</button>
                                                <div class="spinner-border m-1 align-self-center text-primary d-none" role="status" id="loading">
                                                <span class="sr-only">Loading...</span>
                                                </div>
                                                </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                            </div>
                                <!-- footer modal -->
                                  <div class="modal-footer ">
                                      <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                                  </div>
                              </div>
                           </div>
                        </div>
<!-- Modal -->
										<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="aksibtn" aria-haspopup="true" aria-expanded="false">Aksi</button>
										<div class="dropdown-menu">
										  <button type="button" id="deletebtn" class="dropdown-item btn btn-danger">Hapus</button>
										</div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form method="POST" id="formdelete">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center">
                  <thead>
                    <tr>
                      <th rowspan="2"><input type="checkbox" class="rowdelete" id="selectAll"></th>
                      <th rowspan="2">No</th>
                      <th rowspan="2"></th>
                      <th rowspan="2">Tahun Anggaran</th>
                      <th rowspan="2">Type</th>
                      <th colspan="4">Kode Rekening</th>
                      <th rowspan="2">Uraian</th>
                      <th rowspan="2">Anggaran</th>
                    </tr>

                    <tr>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>4</th>
                    </tr>
                    
                  </thead>
                 
                  <tbody>
                  
                  <?php 
                  $count = 1;
                  $jumlah=0;
                  foreach ($data as $d): 
                  $jumlah=$jumlah+$d->anggaran;
                  ?>
                    <tr>
                    <td>
                        <input type="checkbox" name="rowdelete[]" value="<?=$d->id?>" class="rowdelete">
                        <td><?=$count++;?></td>
                      </td>
                      <td><div class="dropdown no-arrow">
                      <a class="dropdown-toggle btn btn-sm btn-secondary " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Aksi:</div>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/edit/'.$d->id)?>">Edit</a>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/detail/'.$d->id)?>">Detail</a>
                          <!--<div class="dropdown-divider"></div>-->
                          </div>
                        </div>
                      </td>
                      <td><?=$d->tahun_anggaran?></td>
                      <td><?=$d->type?></td>
                      <td><?=$d->kode_rekening1?></td>
                      <td><?=$d->kode_rekening2?></td>
                      <td><?=$d->kode_rekening3?></td>
                      <td><?=$d->kode_rekening4?></td>
                      <td><?=$d->uraian_apbd?></td>
                      <td>Rp. <?=number_format($d->anggaran,0,',','.');?></td>

                      </td>

                    </tr>
                  <?php endforeach;?>

                  </tbody>

                  <tfoot>
                    <tr>
                        <th colspan="10">Jumlah</th>
                        <th colspan="2">Rp. <?=number_format($jumlah,0,',','.');?></th>
                      </tr>
                  </tfoot>

                </table>
                </form>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- SUBMIT FORM DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="alertModalMessage">
        Data yang akan dihapus tidak dapat dikembalikan lagi, konfirmasi untuk menghapus data.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="store(base_url+'admin/<?=$uri[2]?>/destroy','#formdelete')">Hapus</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>

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