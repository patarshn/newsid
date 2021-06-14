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
                    <div class="border-bottom-primary mb-4">
                        <h5 class = "text-gray-600 font-weight-bold">Buku Peraturan Desa: <?=$d->jenis_peraturan_desa?></h5>
                    </div>
                        <div class="card mb-4 py-3 border-bottom-primary">
                            <div class="col-lg-12">
                                <table class="table table-bordered table-hover border-left-primary mt-3">

                                    <tr>
                                        <th width="50%">Jenis Peraturan Desa</th>
                                        <td><?=$d->jenis_peraturan_desa?></td>
                                    </tr >

                                    <tr>
                                        <th>Tentang</th>
                                        <td><?=$d->tentang?></td>
                                    </tr >

                                    <tr>
                                        <th>Tanggal Kesepakatan Peraturan Desa</th>
                                        <td><?=$d->tgl_kesepakatan_peraturan_desa?></td>
                                    </tr >

                                    <tr>
                                        <th>Nomor dan Tanggal ditetapkan</th>
                                        <td><?=$d->no_dan_tgl_ditetapkan?></td>
                                    </tr >

                                    <tr>
                                        <th>Nomor dan Tanggal Dilaporkan</th>
                                        <td><?=$d->no_dan_tgl_dilaporkan?></td>
                                    </tr >

                                    <tr>
                                        <th>Nomor dan Tanggal Diundangkan Dalam Lembaran Desa</th>
                                        <td><?=$d->no_dan_tgl_diundangkan_dalam_lembaran_desa?></td>
                                    </tr >

                                    <tr>
                                        <th>Nomor dan Tanggal Diundangkan Dalam Berita Desa</th>
                                        <td><?=$d->no_dan_tgl_diundangkan_dalam_berita_desa?></td>
                                    </tr >
                                    
                                    <tr>
                                        <th>Uraian Singkat</th>
                                        <td><?=$d->uraian_singkat?></td>
                                    </tr >

                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?=$d->ket?></td>
                                    </tr >

                                    <tr>
                                        <th>Berkas</th>
                                        <td>
                                        <?php if($d->berkas != null):?>
                                        <?=$d->berkas?>
                                        <br>
                                        <a class="btn btn-primary" href="<?=base_url().'uploads/'.$folder.'/'.$d->berkas?>" target="_blank">Unduh Berkas</a>
                                        <?php else :?>
                                        berkas Tidak ada
                                        <?php endif; ?>
                                        </td>
                                        
                                    </tr >

                                    <tr>
                                        <th>Verifikasi Kepala Desa</th>
                                        <td><?=$d->ver_kepala_desa?> <?=$d->ver_kepala_desa_at?></td>
                                    </tr >

                                    <tr>
                                        <th>Tanggal Pengajuan</th>
                                        <td><?=$d->created_at?></td>
                                    </tr >

                                    <tr>
                                        <th>Terakhir diubah</th>
                                        <td><?=$d->updated_at?> oleh <?=$d->updated_by?></td>
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

