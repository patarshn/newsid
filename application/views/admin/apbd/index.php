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
                      <th width="5%">Kode Rekening</th>
                      <th>Uraian</th>
                      <th>Anggaran</th>
                      <th>Keterangan</th>
                      <th width="13%">Option</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th width="5%">No</th>
                      <th>Nama/Jenis</th>
                      <th>Lokasi</th>
                      <th>Total Biaya</th>
                      <th>Pelaksana</th>
                      <th>Manfaat</th>
                      <th width="13%">Option</th>>
                    </tr>
                  </tfoot> -->
                  <tbody>
                  
                  <?php 
                  $count = 1;
                  foreach ($data as $d): ?>
                    <tr>
                    <td>
                        <input type="checkbox" name="rowdelete[]" value="<?=$d->kode_rekening?>" class="rowdelete">
                        <?=$count++;?>
                      </td>
                      <td><?=$d->uraian?></td>
                      <td><?=$d->anggaran?></td>
                      <td><?=$d->keterangan?></td>
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
                              <div class="modal-header border-bottom-info">
                                  <h8 class="modal-title"><b>Rencana Kegiatan Pembangunan: <?=$d->nama_proyek?></b></h8>
                              </div>
                              <!-- body modal -->
                              <div class="modal-body">
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom-info">
                                          <div class="card-body">
                                          <table class="table table-bordered table-hover border-left-info">
                                              <thead>
                                                  <tr><th>Nama Proyek/Kegiatan</th>
                                                  <td><?=$d->nama_proyek?></td></tr>

                                                  <tr><th>Lokasi</th>
                                                  <td><?=$d->lokasi?></td></tr>                                                                                      

                                                  <tr><th>Pelaksana</th>
                                                  <td><?=$d->pelaksana?></td></tr>

                                                  <tr><th>Manfaat</th>
                                                  <td><?=$d->manfaat?></td></tr>
                                                  
                                                  <tr><th>Keterangan</th>
                                                  <td><?=$d->ket?></td></tr>
                                                 </thead>
                                              </table>                                            
                                        
                                              <h8><b> Sumber Dana / Besaran Biaya</b></h8>
                                              <table class="table table-bordered table-hover border-left-info">
                                              <thead>
                                              <tr><th>Pemerintah</th>
                                                  <td style="text-align:right"><?=$d->biaya_pemerintah?></td></tr>

                                                  <tr><th>Provinsi</th>
                                                  <td style="text-align:right"><?=$d->biaya_prov?></td></tr> 

                                                  <tr><th>Kabupaten/Kota</th>
                                                  <td style="text-align:right"><?=$d->biaya_kab?></td></tr>

                                                  <tr class="border-bottom-info"><th>Swadaya</th>
                                                  <td style="text-align:right"><?=$d->biaya_swadaya?></td></tr>

                                                  <tr><th>Total Biaya</th>
                                                  <td style="text-align:right"><?=$d->jumlah?></td></tr>
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

