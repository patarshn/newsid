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
                    <h5 class = "text-gray-600 font-weight-bold">Buku Tanah Kas Desa: <?=$d->asal_tnh_kas?></h5>
                </div>
                    <div class="card mb-4 py-3 border-bottom-primary">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Asal Tanah Kas Desa</th>
                                    <td><?=$d->asal_tnh_kas?></td>
                                </tr >

                                <tr>
                                    <th>Nomor Sertifikat Buku Letter C/Persil</th>
                                    <td><?=$d->no_serti_letterc_persil?></td>
                                </tr >

                                <tr>
                                    <th>Luas</th>
                                    <td><?=$d->luas?></td>
                                </tr >

                                <tr>
                                    <th>Kelas</th>
                                    <td><?=$d->kelas?></td>
                                </tr >

                                <tr>
                                    <th>Lokasi</th>
                                    <td><?=$d->lokasi?></td>
                                </tr >

                                <tr>
                                    <th>Peruntukkan</th>
                                    <td><?=$d->peruntukkan?></td>
                                </tr >

                                <tr>
                                    <th>Mutasi</th>
                                    <td>
                                    <?php if($d->mutasi != 0):?>
                                    <?=$d->mutasi?>
                                    <?php else :?>
                                    Tidak ada Mutasi
                                    <?php endif; ?>
                                    </td>
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

                            <h8><b>Perolehan TKD</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                <tr>
                                    <th width="30%">Asli Milik Desa</th>
                                    <td><?=$d->peroleh_asli_milik_desa?></td>
                                </tr >

                                <tr>
                                    <th>Bantuan Pemerintah</th>
                                    <td><?=$d->bantuan_pem?></td>
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
                                    <th>Lain-Lain</th>
                                    <td><?=$d->peroleh_lain?></td>
                                </tr >

                                <tr>
                                    <th>Tanggal Perolehan</th>
                                    <td><?=$d->tgl_peroleh?></td>
                                </tr >
                            </table>

                            <h8><b>Jenis TKD</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                    <tr>
                                    <th width="30%">Sawah</th>
                                    <td><?=$d->jenis_sawah?></td>
                                </tr >
                                
                                <tr>
                                    <th>Tegal</th>
                                    <td><?=$d->jenis_tegal?></td>
                                </tr >

                                <tr>
                                    <th>Kebun</th>
                                    <td><?=$d->jenis_kebun?></td>
                                </tr >

                                <tr>
                                    <th>Tambak/Kolam</th>
                                    <td><?=$d->jenis_tambak?></td>
                                </tr >

                                <tr>
                                    <th>Tanah Kering/Darat</th>
                                    <td><?=$d->jenis_darat?></td>
                                </tr >
                            </table>

                            <h8><b>Patok Tanda Batas</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                    <tr>
                                    <th width="30%">Ada</th>
                                    <td><?=$d->patok_ada?></td>
                                </tr >
                                
                                <tr>
                                    <th>Tidak Ada</th>
                                    <td><?=$d->patok_tdkada?></td>
                                </tr >
                            </table>

                            <h8><b>Papan Nama</b></h8>
                            <table class="table table-bordered table-hover border-left-primary mt-3">
                                    <tr>
                                    <th width="30%">Ada</th>
                                    <td><?=$d->papan_ada?></td>
                                </tr >
                                
                                <tr>
                                    <th>Tidak Ada</th>
                                    <td><?=$d->papan_tdkada?></td>
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

