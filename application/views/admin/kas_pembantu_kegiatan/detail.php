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
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?=base_url()?>admin/<?=$folder?>'">Batal</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                <?php foreach($data as $d):?>
                    <div class="modal-header  border-bottom">
                    <h5 class="modal-title"><b>Data Kas Pembantu Kegiatan : <?=$d->bidang?></b></h5>
                    </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom">
                                          <div class="card-body">
                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                                  <tr>
                                                  <th>Bidang</th>
                                                  <td><?=$d->bidang?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Kegiatan</th>
                                                  <td><?=$d->kegiatan?></td>
                                                  </tr>                                                                                      

                                              </table>                                            
                                        
                                              <h8><b> Rincian Kas Pembantu</b></h8>
                                              <table class="table table-bordered table-hover border-left-primary ">
                                              <thead>
                                                  <tr>
                                                  <th>Tanggal</th>
                                                  <td style="text-align:right"><?=$d->tanggal?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Uraian</th>
                                                  <td style="text-align:right"><?=$d->uraian?></td>
                                                  </tr> 

                                                  <tr>
                                                  <th>Penerimaan Dari Bendahara</th>
                                                  <td style="text-align:right">Rp. <?=$d->penerimaan_bendahara?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Penerimaan Dari Swadaya Masyarakat</th>
                                                  <td style="text-align:right">Rp. <?=$d->penerimaan_sdm?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Nomor Bukti</th>
                                                  <td style="text-align:right"><?=$d->no_bukti?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Pengeluaran Belanja Barang dan Jasa</th>
                                                  <td style="text-align:right"><?=$d->pengeluaran_bbj?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Pengeluaran Belanja Modal</th>
                                                  <td style="text-align:right">Rp. <?=$d->pengeluaran_bm?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Jumlah</th>
                                                  <td style="text-align:right">Rp. <?=$d->jumlah?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>saldo</th>
                                                  <td style="text-align:right">Rp. <?=$d->saldo?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Verifikasi Kepala Desa</th>
                                                  <td style="text-align:right"><?=$d->ver_kepala_desa?> <?=$d->ver_kepala_desa_at?></td>
                                                  </tr >

                                                  <tr>
                                                  <th>Terakhir diubah</th>
                                                  <td style="text-align:right"><?=$d->updated_at?> oleh <?=$d->updated_by?></td>
                                                  </tr >
                                                 </thead>
                                              </table>
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