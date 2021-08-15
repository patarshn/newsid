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
                        <h5 class = "text-gray-600 font-weight-bold">Buku Data Inventaris BPD: <?=$d->jenis_brng_bangunan?></h5>
                    </div>
                        <div class="card mb-4 py-3 border-bottom-primary">
                            <div class="col-lg-12">
                                <table class="table table-bordered table-hover border-left-primary mt-3">
                                    <tr>
                                        <th width="30%">Jenis Barang atau Bangunan</th>
                                        <td><?=$d->jenis_brng_bangunan?></td>
                                    </tr >

                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?=$d->ket?></td>
                                    </tr >
                                
                                    <tr>
                                        <th>Berkas</th>
                                        <td>
                                        <?php if($d->berkas != null && file_exists(FCPATH."administrasilainnya/".$folder."/".$d->berkas)):?>
                                        <?=$d->berkas?>
                                        <br>
                                        <a class="btn btn-primary" href="<?=base_url().'administrasilainnya/'.$folder.'/'.$d->berkas?>" target="_blank">Unduh Berkas</a>
                                        <?php else :?>
                                        Berkas Tidak Ada
                                        <?php endif; ?>
                                        </td>
                                        
                                    </tr >

                                    <tr>
                                        <th>Verifikasi Kepala BPD</th>
                                        <td><?=$d->verif_bpd?> <?=$d->verif_bpd_at?></td>
                                    </tr >

                                    <tr>
                                        <th>Terakhir diubah</th>
                                        <td><?=$d->updated_at?> oleh <?=$d->updated_by?></td>
                                    </tr >
                                </table>

                                <h8><b>Asal Barang atau Bangunan</b></h8>
                                <table class="table table-bordered table-hover border-left-primary mt-3">
                                    <tr>
                                        <th width="50%">APB Desa</th>
                                        <td><?=$d->abb_apb_desa?></td>
                                    </tr >

                                    <tr>
                                        <th>Bantuan Pemerintah</th>
                                        <td><?=$d->bantuan_pemerintah?></td>
                                    </tr >
                                    
                                    <tr>
                                        <th>Bantuan Provinsi</th>
                                        <td><?=$d->bantuan_prov?></td>
                                    </tr >

                                    <tr>
                                        <th>Bantuan Kab/Kota</th>
                                        <td><?=$d->bantuan_kab_kota?></td>
                                    </tr >

                                    <tr>
                                        <th>Sumbangan</th>
                                        <td><?=$d->abb_sumbangan?></td>
                                    </tr >
                                </table>

                                <h8><b>Keadaan Barang atau Bangunan Awal Tahun</b></h8>
                                <table class="table table-bordered table-hover border-left-primary mt-3">
                                     <tr>
                                        <th width="50%">Baik</th>
                                        <td><?=$d->awalthn_baik?></td>
                                    </tr >
                                    
                                    <tr>
                                        <th>Rusak</th>
                                        <td><?=$d->awalthn_rusak?></td>
                                    </tr >
                                </table>

                                <h8><b>Penghapusan Barang dan Bangunan</b></h8>
                                <table class="table table-bordered table-hover border-left-primary mt-3">
                                     <tr>
                                        <th width="50%">Rusak</th>
                                        <td><?=$d->hps_rusak?></td>
                                    </tr >
                                    
                                    <tr>
                                        <th>Dijual</th>
                                        <td><?=$d->hps_dijual?></td>
                                    </tr >

                                    <tr>
                                        <th>Disumbangkan</th>
                                        <td><?=$d->hps_disumbangkan?></td>
                                    </tr >

                                    <tr>
                                        <th>Tanggal Penghapusan</th>
                                        <td><?= date("d-m-Y", strtotime($d->tgl_hapus))?></td>
                                    </tr >
                                </table>

                                <h8><b>Keadaan Barang atau Bangunan Akhir Tahun</b></h8>
                                <table class="table table-bordered table-hover border-left-primary mt-3">
                                     <tr>
                                        <th width="50%">Baik</th>
                                        <td><?=$d->akhirthn_baik?></td>
                                    </tr >
                                    
                                    <tr>
                                        <th>Rusak</th>
                                        <td><?=$d->akhirthn_rusak?></td>
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

