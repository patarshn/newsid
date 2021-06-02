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
          <?php foreach($data as $d):
                    $berkas = json_decode($d->berkas);
                    ?>
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success" onclick="window.open('../cetak/<?=$d->id?>','_blank')">Cetak</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  
                    <table cellpadding="6">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td><?=$d->id?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><h5><u>Data Anak</u></h5></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?=$d->nama_anak?></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:</td>
                            <td><?=$d->tempat_lahir_anak?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?=$d->tanggal_lahir_anak?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?=$d->jenis_kelamin_anak?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?=$d->agama_anak?></td>
                        </tr>
                        <tr>
                            <td>Anak ke-</td>
                            <td>:</td>
                            <td><?=$d->ke_anak?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><h5><u>Data Ayah</u></h5></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?=$d->nik_ayah?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?=$d->nama_ayah?></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:</td>
                            <td><?=$d->tempat_lahir_ayah?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?=$d->tanggal_lahir_ayah?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?=$d->agama_ayah?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><?=$d->pekerjaan_ayah?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><h5><u>Data Ibu</u></h5></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?=$d->nik_ibu?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?=$d->nama_ibu?></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:</td>
                            <td><?=$d->tempat_lahir_ibu?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?=$d->tanggal_lahir_ibu?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?=$d->agama_ibu?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><?=$d->pekerjaan_ibu?></td>
                        </tr>
                        
                        <tr>
                            <td colspan="3"><h5><u>Alamat</u></h5></td>
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
                            <td>Berkas KTP</td>
                            <td>:</td>
                            <td>
                            <img src="<?=base_url('uploads/form_belummenikah/'.$berkas->file_ktp)?>" width="50%">
                            </td>
                        </tr>
                        <tr>
                            <td>Berkas KK</td>
                            <td>:</td>
                            <td>
                            <img src="<?=base_url('uploads/form_belummenikah/'.$berkas->file_kk)?>" width="50%">
                            </td>
                        </tr>
                        <tr>
                            <td>Berkas KTP</td>
                            <td>:</td>
                            <td>
                            <img src="<?=base_url('uploads/form_belummenikah/'.$berkas->file_ktp)?>" width="50%">
                            </td>
                        </tr>
                        <tr>
                            <td>Berkas KK</td>
                            <td>:</td>
                            <td>
                            <img src="<?=base_url('uploads/form_belummenikah/'.$berkas->file_kk)?>" width="50%">
                            </td>
                        </tr>
                        <tr>
                            <td>Terakhir diubah</td>
                            <td>:</td>
                            <td><?=$d->updated_at?> oleh <?=$d->updated_by?></td>
                        </tr>
                    </table>
                  
                    
                    
                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

