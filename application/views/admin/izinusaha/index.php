        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?php
                  $segment = $this->uri->segment_array();
                  $uri = base_url();
                  $uriCount = count($segment);
                  $i = 1;
                  foreach ($segment as $s)
                  {
                    //echo $s;
                    //echo '<br />';
                    $uri = $uri.$s.'/';
                    echo '<a href="'.$uri.'">'.ucfirst($s).'</a>';
                    if($i != $uriCount){
                      echo " » ";
                    }
                    $i++;
                  }
                  ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Pengajuan Kartu Tanda Penduduk</h6>
              <div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success">Add</button>
                    <button type="button" id="deletebtn" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <form method="POST" id="formdelete" action="/izinusaha/destroy">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="3%"></th>
                      <th>NIK</th>
                      <th>Nama Usaha</th>
                      <th>Alamat Usaha</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%">No</th>
                      <th width="3%"></th>
                      <th>NIK</th>
                      <th>Nama Usaha</th>
                      <th>Alamat Usaha</th>
                      <th>Detail</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  
                  <?php 
                  $count = 1;
                  foreach ($izinusaha as $i): ?>
                    <tr>
                    <td>
                        <input type="checkbox" name="rowdelete[]" value="<?=$i->id_form_izinusaha?>" class="rowdelete">
                        <?=$count++;?>
                      </td>
                      <td><div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Actions:</div>
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Delete</a>
                          <!--<div class="dropdown-divider"></div>-->
                          </div>
                        </div>
                      </td>
                      <td><?=$i->nik?></td>
                      <td><?=$i->nama_usaha?></td>
                      <td><?=$i->alamat_usaha?></td>
                      <td>
                        <div class="card bg-gradient-info text-white text-center">Detail</div>
                      </td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- SUBMIT FORMDELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="alertModalMessage">
        Data yang akan dihapus tidak dapat dikembalikan lagi, konfirmasi untuk menghapus data.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="store(base_url+'admin/izinusaha/destroy','#formdelete')">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script>

$('#deletebtn').click(function(){
var len = $('[name="rowdelete[]"]:checked').length;
if(len <= 0){
    alertModal("Tidak ada data yang dipilih");
}
else{
    $("#deleteModal").modal("show");
}
});
</script>