        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?=$breadcrumb?>
                  </h6>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url()?>admin/<?=$folder?>'">Kembali</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                <?php foreach($data as $d):?>
                    <div class="modal-header  border-bottom">
                    <h5 class="modal-title"><b>Data Rencana Anggaran Biaya : <?=$d->bidang?></b></h5>
                    </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom">
                                          <div class="card-body">
                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                                  <tr><th>Bidang</th>
                                                  <td><?=$d->bidang?></td></tr>

                                                  <tr><th>Kegiatan</th>
                                                  <td><?=$d->kegiatan?></td></tr>                                                                                      

                                                  <tr><th>Waktu Pelaksanaan</th>
                                                  <td><?=$d->waktu_pelaksanaan?></td></tr>

                                                  <tr><th>Tahun Anggaran</th>
                                                  <td><?=$d->tahun_anggaran?></td></tr>
                                                  
                                              </table>                                            
                                        
                                              <h8><b> Rincian Pendanaan</b></h8>
                                              <table class="table table-bordered table-hover border-left-primary">
                                              <thead>
                                                  <tr>
                                                  <th>Uraian</th>
                                                  <td style="text-align:right"><?=$d->uraian?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Volume</th>
                                                  <td style="text-align:right"><?=$d->volume?></td>
                                                  </tr> 

                                                  <tr>
                                                  <th>Harga Satuan</th>
                                                  <td style="text-align:right">Rp.<?=number_format($d->harga_satuan,0,',','.');?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Jumlah</th>
                                                  <td style="text-align:right">Rp.<?=number_format($d->jumlah,0,',','.');?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Terakhir diubah</th>
                                                  <td style="text-align:right"><?=$d->updated_at?> oleh <?=$d->updated_by?></td>
                                                  </tr >

                                                 </thead>
                                              </table>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                        
                  <?php endforeach;?>
                    
                    
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->