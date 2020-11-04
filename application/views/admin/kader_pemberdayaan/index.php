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
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
              <div>
                
                    <button type="button" class="btn btn-success" onclick="window.open('<?=base_url($uri[2])?>','_blank')"><i class="fa fa-plus"></i>Tambah Data</button>
                    <button type="button" id="deletebtn" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    
                
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <form method="POST" id="formdelete" action="/kk/destroy">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Nama</th>
                      <th>Umur</th>
                      <th>Jenis Kelamin</th>
                      <th>Pendidikan/Khursus</th>
                      <th>Bidang</th>
                      <th>Alamat</th>
                      <th>Keterangan</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%">No</th>
                      <th>Nama</th>
                      <th>Umur</th>
                      <th>Jenis Kelamin</th>
                      <th>Pendidikan/Khursus</th>
                      <th>Bidang</th>
                      <th>Alamat</th>
                      <th>Keterangan</th>
                      <th>Option</th>
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
                      <td><?=$d->nama?></td>
                      <td><?=$d->umur?></td>
                      <td><?=$d->jkelamin?></td>
                      <td><?=$d->pendidikan?></td>
                      <td><?=$d->bidang?></td>
                      <td><?=$d->alamat?></td>
                      <td><?=$d->ket?></td>
                      <td> <div">
                            <a class="btn btn-warning" href="<?=base_url('admin/'.$uri[2].'/edit/'.$d->id)?>"><i class="fa fa-pen"></i> Edit</a>
                            <a class="btn btn-info"  data-toggle="modal" data-target="#myModal<?=$d->id?>"
                            title="Show Data" data-toggle="modal"><span class="glyphicon glyphicon-eye-open">Detail</span></a>
<!-- Modal -->
                      <div id="myModal<?=$d->id?>" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <!-- konten modal-->
                              <div class="modal-content">
                              <!-- heading modal -->
                              <div class="modal-header  border-bottom-info">
                                  <h8 class="modal-title"><b>Data Kader Pembangunan: <?=$d->nama?></b></h8>
                              </div>
                              <!-- body modal -->
                              <div class="modal-body">
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom-info">
                                          <div class="card-body">
                                              <table class="table table-bordered table-hover border-left-info">
                                              <thead>
                                                  <tr><th>Nama Lengkap</th>
                                                  <td><?=$d->nama?></td></tr>

                                                  <tr><th>Tempat dan Tanggal Lahir</th>
                                                  <td><?=$d->umur?></td></tr> 

                                                  <tr><th>Jenis Kelamin</th>
                                                  <td><?=$d->jkelamin?></td></tr>

                                                  <tr><th>Golongan Darah</th>
                                                  <td><?=$d->pendidikan?></td></tr>

                                                  <tr><th>Alamat</th>
                                                  <td><?=$d->bidang?></td></tr>

                                                  <tr><th>Keterangan</th>
                                                  <td><?=$d->ket?></td></tr>

                                              </thead>
                                              </table>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                                <!-- footer modal -->
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                                  </div>
                              </div>
                           </div>
                        </div>
<!-- Modal -->
                        </div>
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

