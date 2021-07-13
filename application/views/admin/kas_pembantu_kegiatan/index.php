<!-- Begin Page Content -->
<div class="container-fluid">
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
            
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
                                  <h8 class="modal-title"><b>Cetak Buku Kas Pembantu Kegiatan</b></h8>
                              </div>
                              <!-- body modal -->
                              <div class="modal-body">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="card mb-4 py-3 border-bottom-primary">
                                            <div class="card-body">
                                              <div class="form-group">
                                                <form method="get" action="kas_pembantu_kegiatan/cetak">
                                                <label for="tahun_anggaran"><b>Masukan Periode Tahun</b></label>
                                                <input type="number" name="tahun_anggaran" id="tahun_anggaran" class="form-control border-left-primary" placeholder="contoh: 2019"  required>
                                                
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
                    <!--<button type="button" id="`deletebtn`" class="btn btn-danger">Hapus</button>-->
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
                      <th rowspan="2" width="5%">No Urut</th>
                      <th rowspan="2" width="3%"></th>
                      <th rowspan="2">Tanggal</th>
                      <th rowspan="2">Uraian</th>
                      <th colspan="2">Penerimaan (Rp.)</th>
                      <th colspan="2">Pengeluaran (Rp.)</th>
                    </tr>

                    <tr>
                      <th>Dari Bendahara</th>
                      <th>Swadaya Masyarakat</th>
                      <th>Belanja Barang dan Jasa</th>
                      <th>Belanja Modal</th>
                    </tr>
                    
                  </thead>
                  <tbody>
                  
                  <?php 
                  $count = 1;
                  $saldo = 0;
                  $jumlah_penerimaan_bendahara = 0;
                  $jumlah_penerimaan_sdm = 0;
                  $jumlah_pengeluaran_bbj = 0;
                  $jumlah_pengeluaran_bm = 0;
                  $total_penerimaan = 0;
                  $total_pengeluaran = 0;

                  foreach ($data as $d): 
                    $saldo = $saldo + $d->penerimaan_bendahara +$d->penerimaan_sdm - $d->pengeluaran_bbj - $d->pengeluaran_bm;
                    $jumlah_penerimaan_bendahara = $jumlah_penerimaan_bendahara + $d->penerimaan_bendahara;
                    $jumlah_penerimaan_sdm = $jumlah_penerimaan_sdm + $d->penerimaan_sdm;
                    $jumlah_pengeluaran_bbj = $jumlah_pengeluaran_bbj + $d->pengeluaran_bbj;
                    $jumlah_pengeluaran_bm = $jumlah_pengeluaran_bm + $d->pengeluaran_bm;   
                    $total_penerimaan =  $jumlah_penerimaan_bendahara + $jumlah_penerimaan_sdm;
                    $total_pengeluaran = $jumlah_pengeluaran_bbj + $jumlah_pengeluaran_bm;                
                  ?>
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
                          <div class="dropdown-header">Aksi:</div>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/edit/'.$d->id)?>">Edit</a>
                          <a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/detail/'.$d->id)?>">Detail</a>
                          <!--<div class="dropdown-divider"></div>-->
                          </div>
                        </div>
                      </td>
                      <td><?= date("d-m-Y", strtotime($d->tanggal))?></td>
                      <td><?=$d->uraian?></td>
                      <td>Rp. <?=number_format($d->penerimaan_bendahara,0,',','.');?></td>
                      <td>Rp. <?=number_format($d->penerimaan_sdm,0,',','.');?></td>
                      <td>Rp. <?=number_format($d->pengeluaran_bbj,0,',','.');?></td>
                      <td>Rp. <?=number_format($d->pengeluaran_bm,0,',','.');?></td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th colspan="4">Jumlah</th>
                        <th colspan="1">Rp. <?=number_format($jumlah_penerimaan_bendahara,0,',','.');?></th>
                        <th colspan="1">Rp.<?=number_format($jumlah_penerimaan_sdm,0,',','.');?></th>
                        <th colspan="1">Rp. <?=number_format($jumlah_pengeluaran_bbj,0,',','.');?></th>
                        <th colspan="1">Rp. <?=number_format($jumlah_pengeluaran_bm,0,',','.');?></th>
                      </tr>
                    <tr>
                        <th colspan="4">Total Penerimaan</th>
                        <th colspan="2">Rp. <?=number_format($total_penerimaan,0,',','.');?> </th>
                        <th colspan="2">Total Pengeluaran Rp. <?=number_format($total_pengeluaran,0,',','.');?></th>
                    </tr>
                    <tr>
                        <th colspan="4">Saldo Kas</th>
                        <th colspan="4">Rp. <?=number_format($saldo,0,',','.');?></th>
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