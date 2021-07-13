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
                    <h5 class="modal-title"><b>Data Bank Desa : <?=$d->bank_cabang?></b></h5>
                    </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <div class="card mb-4 py-3 border-bottom">
                                          <div class="card-body">
                                              <table class="table table-bordered table-hover border-left-primary border-bottom-primary">
                                              <thead>
                                                  <tr>
                                                  <th>Bulan</th>
                                                  <td><?=$d->bulan?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Bank Cabang</th>
                                                  <td><?=$d->bank_cabang?></td>
                                                  </tr> 

                                                  <tr>
                                                  <th>No Rekening</th>
                                                  <td><?=$d->rekening?></td>
                                                  </tr>                                                                                      

                                              </table>                                            
                                        
                                              <h8><b> Rincian Bank Desa</b></h8>
                                              <table class="table table-bordered table-hover border-left-primary ">
                                              <thead>
                                                  <tr>
                                                  <th>Tanggal Transaksi</th>
                                                  <td style="text-align:right"><?=$d->tgl_trans?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Uraian</th>
                                                  <td style="text-align:right"><?=$d->uraian_trans?></td>
                                                  </tr> 

                                                  <tr>
                                                  <th>Bukti Transaksi</th>
                                                  <td style="text-align:right"><?=$d->bukti_trans?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Pemasukan Setoran</th>
                                                  <td style="text-align:right">Rp. <?=$d->pmskn_setoran?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Pemasukan Bunga Bank</th>
                                                  <td style="text-align:right">Rp. <?=$d->pmskn_bungabank?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Pengeluaran Penarikan</th>
                                                  <td style="text-align:right">Rp. <?=$d->pngl_penarikan?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Pengeluaran Pajak</th>
                                                  <td style="text-align:right">Rp. <?=$d->pngl_pajak?></td>
                                                  </tr>

                                                  <tr>
                                                  <th>Pengeluaran Biaya Administrasi</th>
                                                  <td style="text-align:right">Rp. <?=$d->pngl_biaya_adm?></td>
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
                        
                  <?php endforeach;?>
                    
                    
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->