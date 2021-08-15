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
                    <h5 class = "text-gray-600 font-weight-bold">Buku Agenda</h5>
                </div>
                    <div class="card mb-4 py-3 border-bottom-primary">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Tanggal Penerimaan/Pengiriman Surat</th>
                                    <td><?=$d->tanggal_surat?></td>
                                </tr >

                                <tr>
                                    <th>Keterangan</th>
                                    <td>
                                    <?php if($d->ket != 0):?>
                                    <td><?=$d->ket?></td>
                                    <?php else :?>
                                    Tidak ada Keterangan
                                    <?php endif; ?>
                                    </td>
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
                                    <?php endif;?>
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
                            <?php if($d->status_surat == "PENERIMAAN"):?>
                            <h8><b>Surat Masuk</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Nomor</th>
                                    <td><?=$d->sm_no?></td>
                                </tr >

                                <tr>
                                    <th>Tanggal</th>
                                    <td><?=$d->sm_tgl?></td>
                                </tr >
                                
                                <tr>
                                    <th>Pengirim</th>
                                    <td><?=$d->sm_pengirim?></td>
                                </tr >

                                <tr>
                                    <th>Isi Singkat</th>
                                    <td><?=$d->sm_isi?></td>
                                </tr >
                            </table>

                            <?php elseif($d->status_surat == "PENGIRIMAN"):?>
                            <h8><b>Surat Keluar</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Nomor</th>
                                    <td><?=$d->sk_no?></td>
                                </tr >

                                <tr>
                                    <th>Tanggal</th>
                                    <td><?=$d->sk_tgl?></td>
                                </tr >
                                
                                <tr>
                                    <th>Ditunjukkan Kepada</th>
                                    <td><?=$d->sk_ditunjukkan?></td>
                                </tr >

                                <tr>
                                    <th>Isi Surat</th>
                                    <td><?=$d->sk_isi?></td>
                                </tr >
                            </table>
                            <?php endif;?>
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

