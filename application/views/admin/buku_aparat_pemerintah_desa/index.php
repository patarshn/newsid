<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-12">

			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-primary">
					<h6 class="m-0 font-weight-bold text-primary">
						<?=$breadcrumb?>
					</h6>
				</div>
			</div>
		</div>
		<?php if($this->session->flashdata('success_message')): ?>
		<div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
		<?php endif ?>
		<div class="alert alert-danger col d-none" id="error-message"></div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
			<h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
			<div>
				<div class="btn-group" role="group" aria-label="Basic example">
					<a class="btn btn-success" href="<?=base_url('admin/'.$uri[2].'/add/');?>">Tambah Data</a>
					<a class="btn btn-warning" href="<?=base_url('admin/'.$uri[2].'/cetak/');?>">Cetak</a>
					<!--<button type="button" id="`deletebtn`" class="btn btn-danger">Delete</button>-->
					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="aksibtn"
						aria-haspopup="true" aria-expanded="false">Aksi</button>
					<div class="dropdown-menu">
						<button type="button" id="setujubtn" class="dropdown-item btn btn-success">Setujui</button>
						<button type="button" id="tolakbtn" class="dropdown-item btn btn-warning">Tolak</button>
						<button type="button" id="deletebtn" class="dropdown-item btn btn-danger">Hapus</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<form method="POST" id="formdelete">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th width="5%"><input type="checkbox" class="rowdelete" id="selectAll"></th>
								<th width="5%">No</th>
								<th width="3%"></th>
								<th>Nama</th>
								<th>NIAP</th>
								<th>NIP</th>
								<th>Jabatan</th>
								<th>Pengajuan</th>
								<th width="10%">Verif Kepala Desa</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th width="5%"></th>
								<th width="5%">No</th>
								<th width="3%"></th>
								<th>Nama</th>
								<th>NIAP</th>
								<th>NIP</th>
								<th>Jabatan</th>
								<th>Pengajuan</th>
								<th>Verif Kepala Desa</th>
							</tr>
						</tfoot>
						<tbody>

							<?php 
                  $count = 1;
                  foreach ($data as $d): ?>
							<tr>
								<td><input type="checkbox" name="rowdelete[]" value="<?=$d->id?>" class="rowdelete"></td>
								<td><?=$count++;?></td>
								<td>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle btn btn-sm btn-secondary " href="#" role="button" id="dropdownMenuLink"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
											aria-labelledby="dropdownMenuLink">
											<div class="dropdown-header">Actions:</div>
											<a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/edit/'.$d->id)?>">Edit</a>
											<a class="dropdown-item" href="<?=base_url('admin/'.$uri[2].'/detail/'.$d->id)?>">Detail</a>
											<!--<div class="dropdown-divider"></div>-->
										</div>
									</div>
								</td>
								<td><?=$d->nama?></td>
								<td><?=$d->niap?></td>
								<td><?php if($d->nip != NULL):?>
									<?=$d->nip?>
									<?php else :?>
									Belum Memiliki NIP
									<?php endif; ?></td>
								<td><?=$d->jabatan?></td>
								<td>
									<?php
                      $pengajuan  = explode(" ",$d->created_at);
                      echo $pengajuan[0]."<br>";
                      echo $pengajuan[1];
                      ?>
								</td>
								<td>
									<?php 
                        if($d->ver_kepala_desa_at == null){
                          $verif_time = "";
                        }
                        else{
                          $ver_kepala_desa_at  = explode(" ",$d->ver_kepala_desa_at);
                          $verif_time = "<br>".$ver_kepala_desa_at[0]."<br>".$ver_kepala_desa_at[1]."<br>";
                        }
                        ?>
									<?php if($d->ver_kepala_desa == 'Pending'):?>
									<div class="card bg-gradient-warning text-white text-center">Pending <?=$verif_time?></div>
									<?php elseif($d->ver_kepala_desa == 'Disetujui'):?>
									<div class="card bg-gradient-success text-white text-center">Disetujui <?=$verif_time?></div>
									<?php elseif($d->ver_kepala_desa == 'Ditolak'):?>
									<div class="card bg-gradient-danger text-white text-center">Ditolak <?=$verif_time?></div>
									<?php endif;?>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- SUBMIT FORM DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="alertModalMessage">
				Data yang akan dihapus tidak dapat dikembalikan lagi, konfirmasi untuk menghapus data.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger"
					onclick="store(base_url+'admin/<?=$uri[2]?>/destroy','#formdelete')">Hapus</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>
