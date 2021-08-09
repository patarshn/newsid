        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<!-- Content Row -->

        	<div class="row">
        		<div class="col-xl-12 col-lg-12">
        			<div class="card shadow mb-4">
        				<div
        					class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-primary">
        					<h6 class="m-0 font-weight-bold text-primary">
        						<?=$breadcrumb?>
        					</h6>
        				</div>
        			</div>
        		</div>
        	</div>

        	<!-- Content Row -->

        	<div class="row">
        		<?php if($this->session->flashdata('success_message')): ?>
        		<div class="alert alert-success col" id="success-message">
        			<?= $this->session->flashdata('success_message');?></div>
        		<?php endif ?>
        		<div class="alert alert-danger col d-none" id="error-message"></div>
        		<!-- Area Chart -->
        		<div class="col-xl-12 col-lg-12">
        			<div class="card shadow mb-4">
        				<!-- Card Header - Dropdown -->
        				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        					<h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
        					<div>
        						<div class="btn-group" role="group" aria-label="Basic example">
        							<button type="button" class="btn btn-warning"
        								onclick="window.location.href='<?=base_url()?>admin/<?=$folder?>'">Batal</button>
        						</div>
        					</div>
        				</div>
        				<!-- Card Body -->
        				<div class="card-body border-bottom-primary">
        					<?php echo form_open(base_url('buku_keputusan_kepala_desa/update'),'id="form"');
                foreach($data as $d):
                ?>
        					<h3 class="text-gray-900"><?=$title?></h3>
        					<input type="hidden" name="id" id="id" value="<?=$d->id?>">
        					<span class="text-danger font-weight-bold">*</span> <small
        						class="text-gray-900 font-weight-bold">Wajib Diisi</small>
        					<div class="form-row">
        						<div class="col-lg-6 mt-3">
        							<label for="nama" class="text-gray-900 font-weight-bold">Nama <span
        									class="text-danger">*</span></label>
        							<input type="text" name="nama" id="nama" class="form-control border-left-primary"
        								value="<?=$d->nama?>" maxlength="100" required>
        							<small id="nama" class="text-gray-700">Diisi dengan nama lengkap</small>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label for="niap" class="text-gray-900 font-weight-bold">NIAP <span
        									class="text-danger">*</span></label>
        							<input type="text" name="niap" id="niap" class="form-control border-left-primary"
        								value="<?=$d->niap?>" onkeypress="return onlyNumberKey(event)" maxlength="18"
        								required>
        							<small id="niap" class="text-gray-700">Diisi dengan Nomor Induk Aparat Pemerintah
        								Desa</small>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<div class="form-group">
        								<label for="jenis_kelamin" class="text-gray-900 font-weight-bold">Jenis Kelamin
        									<span class="text-danger">*</span></label>
        								<select name="jenis_kelamin" id="jenis_kelamin"
        									class="form-control border-left-primary" required>
        									<option value="PEREMPUAN"
        										<?= $d->jenis_kelamin == "PEREMPUAN" ? "selected": "" ?>>Perempuan
        									</option>
        									<option value="LAKI-LAKI"
        										<?= $d->jenis_kelamin == "LAKI-LAKI" ? "selected": "" ?>>Laki-Laki
        									</option>
        								</select>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label for="nip" class="text-gray-900 font-weight-bold">NIP</label>
        							<input type="text" name="nip" id="nip" class="form-control border-left-primary"
        								value="<?=$d->nip?>" onkeypress="return onlyNumberKey(event)" maxlength="18"
        								required>
        							<small id="nip" class="text-gray-700">Jika Tidak Mempunyai NIP boleh untuk Tidak
        								Diisi</small>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label class="text-gray-900 font-weight-bold">Tempat dan Tanggal Lahir <span
        									class="text-danger">*</span></label>
        							<div class="form-row">
        								<div class="col-lg-6">
        									<input type="text" name="tempat" id="tempat"
        										class="form-control border-left-primary" value="<?=$d->tempat?>"
        										maxlength="100" required>
        									<small id="tempat" class="text-gray-700">Tempat Lahir</small>
        								</div>

        								<div class="col-lg-6">
        									<input type="date" name="tgl" id="tgl"
        										class="form-control border-left-primary" value="<?=$d->tgl?>" required>
        									<small id="tgl" class="text-gray-700">Tanggal Lahir</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<div class="form-group">
        								<label for="agama" class="text-gray-900 font-weight-bold">Agama <span
        										class="text-danger">*</span></label>
        								<select name="agama" id="agama" class="form-control border-left-primary"
        									placeholder="Agama" required>
        									<option value="Islam">Islam</option>
        									<option value="Kristen">Kristen</option>
        									<option value="Katholik">Katholik</option>
        									<option value="Buddha">Buddha</option>
        									<option value="Hindu">Hindu</option>
        									<option value="Konghucu">Konghucu</option>
        								</select>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label for="jabatan" class="text-gray-900 font-weight-bold">Jabatan <span
        									class="text-danger">*</span></label>
        							<input type="text" name="jabatan" id="jabatan"
        								class="form-control border-left-primary" value="<?=$d->jabatan?>"
        								maxlength="100" required>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label for="pangkat_golongan" class="text-gray-900 font-weight-bold">Pangkat
        								Golongan <span class="text-danger">*</span></label>
        							<input type="text" name="pangkat_golongan" id="pangkat_golongan"
        								class="form-control border-left-primary" value="<?=$d->pangkat_golongan?>"
        								maxlength="100" required>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label for="pendidikan_terakhir" class="text-gray-900 font-weight-bold">Pendidikan
        								Terakhir <span class="text-danger">*</span></label>
        							<input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir"
        								class="form-control border-left-primary" value="<?=$d->pendidikan_terakhir?>"
        								maxlength="100" required>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label class="text-gray-900 font-weight-bold">Nomor dan Tanggal Keputusan
        								Pengangkatan <span class="text-danger">*</span></label>
        							<div class="form-row">
        								<div class="col-lg-6">
        									<input type="text" name="no_keputusan_pengangkatan"
        										id="no_keputusan_pengangkatan" class="form-control border-left-primary"
        										value="<?=$d->no_keputusan_pengangkatan?>" maxlength="100" required>
        									<small id="no_keputusan_pengangkatan" class="text-gray-700">Nomor Keputusan
        										Pengangkatan</small>
        								</div>

        								<div class="col-lg-6">
        									<input type="date" name="tgl_keputusan_pengangkatan"
        										id="tgl_keputusan_pengangkatan" class="form-control border-left-primary"
        										placeholder="mm/dd/yyyy" value="<?=$d->tgl_keputusan_pengangkatan?>"
        										required>
        									<small id="tgl_keputusan_pengangkatan" class="text-gray-700">Tanggal
        										Keputusan
        										Pengangkatan</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label class="text-gray-900 font-weight-bold">Nomor dan Tanggal Keputusan
        								Pemberhentian <span class="text-danger">*</span></label>
        							<div class="form-row">
        								<div class="col-lg-6">
        									<input type="text" name="no_keputusan_pemberhentian"
        										id="no_keputusan_pemberhentian" class="form-control border-left-primary"
        										value="<?=$d->no_keputusan_pemberhentian?>" maxlength="100" required>
        									<small id="no_keputusan_pemberhentian" class="text-gray-700">Nomor Keputusan
        										Pemberhentian</small>
        								</div>

        								<div class="col-lg-6">
        									<input type="date" name="tgl_keputusan_pemberhentian"
        										id="tgl_keputusan_pemberhentian"
        										class="form-control border-left-primary" placeholder="mm/dd/yyyy"
        										value="<?=$d->tgl_keputusan_pemberhentian?>" required>
        									<small id="tgl_keputusan_pemberhentian" class="text-gray-700">Tanggal
        										Keputusan
        										Pemberhentian</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<input type="hidden" name="old_file" value=<?=$d->berkas?>>
        							<label class="text-gray-900 font-weight-bold">Upload Berkas</label>
        							<div class="custom-file">
        								<label for="berkas" class="custom-file-label border-left-primary">
        									<?php if($d->berkas != null && file_exists(FCPATH."uploads/".$folder."/".$d->berkas)):?>
        									<?=$d->berkas?>
        									<?php else :?>
        									berkas Tidak ada
        									<?php endif;?>
        								</label>
        								<input type="file" class="custom-file-input" id="berkas" name="berkas"
        									accept=".pdf">
        								<small id="berkas" class="text-gray-700">Berkas berformat .pdf</small>
        							</div>
        						</div>

        						<div class="col-lg-12 mt-3">
        							<div class="form-group">
        								<label for="ket" class="text-gray-900 font-weight-bold">Keterangan</label>
        								<textarea class="form-control border-left-primary" name="ket" id="ket" rows="3"
        									maxlength="255" required><?=$d->ket?></textarea>
        								<small id="ket" class="text-gray-700">Diisi dengan catatan-catatan lain yang
        									dianggap
        									perlu</small>
        							</div>
        						</div>
        					</div>

        					<div class="col-lg-12 form-inline">
        						<label for="status" class="mr-sm-2">Verifikasi Kepala Desa : </label>
        						<br>
        						<input type="hidden" name="ver_kepala_desa_old" value="<?=$d->ver_kepala_desa?>">
        						<div class="form-check form-check-inline">
        							<input type="radio" name="ver_kepala_desa" id="ver_kepala_desa1" value="Pending"
        								class="form-control"
        								<?php if($d->ver_kepala_desa == "Pending"){echo "checked";}?>>
        							<label class="form-check-label" for="ver_kepala_desa1">Pending</label>
        						</div>
        						<div class="form-check form-check-inline">
        							<input type="radio" name="ver_kepala_desa" id="ver_kepala_desa2" value="Disetujui"
        								class="form-control"
        								<?php if($d->ver_kepala_desa == "Disetujui"){echo "checked";}?>>
        							<label class="form-check-label" for="ver_kepala_desa2">Disetujui</label>
        						</div>
        						<div class="form-check form-check-inline">
        							<input type="radio" name="ver_kepala_desa" id="ver_kepala_desa3" value="Ditolak"
        								class="form-control"
        								<?php if($d->ver_kepala_desa == "Ditolak"){echo "checked";}?>>
        							<label class="form-check-label" for="ver_kepala_desa3">Ditolak</label>
        						</div>
        					</div>

        					<script>
        						var agama = "<?=$d->agama?>";
        						$(document).ready(function () {
        							$('#agama').val(agama);
        						});

        					</script>

        					<?php
                endforeach;
                echo form_close();
                ?>

        					<div class="d-flex mt-3">
        						<button type="button" class="btn btn-success active-button align-self-center"
        							onclick="store(base_url+'admin/<?=$uri[2]?>/update','#form')">Simpan</button>
        						<div class="spinner-border m-1 align-self-center text-primary d-none" role="status"
        							id="loading">
        							<span class="sr-only">Loading...</span>
        						</div>
        					</div>


        				</div>
        			</div>
        		</div>
        	</div>



        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <script>
        	function onlyNumberKey(evt) {

        		// Only ASCII character in that range allowed
        		var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        		if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        			return false;
        		return true;
        	}

        </script>
