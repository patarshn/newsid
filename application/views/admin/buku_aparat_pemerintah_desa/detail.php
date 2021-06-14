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
                        <h5 class = "text-gray-600 font-weight-bold">Buku Aparat Pemerintah Desa: <?=$d->nama?></h5>
                    </div>
                        <div class="card mb-4 py-3 border-bottom-primary">
                            <div class="col-lg-12">
                                <table class="table table-bordered table-hover border-left-primary mt-3">

                                    <tr>
                                        <th width="50%">Nama</th>
                                        <td><?=$d->nama?></td>
                                    </tr >

                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td><?=$d->jenis_kelamin?></td>
                                    </tr >

                                    <tr>
                                        <th>Tempat/Tanggal Lahir</th>
                                        <td><?=$d->tempat?>, <?=$d->tgl?> </td>
                                    </tr >

                                    <tr>
                                        <th>Agama</th>
                                        <td><?=$d->agama?></td>
                                    </tr >

                                    <tr>
                                        <th>NIAP</th>
                                        <td><?=$d->niap?></td>
                                    </tr >

                                    <tr>
                                        <th>NIP</th>
                                        <td><?=$d->nip?></td>
                                    </tr >

                                    <tr>
                                        <th>Jabatan</th>
                                        <td><?=$d->jabatan?></td>
                                    </tr >

                                    <tr>
                                        <th>Pangkat Golongan</th>
                                        <td><?=$d->pangkat_golongan?></td>
                                    </tr >

                                    <tr>
                                        <th>Pendidikan Terakhir</th>
                                        <td><?=$d->pendidikan_terakhir?></td>
                                    </tr >

                                    <tr>
                                        <th>Nomor dan Tanggal Keputusan Pengangkatan</th>
                                        <td><?=$d->no_keputusan_pengangkatan?>, <?=$d->tgl_keputusan_pengangkatan?></td>
                                    </tr >

                                    <tr>
                                        <th>Nomor dan Tanggal Keputusan Pemberhentian</th>
                                        <td><?=$d->no_keputusan_pemberhentian?>, <?=$d->tgl_keputusan_pemberhentian?></td>
                                    </tr >

                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?=$d->ket?></td>
                                    </tr >

                                    <tr>
                                        <th>Berkas</th>
                                        <td>
                                        <?php if($d->berkas != null && file_exists(FCPATH."uploads/".$folder."/".$d->berkas)):?>
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

