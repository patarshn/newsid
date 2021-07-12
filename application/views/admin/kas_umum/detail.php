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
                    <div class="border-bottom-primary mb-4">
                        <h5 class = "text-gray-600 font-weight-bold">Buku Anggaran Pendapatan dan Belanja Desa : <?= date("d-m-Y", strtotime($d->tahun_anggaran))?></h5>
                    </div>
                        <div class="card mb-4 py-3 border-bottom-primary">
                            <div class="col-lg-12">
                                <table class="table table-bordered table-hover border-left-primary mt-3">

                                    <tr>
                                        <th width="50%">Tahun Anggaran</th>
                                        <td style="text-align:right"><?= date("d-m-Y", strtotime($d->tahun_anggaran))?></td>
                                    </tr >

                                    <tr>
                                        <th width="50%">Tanggal</th>
                                        <td style="text-align:right"><?= date("d-m-Y", strtotime($d->tanggal))?></td>
                                    </tr >

                                    <tr>
                                        <th>Kode Rekening</th>
                                        <td style="text-align:right"><?=$d->kode_rekening?></td>
                                    </tr >

                                    <tr>
                                        <th>Uraian</th>
                                        <td style="text-align:right"><?=$d->uraian?></td>
                                    </tr >

                                    <tr>
                                        <th>Penerimaan</th>
                                        <td style="text-align:right">Rp. <?=number_format($d->penerimaan,0,',','.');?></td>
                                    </tr >
                                    
                                    <tr>
                                        <th>Pengeluaran</th>
                                        <td style="text-align:right">Rp. <?=number_format($d->pengeluaran,0,',','.');?></td>
                                    </tr >

                                    <tr>
                                        <th>No Bukti</th>
                                        <td style="text-align:right"><?=$d->no_bukti?></td>
                                    </tr >

                                    <tr>
                                        <th>Terakhir diubah</th>
                                        <td style="text-align:right"><?=$d->updated_at?> oleh <?=$d->updated_by?></td>
                                    </tr >
                                </table>
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

