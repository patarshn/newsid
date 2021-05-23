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
                    <!--<button type="button" id="`deletebtn`" class="btn btn-danger">Delete</button>-->
										<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" id="aksibtn" aria-haspopup="true" aria-expanded="false">Aksi</button>
										<div class="dropdown-menu">
                      <button type="button" id="setujubtn" class="dropdown-item btn btn-success">Setujui</button>
										  <button type="button" id="tolakbtn" class="dropdown-item btn btn-warning">Tolak</button>
										  <button type="button" id="deletebtn" class="dropdown-item btn btn-danger">Hapus</button>
										</div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <form method="POST" id="formdelete" action="/kk/destroy">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="3%"></th>
                      <th>Tanggal</th>
                      <th>Nama/Lembaga Pihak Penyampai Aspirasi</th>
                      <th>Aspirasi yang Disampaikan</th>
                      <th width="10%">Verif Kepala BPD</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th width="5%">No</th>
                    <th width="3%"></th>
                    <th>Tanggal</th>
                    <th>Nama/Lembaga Pihak Penyampai Aspirasi</th>
                    <th>Aspirasi yang Disampaikan</th>
                    <th width="10%">Verif Kepala BPD</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  <?php 
                  $count = 1;
                  foreach ($data as $d): ?>
                    <tr>
                    <td>
                        <input type="checkbox" name="rowdelete[]" value="<?=$d->id?>" class="rowdelete">
                        <?=$count++;?>
                      </td>
                      <td><div class="dropdown no-arrow">
                      <a class="dropdown-toggle btn btn-sm btn-secondary " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Actions:</div>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/edit/'.$d->id)?>">Edit</a>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/detail/'.$d->id)?>">Detail</a>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/cetak/'.$d->id)?>">Cetak</a>
                          <!--<div class="dropdown-divider"></div>-->
                          </div>
                        </div>
                      </td>
                      <td><?=$d->tgl?></td>
                      <td><?=$d->phk_aspirasi?></td>
                      <td><?=$d->aspirasi?></td>
                      <td>
                        <?php 
                        if($d->verif_bpd_at == null){
                          $verif_time = "";
                        }
                        else{
                          $verif_bpd_at  = explode(" ",$d->verif_bpd_at);
                          $verif_time = "<br>".$verif_bpd_at[0]."<br>".$verif_bpd_at[1]."<br>";
                        }
                        ?>
                        <?php if($d->verif_bpd == 'Pending'):?>
                            <div class="card bg-gradient-warning text-white text-center">Pending <?=$verif_time?></div>
                        <?php elseif($d->verif_bpd == 'Disetujui'):?>
                            <div class="card bg-gradient-success text-white text-center">Disetujui <?=$verif_time?></div>
                        <?php elseif($d->verif_bpd == 'Ditolak'):?>
                            <div class="card bg-gradient-danger text-white text-center">Ditolak <?=$verif_time?></div>
                        <?php endif;?>
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
        <button type="button" class="btn btn-danger" onclick="store(base_url+'admin/<?=$uri[2]?>/destroy','#formdelete')">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>