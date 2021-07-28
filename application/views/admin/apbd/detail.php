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
                                        <td><?= date("d-m-Y", strtotime($d->tahun_anggaran))?></td>
                                    </tr >

                                    <tr>
                                        <th>Kode Rekening</th>
                                        <td><?=$d->kode_rekening1."-".$d->kode_rekening2."-".$d->kode_rekening3."-".$d->kode_rekening4?></td>
                                    </tr >

                                    <tr>
                                        <th>Uraian</th>
                                        <td><?=$d->uraian_apbd?></td>
                                    </tr >

                                    <tr>
                                        <th>anggaran</th>
                                        <td>Rp.<?=number_format($d->anggaran,0,',','.');?></td>
                                    </tr >
                                    
                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?=$d->keterangan?></td>
                                    </tr >

                                    <tr>
                                        <th>Terakhir diubah</th>
                                        <td><?= date("d-m-Y H:i:s", strtotime($d->updated_at))?> oleh <?=$d->updated_by?></td>
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

