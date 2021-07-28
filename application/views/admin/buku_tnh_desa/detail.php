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
                    <h5 class = "text-gray-600 font-weight-bold">Buku Tanah di Desa: <?=$d->nama_perorangan_bdn_hkm?></h5>
                </div>
                    <div class="card mb-4 py-3 border-bottom-primary">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Nama Perorangan/Badan Hukum</th>
                                    <td><?=$d->nama_perorangan_bdn_hkm?></td>
                                </tr >

                                <tr>
                                    <th>Jumlah</th>
                                    <td><?=$d->jml?></td>
                                </tr>

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

                            <h8><b>Status Hak Tanah Sudah Bersertifikat</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Hak Milik</th>
                                    <td><?=$d->sdh_serti_hm?> m<sup>2</sup></td>
                                </tr >

                                <tr>
                                    <th>Hak Guna Bangunan</th>
                                    <td><?=$d->sdh_serti_hgb?></td>
                                </tr >
                                
                                <tr>
                                    <th>Hak Pakai</th>
                                    <td><?=$d->sdh_serti_hp?></td>
                                </tr >

                                <tr>
                                    <th>Hak Guna Usaha</th>
                                    <td><?=$d->sdh_serti_hgu?></td>
                                </tr >

                                <tr>
                                    <th>Hak Pengelolaan</th>
                                    <td><?=$d->sdh_serti_hpl?></td>
                                </tr >
                            </table>

                            <h8><b>Status Hak Tanah Belum Bersertifikat</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                    <tr>
                                    <th width="30%">Hak Milik Adat</th>
                                    <td><?=$d->blm_serti_ma?></td>
                                </tr >
                                
                                <tr>
                                    <th>Hak Verponding Indonesia</th>
                                    <td><?=$d->blm_serti_vi?></td>
                                </tr >

                                <tr>
                                    <th>Tanah Negara</th>
                                    <td><?=$d->blm_serti_tn?></td>
                                </tr >
                            </table>

                            <h8><b>Penggunaan Tanah Pertanian</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Sawah</th>
                                    <td><?=$d->sdh_serti_hm?></td>
                                </tr >

                                <tr>
                                    <th>Tegalan</th>
                                    <td><?=$d->sdh_serti_hgb?></td>
                                </tr >
                                
                                <tr>
                                    <th>Perkebunan</th>
                                    <td><?=$d->sdh_serti_hp?></td>
                                </tr >

                                <tr>
                                    <th>Perternakan/Perikanan</th>
                                    <td><?=$d->sdh_serti_hgu?></td>
                                </tr >

                                <tr>
                                    <th>Hutan Belukar</th>
                                    <td><?=$d->sdh_serti_hpl?></td>
                                </tr >

                                <tr>
                                    <th>Hutan Lebat/Lindung</th>
                                    <td><?=$d->sdh_serti_hgb?></td>
                                </tr >
                                
                                <tr>
                                    <th>Mutasi Tanah di Desa</th>
                                    <td><?=$d->sdh_serti_hp?></td>
                                </tr >

                                <tr>
                                    <th>Tanah Kosong</th>
                                    <td><?=$d->sdh_serti_hgu?></td>
                                </tr >

                                <tr>
                                    <th>Lain-Lain</th>
                                    <td><?=$d->sdh_serti_hpl?></td>
                                </tr >
                            </table>

                            <h8><b>Penggunaan Tanah Non Pertanian</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Perumahan</th>
                                    <td><?=$d->non_pertanian_perumahan?></td>
                                </tr >
                                
                                <tr>
                                    <th>Perdagangan dan Jasa</th>
                                    <td><?=$d->non_pertanian_dagang_jasa?></td>
                                </tr >

                                <tr>
                                    <th width="30%">Perkantoran</th>
                                    <td><?=$d->non_pertanian_kantor?></td>
                                </tr >
                                
                                <tr>
                                    <th>Industri</th>
                                    <td><?=$d->non_pertanian_industri?></td>
                                </tr >

                                <tr>
                                    <th width="30%">Fasilitas Umum</th>
                                    <td><?=$d->non_pertanian_fasilitas_umum?></td>
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

