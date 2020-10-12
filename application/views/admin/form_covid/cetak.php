
<center>
<p>Pekon Wonodadi</p>
<p>Pringsewu</p>
<p>Lampung</p>
<hr>
<hr>
<h2>Pengajuan Kartu Keluarga</h2>
</center>
                  
 
 

                  <?php foreach($kk as $k):?>
                    <table cellpadding="6">
                        <tr>
                            <td>NKK</td>
                            <td>:</td>
                            <td><?=$k->nkk?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?=$k->nik?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?=$k->nama?></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:</td>
                            <td><?=$k->tempat_lahir?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?=$k->tanggal_lahir?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?=$k->jenis_kelamin?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?=$k->agama?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><?=$k->pekerjaan?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td>:</td>
                            <td><?=$k->pendidikan?></td>
                        </tr>
                        <tr>
                            <td>Status Perkawinan</td>
                            <td>:</td>
                            <td><?=$k->status_perkawinan?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?=$k->alamat?></td>
                        </tr>
                        <tr>
                            <td>RT/RW</td>
                            <td>:</td>
                            <td><?=$k->rt?> <?=$k->rw?></td>
                        </tr>
                        <tr>
                            <td>Verifikasi RT</td>
                            <td>:</td>
                            <td><?=$k->verifikasi_rt?></td>
                        </tr>
                        <tr>
                            <td>Verifikasi RW</td>
                            <td>:</td>
                            <td><?=$k->verifikasi_rw?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengajuan</td>
                            <td>:</td>
                            <td><?=$k->tanggal_pengajuan?></td>
                        </tr>
                    </table>
                  <?php endforeach;?>
                    
                    



