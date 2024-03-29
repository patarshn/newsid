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
                    <a class="btn btn-warning"  data-toggle="modal" data-target="#myModal" >Cetak</a>
<!-- Modal -->
                      <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <!-- konten modal-->
                              <div class="modal-content">
                              <!-- heading modal -->
                              <div class="modal-header border-bottom-primary">
                                  <h8 class="modal-title"><b>Cetak Buku Rekapitulasi Jumlah Penduduk</b></h8>
                              </div>
                              <!-- body modal -->
                              <div class="modal-body">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="card mb-4 py-3 border-bottom-primary">
                                            <div class="card-body">
                                              <div class="form-group">
                                                <form method="get" action="buku_rekap_penduduk/cetakExc">
                                                <label for="bulan_tahun"><b>Masukan Periode Bulan & Tahun</b></label>
                                                <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control border-left-primary" placeholder="contoh: 2019"  required>
                                                
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
               <form method="POST" id="formdelete" action="/kk/destroy">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th width="2%" rowspan="3"><input type="checkbox" class="rowdelete" id="selectAll"></th>
                    <th rowspan="3" width="2%">No</th>
                    <th rowspan="3" width="2%">Aksi</th>
                    <th rowspan="3"> Nama Dusun / Lingkungan</th>
                    <th rowspan="3">Periode</th>
                      <th colspan="7"><center>Jumlah Penduduk Awal Bulan</th>       
                      <th colspan="7"><center>Jumlah Penduduk Akhir Bulan</th>       
                    </tr>

                    <tr>
                    <th colspan="2">WNA</th>
                    <th colspan="2">WNI</th>
                    <th rowspan="2">Jumlah KK</th>
                    <th rowspan="2">Jumlah Anggota Keluarga</th>
                    <th rowspan="2">Jumlah Jiwa</th>
                    <th colspan="2">WNA</th>
                    <th colspan="2">WNI</th>
                    <th rowspan="2">Jumlah KK</th>
                    <th rowspan="2">Jumlah Anggota Keluarga</th>
                    <th rowspan="2">Jumlah Jiwa</th>
                    </tr>
                   
                    <tr>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    </tr>
                  </thead>

                  <tfoot>
                    <tr>
                    <th width="2%"></th>
                    <th width="2%">No</th>
                    <th width="2%">Aksi</th>
                    <th> Nama Dusun</th>
                    <th>Periode</th>
                    <th colspan="7"><center>Jumlah Penduduk Awal Bulan</th>       
                    <th colspan="7"><center>Jumlah Penduduk Akhir Bulan</th>       
                    </tr>
                  </tfoot>
                  
                  <tbody>
                  
                  <?php 
                  $count = 1;
                  foreach ($data as $d): ?>
                    <tr>
                    <td>
                        <input type="checkbox" name="rowdelete[]" value="<?=$d->id?>" class="rowdelete">
                        </td>
                    <td><?=$count++;?></td>
                      <td><div class="dropdown no-arrow">
                      <a class="dropdown-toggle btn btn-sm btn-secondary " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Aksi:</div>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/edit/'.$d->id)?>">Edit</a>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/detail/'.$d->id)?>">Detail</a>
                          
                          </div>
                        </div>
                      <td><?=$d->dusun?></td>
                      <td><?= date("m-Y", strtotime($d->bulan_tahun))?></td>
                      <td><?=$d->awal_wna_l?></td>
                      <td><?=$d->awal_wna_p?></td>
                      <td><?=$d->awal_wni_l?></td>
                      <td><?=$d->awal_wni_p?></td>
                      <td><?=$d->awal_jml_kk?></td>
                      <td><?=$d->awal_jml_anggota_keluarga?></td>
                      <td><?=$d->awal_jml_jiwa?></td>
                      <td><?=$d->akhir_wna_l?></td>
                      <td><?=$d->akhir_wna_p?></td>
                      <td><?=$d->akhir_wni_l?></td>
                      <td><?=$d->akhir_wni_p?></td>
                      <td><?=$d->akhir_jml_kk?></td>
                      <td><?=$d->akhir_jml_anggota_keluarga?></td>
                      <td><?=$d->akhir_jml_jiwa?></td>
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

