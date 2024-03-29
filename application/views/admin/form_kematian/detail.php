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
                        <!--<button type="button" class="btn btn-warning">Cancel</button>-->
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <?php foreach($data as $d):
                    $berkas = json_decode($d->berkas);
                    ?>
                    <table class="table table-bordered table-hover border-left-primary mt-3"cellpadding="6">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td><?=$d->id?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?=$d->nik?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?=$d->nama?></td>
                        </tr>
                        <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td><?=$d->usia?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?=$d->agama?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?=$d->alamat?></td>
                        </tr>
                        <tr>
                            <td>RT/RW</td>
                            <td>:</td>
                            <td><?=$d->rt?>/<?=$d->rw?></td>
                        </tr>
                        <tr>
                            <td>Pekon</td>
                            <td>:</td>
                            <td><?=$d->pekon?></td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td><?=$d->kecamatan?></td>
                        </tr>
                        <tr>
                            <td>Kabupaten</td>
                            <td>:</td>
                            <td><?=$d->kabupaten?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kematian</td>
                            <td>:</td>
                            <td><?=$d->tanggal_kematian?></td>
                        </tr>
                        
                        <tr>
                            <td>Tempat Kematian</td>
                            <td>:</td>
                            <td><?=$d->tempat_kematian?></td>
                        </tr>
                        <tr>
                            <td>Waktu Kematian</td>
                            <td>:</td>
                            <td><?=$d->waktu_kematian?></td>
                        </tr>
                        <tr>
                            <td>Penyebab Kematian</td>
                            <td>:</td>
                            <td><?=$d->penyebab_kematian?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pemakaman</td>
                            <td>:</td>
                            <td><?=$d->tanggal_pemakaman?></td>
                        </tr>
                        
                        <tr>
                            <td>Tempat Pemakaman</td>
                            <td>:</td>
                            <td><?=$d->tempat_pemakaman?></td>
                        </tr>
                        <tr>
                            <td>Waktu Pemakaman</td>
                            <td>:</td>
                            <td><?=$d->waktu_pemakaman?></td>
                        </tr>
                        <tr>
                            <td>Verif Lurah</td>
                            <td>:</td>
                            <td><?=$d->verif_lurah?> <?=$d->verif_lurah_at?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengajuan</td>
                            <td>:</td>
                            <td><?=$d->created_at?></td>
                        </tr>
                        <tr>
                            <td>No Telp/WA</td>
                            <td>:</td>
                            <td><?=$d->notelp?></td>
                        </tr>
                        
                        <tr>
                            <td>Berkas KTP</td>
                            <td>:</td>
                            <td>
                            <img src="<?=base_url('uploads/'.$folder.'/'.$berkas->file_ktp)?>" width="50%">
                            </td>
                        </tr>
                        <tr>
                            <td>Berkas KK</td>
                            <td>:</td>
                            <td>
                            <img src="<?=base_url('uploads/'.$folder.'/'.$berkas->file_kk)?>" width="50%">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Terakhir diubah</td>
                            <td>:</td>
                            <td><?=$d->updated_at?> oleh <?=$d->updated_by?></td>
                        </tr>
                    </table>
                  <?php endforeach;?>
                    
                    
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

