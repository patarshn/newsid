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
        								onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
        						</div>
        					</div>
        				</div>
        				<!-- Card Body -->
        				<div class="card-body border-bottom-primary">
        					<?=form_open_multipart(base_url('buku_peraturan_desa/store'),'id="form"')?>
        					<h3 class="text-gray-900"><?=$title?></h3>
        					<span class="text-danger font-weight-bold">*</span> <small
        						class="text-gray-900 font-weight-bold">Wajib Diisi</small>
        					<div class="form-row">
        						<div class="col-lg-6 mt-3">
        							<label for="nama_perorangan_bdn_hkm" class="text-gray-900 font-weight-bold">Nama
        								Perorangan/Badan
        								Hukum <span class="text-danger">*</span></label>
        							<input type="text" name="nama_perorangan_bdn_hkm" id="nama_perorangan_bdn_hkm"
        								class="form-control border-left-primary" maxlength="100" required>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label for="jml" class="text-gray-900 font-weight-bold">Jumlah <span
        									class="text-danger">*</span></label>
        							<input type="text" name="jml" id="jml" class="form-control border-left-primary"
        								onkeypress="return onlyNumberKey(event)" required>
        							<small id="jml" class="text-gray-700">Diisi dalam meter persegi (m2)</small>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label class="text-gray-900 font-weight-bold">Upload Berkas</label>
        							<div class="custom-file">
        								<label for="berkas" class="custom-file-label border-left-primary">Pilih
        									Berkas</label>
        								<input type="file" class="custom-file-input" id="berkas" name="berkas"
        									accept=".pdf">
        								<small id="berkas" class="text-gray-700">Berkas berformat .pdf</small>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label class="text-gray-900 font-weight-bold">Status Hak Tanah Belum Bersertifikat
        								<span class="text-danger">*</span></label>
										<p><small>Catatan : Isikan (0) jika tidak ada Status Hak Tanah Belum Bersertifikat</small></p>
        							<div class="form-row">
        								<div class="col-lg-4">
        									<input type="text" name="blm_serti_ma" id="blm_serti_ma"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="blm_serti_ma" class="text-gray-700">Luas Hak Milik Adat</small>
        								</div>

        								<div class="col-lg-4">
        									<input type="text" name="blm_serti_vi" id="blm_serti_vi"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="blm_serti_vi" class="text-gray-700">Luas Hak Verponding
        										Indonesia</small>
        								</div>

        								<div class="col-lg-4">
        									<input type="text" name="blm_serti_tn" id="blm_serti_tn"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="blm_serti_tn" class="text-gray-700">Luas Tanah Negara</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label class="text-gray-900 font-weight-bold">Status Hak Tanah Sudah Bersertifikat
        								<span class="text-danger">*</span></label>
										<p><small>Catatan : Isikan (0) jika tidak ada Status Hak Tanah Sudah Bersertifikat</small></p>
        							<div class="form-row">
        								<div class="col-lg-3">
        									<input type="text" name="sdh_serti_hm" id="sdh_serti_hm"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="sdh_serti_hm" class="text-gray-700">Luas Hak Milik</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="sdh_serti_hgb" id="sdh_serti_hgb"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="sdh_serti_hgb" class="text-gray-700">Luas Hak Guna
        										Bangunan</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="sdh_serti_hp" id="sdh_serti_hp"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="sdh_serti_hp" class="text-gray-700">Luas Hak Pakai</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="sdh_serti_hgu" id="sdh_serti_hgu"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="sdh_serti_hgu" class="text-gray-700">Luas Hak Guna Usaha</small>
        								</div>

        								<div class="col-lg-3 mt-2">
        									<input type="text" name="sdh_serti_hpl" id="sdh_serti_hpl"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="sdh_serti_hpl" class="text-gray-700">Luas Hak Pengelolaan</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label class="text-gray-900 font-weight-bold">Penggunaan Tanah Non Pertanian <span
        									class="text-danger">*</span></label>
											<p><small>Catatan : Isikan (0) jika tidak ada Penggunaan Tanah Non Pertanian</small></p>
        							<div class="form-row">
        								<div class="col-lg-3">
        									<input type="text" name="non_pertanian_perumahan"
        										id="non_pertanian_perumahan" class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="non_pertanian_perumahan" class="text-gray-700">Luas
        										Perumahan</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="non_pertanian_dagang_jasa"
        										id="non_pertanian_dagang_jasa" class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="non_pertanian_dagang_jasa" class="text-gray-700">Luas Perdagangan
        										dan Jasa</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="non_pertanian_kantor" id="non_pertanian_kantor"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="non_pertanian_kantor" class="text-gray-700">Luas
        										Perkantoran</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="non_pertanian_industri" id="non_pertanian_industri"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="non_pertanian_industri" class="text-gray-700">Luas
        										Industri</small>
        								</div>

        								<div class="col-lg-3 mt-2">
        									<input type="text" name="non_pertanian_fasilitas_umum"
        										id="non_pertanian_fasilitas_umum"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="non_pertanian_fasilitas_umum" class="text-gray-700">Luas
        										Fasilitas Umum</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-12 mt-3">
        							<label class="text-gray-900 font-weight-bold">Penggunaan Tanah Pertanian <span
        									class="text-danger">*</span></label>
											<p><small>Catatan : Isikan (0) jika tidak ada Penggunaan Tanah Pertanian</small></p>
        							<div class="form-row">
        								<div class="col-lg-2">
        									<input type="text" name="pertanian_sawah" id="pertanian_sawah"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="pertanian_sawah" class="text-gray-700">Luas Sawah</small>
        								</div>

        								<div class="col-lg-2">
        									<input type="text" name="pertanian_tegalan" id="pertanian_tegalan"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="pertanian_tegalan" class="text-gray-700">Luas Tegalan</small>
        								</div>

        								<div class="col-lg-2">
        									<input type="text" name="pertanian_kebun" id="pertanian_kebun"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="pertanian_kebun" class="text-gray-700">Luas Perkebunan</small>
        								</div>

        								<div class="col-lg-2">
        									<input type="text" name="pertanian_ternak" id="pertanian_ternak"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="pertanian_ternak" class="text-gray-700">Luas
        										Peternakan/Perikanan</small>
        								</div>

        								<div class="col-lg-2">
        									<input type="text" name="pertanian_hutan" id="pertanian_hutan"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="pertanian_hutan" class="text-gray-700">Luas Hutan Belukar</small>
        								</div>

        								<div class="col-lg-2">
        									<input type="text" name="pertanian_hutan_lindung"
        										id="pertanian_hutan_lindung" class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="pertanian_hutan_lindung" class="text-gray-700">Luas Hutan
        										Lebat/Lindung</small>
        								</div>

        								<div class="col-lg-2 mt-2">
        									<input type="date" name="pertanian_mutasi" id="pertanian_mutasi"
        										class="form-control border-left-primary" required>
        									<small id="pertanian_mutasi" class="text-gray-700">Mutasi Tanah di Desa
        										(diisi setiap terjadi
        										mutasi tanah)</small>
        								</div>

        								<div class="col-lg-2 mt-2">
        									<input type="text" name="pertanian_tanah_kosong" id="pertanian_tanah_kosong"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="pertanian_tanah_kosong" class="text-gray-700">Luas Tanah
        										Kosong</small>
        								</div>

        								<div class="col-lg-2 mt-2">
        									<input type="text" name="pertanian_lain" id="pertanian_lain"
        										class="form-control border-left-primary"
        										onkeypress="return onlyNumberKey(event)" required>
        									<small id="pertanian_lain" class="text-gray-700">Luas Tanah Untuk
        										Lain-Lain</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-12 mt-3">
        							<div class="form-group">
        								<label for="ket" class="text-gray-900 font-weight-bold">Keterangan</label>
        								<textarea class="form-control border-left-primary" name="ket" id="ket" rows="3"
        									maxlength="255" required></textarea>
        								<small id="ket" class="text-gray-700">Diisi dengan catatan-catatan lain yang
        									dianggap
        									perlu</small>
        							</div>
        						</div>
        					</div>
        					<?=form_close()?>

        					<div class="d-flex mt-3">
        						<button type="button" class="btn btn-success active-button align-self-center"
        							onclick="store(base_url+'admin/<?=$uri[2]?>/store','#form')">Simpan</button>
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
        		if (ASCIICode == 46)
        			return true;

        		if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        			return false;
        		return true;
        	}

        </script>
